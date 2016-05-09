package com.travel.util;

import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.Random;

import org.apache.commons.codec.binary.Hex;
import org.joda.time.DateTime;
import org.joda.time.Days;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.mail.SimpleMailMessage;
import org.springframework.mail.javamail.JavaMailSender;
import org.springframework.stereotype.Component;

import com.travel.dto.ContentEmail;
import com.travel.dto.CustomerDto;
import com.travel.dto.FormOrderDto;
import com.travel.model.CustomerEntity;
import com.travel.model.FormOrderEntity;
import com.travel.model.TourEntity;
import com.travel.repository.CustomerRepository;
import com.travel.repository.FormOrderRepository;
import com.travel.repository.TourRepository;

@Component
public class UtilMethod implements IUtilMethod {
	@Autowired
	private JavaMailSender mailSender;

	@Autowired
	private TourRepository tourRepo;

	@Autowired
	private CustomerRepository customerRepo;

	@Autowired
	private FormOrderRepository formOrderRepo;

	@Override
	public int sendEmail(ContentEmail content) {
		SimpleMailMessage message = new SimpleMailMessage();
		message.setTo(content.getTo());
		message.setSubject(content.getSubject());
		message.setText(content.getContent().toString());
		mailSender.send(message);
		return 0;
	}

	@Override
	public String createPassword() {
		StringBuilder passwordMd5 = new StringBuilder();
		Random r = new Random();
		for (int i = 0; i < 8; i++) {
			char c = (char) (r.nextInt(26) + 'a');
			passwordMd5.append(c);
		}

		return passwordMd5.toString();
	}

	@Override
	public String encodePassword(String password) {
		byte[] byteOfPass = password.getBytes();
		MessageDigest md;
		try {
			md = MessageDigest.getInstance("MD5");
			byte[] passwordEncoded = md.digest(byteOfPass);
			String result = new String(Hex.encodeHex(passwordEncoded));
			return result;
		} catch (NoSuchAlgorithmException e) {
			e.printStackTrace();
			return null;
		}

	}

	@Override
	public int checkOrderTour(FormOrderDto formOrderDto) {
		/*
		 * Kiem tra trung tour
		 */
		CustomerDto customerDto = formOrderDto.getFormOrderCustomerDto();
		/*
		 * Kiem tra khach hang la thanh vien khong?
		 */
		if (customerDto.getCustomerIdDto() == null) {
			/*
			 * Khach hang la khong thanh vien
			 */
			CustomerEntity customerEntity = customerRepo
					.findByCustomerEmail(customerDto.getCustomerEmailDto());
			if (customerEntity != null) {
				/*
				 * email bi trung, vui long dang nhap
				 */
				return -1;
			}
			return 1;
		} else {
			/*
			 * Khach hang la thanh vien
			 */
			FormOrderEntity formOrderDuplicate = formOrderRepo
					.findCustomerIdAndTourId(customerDto.getCustomerIdDto(),
							formOrderDto.getFormOrderTourIdDto());
			if (formOrderDuplicate != null) {
				/*
				 * trung tour
				 */
				return -2;
			}
			TourEntity tour = tourRepo.findById(formOrderDto
					.getFormOrderTourIdDto()); // lay thong tin tour muon di
			/*
			 * Khong bi trung
			 */
			Date dateStartWant = tour.getNgayKH(); // ngay KH cua tour muon dat
			Date dateEndWant = tour.getNgayKT(); // ngay KT cua tour muon dat
			DateTime startWant = new DateTime(dateStartWant);
			DateTime endWant = new DateTime(dateEndWant);
			DateTime future = endWant.plusDays(3);
			DateTime past = startWant.plusDays(-3);

			// lay tat ca danh sach cac tour da dat
			List<FormOrderEntity> formOrderList = formOrderRepo
					.findByFormOrderCustomerId(customerDto.getCustomerIdDto()); 
			
			List<TourEntity> tourEntityListPast = new ArrayList<>();
			List<TourEntity> tourEntityListFuture = new ArrayList<>();
			
			for (FormOrderEntity formOrder : formOrderList) {
				TourEntity tourEntity = tourRepo.findById(formOrder
						.getFormOrderTourId());
				Date dateStart = tourEntity.getNgayKH();
				Date dateEnd = tourEntity.getNgayKT();
				DateTime start = new DateTime(dateStart);
				DateTime end = new DateTime(dateEnd);
				
				if ((endWant.isAfter(start)&& endWant.isBefore(end)) || (startWant.isBefore(end)&& startWant.isAfter(start))
						|| (startWant.isBefore(start) && endWant.isAfter(end))) {
					return -4;
				}
				
				if (future.isAfter(end)) {
					/*
					 * Cac tour dung sau tour muon dat
					 */
					tourEntityListPast.add(tourEntity);

				} else if (past.isBefore(start)) {
					/*
					 * Cac tour dung truoc tour muon dat
					 */
					tourEntityListFuture.add(tourEntity);
				}
			}

			TourEntity tourEntityKHGanNhat;
			TourEntity tourEntityKTGanNhat;
			if (!(tourEntityListPast.isEmpty())&&!(tourEntityListFuture.isEmpty())){
				// tour muon dat nam giua 
				tourEntityKHGanNhat = tourEntityListFuture.get(0);
				tourEntityKTGanNhat = tourEntityListPast.get(0);
				// Tim tour co ngay ket thuc gan voi ngay KH nhat
				for (int i = 1; i < tourEntityListFuture.size(); i++) {
					DateTime t1 = new DateTime(tourEntityKHGanNhat.getNgayKH());
					DateTime t2 = new DateTime(tourEntityListFuture.get(i)
							.getNgayKH());
					if (t1.isAfter(t2)) {
						tourEntityKHGanNhat = tourEntityListFuture.get(i);
					}
				}
				// Tim tour co ngay bat dau gan voi ngay ket thuc
				for (int i = 1; i < tourEntityListPast.size(); i++) {
					DateTime t1 = new DateTime(tourEntityKTGanNhat.getNgayKT());
					DateTime t2 = new DateTime(tourEntityListPast.get(i)
							.getNgayKH());
					if (t1.isBefore(t2)) {
						tourEntityKTGanNhat = tourEntityListPast.get(i);
					}
				}
				// Kiem tra ngay KH va lngay KT cua tour muon dat voi 2 Tour gan nhat
				if (past.isAfter(new DateTime(tourEntityKTGanNhat.getNgayKT()))
						&& future.isBefore(new DateTime(tourEntityKHGanNhat
								.getNgayKH()))) {
					return 1;
				}
			}
			else if (tourEntityListFuture.isEmpty()){
				// khong co tour dat sau do
				tourEntityKTGanNhat = tourEntityListPast.get(0);
				for (int i = 1; i < tourEntityListPast.size(); i++) {
					DateTime t1 = new DateTime(tourEntityKTGanNhat.getNgayKT());
					DateTime t2 = new DateTime(tourEntityListPast.get(i)
							.getNgayKH());
					if (t1.isBefore(t2)) {
						tourEntityKTGanNhat = tourEntityListPast.get(i);
					}
				}
				// Kiem tra ngay KH va lngay KT cua tour muon dat voi 2 Tour gan nhat
				if (past.isAfter(new DateTime(tourEntityKTGanNhat.getNgayKT()))) {
					return 1;
				}
			}
			else {
				// khong co tour dat truoc do
				tourEntityKHGanNhat = tourEntityListFuture.get(0);
				// Tim tour co ngay ket thuc gan voi ngay KH nhat
				for (int i = 1; i < tourEntityListFuture.size(); i++) {
					DateTime t1 = new DateTime(tourEntityKHGanNhat.getNgayKH());
					DateTime t2 = new DateTime(tourEntityListFuture.get(i)
							.getNgayKH());
					if (t1.isAfter(t2)) {
						tourEntityKHGanNhat = tourEntityListFuture.get(i);
					}
				}
				if (future.isBefore(new DateTime(tourEntityKHGanNhat.getNgayKH()))) {
					return 1;
				}
			}
			
			return -3;
		}
	}
}

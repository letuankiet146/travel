package com.travel.util;

import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
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
		if (customerDto.getCustomerIdDto()==null){
			/*
			 * Khach hang la khong thanh vien
			 */
			CustomerEntity customerEntity = customerRepo.findByCustomerEmail(customerDto.getCustomerEmailDto());
			if (customerEntity!=null){
				/*
				 * email bi trung, vui long dang nhap
				 */
				return -1;
			}
		}
		else {
				/*
				 * Khach hang la thanh vien
				 */
			FormOrderEntity formOrderDuplicate = formOrderRepo
					.findCustomerIdAndTourId(customerDto.getCustomerIdDto(), formOrderDto.getFormOrderTourIdDto());
			if (formOrderDuplicate!=null) {
				return -2;
			}
			TourEntity tour = tourRepo.findById(formOrderDto
					.getFormOrderTourIdDto());
			/*
			 * Khong bi trung
			 */
			Date dateStart = tour.getNgayKH();
			DateTime start = new DateTime(dateStart);
			List<FormOrderEntity> formOrderList = formOrderRepo
					.findByFormOrderCustomerId(customerDto.getCustomerIdDto());
			for (FormOrderEntity formOrder : formOrderList){
				TourEntity tourEntity = tourRepo.findById(formOrder.getFormOrderTourId());
				 Date dateEnd = tourEntity.getNgayKT();
				 DateTime end = new DateTime(dateEnd);
				 int days = Days.daysBetween(end,start).getDays();
				 if (days <= 3){
					 return -3;
				 }
			}
		}
		
		return 1;
	}
}

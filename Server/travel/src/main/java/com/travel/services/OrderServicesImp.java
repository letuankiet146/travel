package com.travel.services;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import org.dozer.DozerBeanMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;
import org.springframework.web.bind.annotation.RequestBody;

import ch.qos.logback.classic.pattern.Util;

import com.travel.dto.ContentEmail;
import com.travel.dto.CustomerDto;
import com.travel.dto.FormOrderDto;
import com.travel.dto.HistoryDto;
import com.travel.dto.PasswordDto;
import com.travel.dto.TourDto;
import com.travel.model.CustomerEntity;
import com.travel.model.FormOrderEntity;
import com.travel.model.TourEntity;
import com.travel.repository.CustomerRepository;
import com.travel.repository.FormOrderRepository;
import com.travel.repository.TourRepository;
import com.travel.util.CalcMoney;
import com.travel.util.IUtilMethod;
import com.travel.util.MyFormatDate;
import com.travel.util.UtilMethod;




@Service
public class OrderServicesImp implements IOrderServices {
	@Autowired
	private IHistoryServices historyInterface;
	
	@Autowired
	FormOrderRepository formOrderRepo;

	@Autowired
	CustomerRepository customerRepo;

	@Autowired
	TourRepository tourRepo;

	@Autowired
	private DozerBeanMapper mapper;
	
	@Autowired
	private IUtilMethod utilMethod;

	@Transactional
	public String addOrderTour(FormOrderDto formOrderDto) {
		FormOrderEntity formOrderEntity = new FormOrderEntity();
		TourEntity tourEntity = tourRepo.findOne(formOrderDto
				.getFormOrderTourIdDto());
		if (tourEntity==null || tourEntity.getTourDeleteDate()!=null){
			return "-4";
		}
		// tinh tien
		int money = CalcMoney.calculateMoney(
				formOrderDto.getFormOrderQuantityAdultsDto(),
				formOrderDto.getFormOrderQuantityJuvenileDto(),
				formOrderDto.getFormOrderQuantityChildDto(),
				tourEntity.getGiaTour());

		formOrderDto.setFormOrderMoneyDto(money);
		formOrderEntity = mapper.map(formOrderDto, FormOrderEntity.class);

		if (formOrderDto.getFormOrderCustomerDto().getCustomerIdDto()==null){
			CustomerEntity customerEntity = new CustomerEntity();
			customerEntity = mapper.map(formOrderDto.getFormOrderCustomerDto(),
					CustomerEntity.class);
			if (formOrderDto.getFormOrderCustomerDto().getCustomerBirthDto()!=null){
				customerEntity.setCustomerBirth(MyFormatDate.stringToDate(formOrderDto
						.getFormOrderCustomerDto().getCustomerBirthDto()));
			}
			/*
			 * generate random password 
			 */
			String userPassword = utilMethod.createPassword();
			String userPasswordMd5 = utilMethod.encodePassword(userPassword);
			customerEntity.setCustomerPassword(userPasswordMd5);
			// First: save into customer then save into formOrder
			customerRepo.saveAndFlush(customerEntity);
			formOrderEntity.setFormOrderCustomerId(customerEntity.getCustomerId());
			/*
			 * Send email to customer
			 */
			if (customerEntity.getCustomerEmail() !=null ){
				String to = customerEntity.getCustomerEmail();
				String subject = "Tài khoản khách hàng - Công ty du lịch IuhTravel";
				StringBuilder contentSend = new  StringBuilder();
				contentSend.append("Xin chào quý khách, đây tài khoản của quý khách");
				contentSend.append("\n email login: "+ to);
				contentSend.append("\n pasword: "+ userPassword);
				ContentEmail content = new ContentEmail(null,to,subject, contentSend);
				utilMethod.sendEmail(content);
			}
			
		}
		else {
			formOrderEntity.setFormOrderCustomerId(formOrderDto.getFormOrderCustomerDto().getCustomerIdDto());
		}
		formOrderRepo.saveAndFlush(formOrderEntity);
		/*
		 * Count down sit
		 */
		tourEntity.setTourBooked(tourEntity.getTourBooked()+formOrderDto.getFormOrderQuantityAdultsDto()
				+ formOrderDto.getFormOrderQuantityChildDto()
				+ formOrderDto.getFormOrderQuantityJuvenileDto());
		tourRepo.saveAndFlush(tourEntity);
		
		return "1";
	}

	public List<FormOrderDto> listAllOrderTour() {
		List<FormOrderDto> formOrderDtoList = new ArrayList<FormOrderDto>();
		List<FormOrderEntity> formOrderEntities = formOrderRepo.findAll();
		for (FormOrderEntity formOrderEntity : formOrderEntities) {

			FormOrderDto formOrderDto = new FormOrderDto();
			// map to FormOrderDto
			formOrderDto = mapper.map(formOrderEntity, FormOrderDto.class);

			CustomerDto customerDto = mapper.map(formOrderEntity.getFormOrderCustomer(), CustomerDto.class);
			TourDto tourDto = mapper.map(formOrderEntity.getFormOrderTour(), TourDto.class);
			
			// change date: Date to String
			customerDto.setCustomerBirthDto(MyFormatDate
					.dateToString(formOrderEntity.getFormOrderCustomer()
							.getCustomerBirth()));
			
			tourDto.setNgayKHDto(MyFormatDate.dateToString(formOrderEntity.getFormOrderTour().getNgayKH()));
			tourDto.setNgayKTDto(MyFormatDate.dateToString(formOrderEntity.getFormOrderTour().getNgayKT()));
			
			
			// set Customer and Tour for FormDto
			formOrderDto.setFormOrderCustomerDto(customerDto);
			formOrderDto.setFormOrderTourDto(tourDto);
			
			formOrderDtoList.add(formOrderDto);
		}
		return formOrderDtoList;
	}

	public String deleteMulti(List<Integer> idList, Integer idUser) {
		for (Integer id : idList){
			if (formOrderRepo.exists(id)){
				formOrderRepo.delete(id);
				/*
				 * Save history
				 */
				HistoryDto historyDto = new HistoryDto();
				historyDto.setUser(idUser);
				historyDto.setAction("Delete_Order");
				historyDto.setContent("ID="+id);
				historyInterface.add(historyDto);
			}
			else {
				return "Xoa khong thanh cong";
			}
		}
		
		return "Xoa thanh cong";
	}

	@Override
	public String updateOrderTour(FormOrderDto formOrderDtoUpdate) {
		if (formOrderDtoUpdate !=null){
			FormOrderEntity formOrderEntity = formOrderRepo.findOne(formOrderDtoUpdate.getFormOrderIdDto());
			FormOrderDto formOrderDto = mapper.map(formOrderEntity, FormOrderDto.class);
			if (formOrderEntity !=null){
				formOrderDto.setData(formOrderDtoUpdate);
				formOrderEntity = mapper.map(formOrderDto, FormOrderEntity.class);
				formOrderRepo.saveAndFlush(formOrderEntity);
				if (formOrderDto.getFormOrderIsPayDto()==10){
					// tra lai so cho

					TourEntity tourEntity = tourRepo.findById(formOrderEntity.getFormOrderTourId());
					/*
					 * Count down sit
					 */
					tourEntity.setTourBooked(tourEntity.getTourBooked()-formOrderEntity.getFormOrderQuantityAdults()
							- formOrderEntity.getFormOrderQuantityChild()
							- formOrderEntity.getFormOrderQuantityJuvenile());
					tourRepo.saveAndFlush(tourEntity);
				}
			}
			return "1";
		}
		return "-1";
	}

	@Override
	public String delete(Integer id, Integer userId) {
		if (formOrderRepo.exists(id)){
			FormOrderEntity formOrderEntity = formOrderRepo.findOne(id);
			int idTour = formOrderRepo.findOne(id).getFormOrderTourId();
			if (idTour!=0){
				TourEntity tourEntity = tourRepo.findById(idTour);
				/*
				 * Count down sit
				 */
				tourEntity.setTourBooked(tourEntity.getTourBooked()-formOrderEntity.getFormOrderQuantityAdults()
						- formOrderEntity.getFormOrderQuantityChild()
						- formOrderEntity.getFormOrderQuantityJuvenile());
				tourRepo.saveAndFlush(tourEntity);
			}
			formOrderRepo.delete(id);
			return "1";
		}
		return "-1";
	}

	@Override
	public String checkOrderTour(FormOrderDto formOrderDto) {
		/*
		 * check trung tour
		 */
		int checkFlag = utilMethod.checkOrderTour(formOrderDto);
		if (checkFlag <0){
			return ""+checkFlag;
		}
		return "1";
	}

	@Override
	public String createVerifyCode(int formOrderId) {
		if (formOrderRepo.exists(formOrderId)){
			FormOrderEntity formOrderEntity = formOrderRepo.findOne(formOrderId);

			// gui email
			CustomerEntity customerEntity = customerRepo
					.findOne(formOrderEntity.getFormOrderCustomerId());
			String verifyCode = utilMethod.createPassword();
			String toEmail = customerEntity.getCustomerEmail();
			String subject = "[iuh-travle.tk] HỦY TOUR: "
					+ tourRepo.findOne(formOrderEntity.getFormOrderTourId()).getIdTour();
			StringBuilder contentEmail = new StringBuilder();
			contentEmail.append("Bạn đang hủy tour \n\n");
			contentEmail.append("MÃ XÁC THỰC: ");
			contentEmail.append(verifyCode);
			contentEmail.append("\nMã xác thực sẽ mất hiệu lực sau 10 phút");
			ContentEmail content = new ContentEmail(null, toEmail, subject, contentEmail);
			formOrderEntity.setFormOrderVerifyCode(verifyCode);
			formOrderRepo.saveAndFlush(formOrderEntity);
			utilMethod.sendEmail(content);
			return "1";
		
		}
		return "-1";
	}

	@Override
	public String confirmVerifyCode(PasswordDto verfiyInfo) {
		FormOrderEntity formOrderEntity = formOrderRepo.findOne(verfiyInfo.getCustomerId());
		String verify = verfiyInfo.getVerifyCode();
		String oldVerify = formOrderEntity.getFormOrderVerifyCode();
		if (verify.equals(oldVerify)){
			return "1";
		}
		return "-1";
	}
}

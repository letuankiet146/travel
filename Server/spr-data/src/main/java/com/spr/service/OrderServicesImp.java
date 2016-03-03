package com.spr.service;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import org.dozer.DozerBeanMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.spr.dto.CustomerDto;
import com.spr.dto.FormOrderDto;
import com.spr.dto.TourDto;
import com.spr.model.CustomerEntity;
import com.spr.model.FormOrderEntity;
import com.spr.model.TourEntity;
import com.spr.repository.CustomerRepository;
import com.spr.repository.FormOrderRepository;
import com.spr.repository.TourRepository;
import com.spr.util.CalcMoney;
import com.spr.util.MyFormatDate;

@Service
public class OrderServicesImp implements IOrderServices {
	@Autowired
	FormOrderRepository formOrderRepo;

	@Autowired
	CustomerRepository customerRepo;

	@Autowired
	TourRepository tourRepo;

	@Autowired
	private DozerBeanMapper mapper;

	@Transactional
	public Integer addOrderTour(FormOrderDto formOrderDto) {
		CustomerEntity customerEntity = new CustomerEntity();

		customerEntity = mapper.map(formOrderDto.getFormOrderCustomerDto(),
				CustomerEntity.class);
		customerEntity.setCustomerBirth(MyFormatDate.stringToDate(formOrderDto
				.getFormOrderCustomerDto().getCustomerBirthDto()));

		// First: save into customer then save into formOrder
		customerRepo.saveAndFlush(customerEntity);

		FormOrderEntity formOrderEntity = new FormOrderEntity();
		TourEntity tourEntity = tourRepo.findOne(formOrderDto
				.getFormOrderTourIdDto());
		// tinh tien
		int money = CalcMoney.calculateMoney(
				formOrderDto.getFormOrderQuantityAdultsDto(),
				formOrderDto.getFormOrderQuantityJuvenileDto(),
				formOrderDto.getFormOrderQuantityChildDto(),
				tourEntity.getGiaTour());

		formOrderDto.setFormOrderMoneyDto(money);
		formOrderEntity = mapper.map(formOrderDto, FormOrderEntity.class);
		formOrderEntity.setFormOrderCustomerId(customerEntity.getCustomerId());
		formOrderEntity.setFormOrderDate(new Date());
		FormOrderEntity formformOrderEntityNew = formOrderRepo
				.saveAndFlush(formOrderEntity);
		return formformOrderEntityNew.getFormOrderId();
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
			formOrderDto.setFormOrderDateDto(MyFormatDate.dateToString(formOrderEntity.getFormOrderDate()));
			
			formOrderDtoList.add(formOrderDto);
		}
		return formOrderDtoList;
	}
}

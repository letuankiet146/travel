package com.spr.service;

import java.util.Date;

import org.dozer.DozerBeanMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.spr.dto.FormOrderDto;
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
	public Integer orderTour(FormOrderDto formOrderDto) {
		CustomerEntity customerEntity = new CustomerEntity();

		formOrderDto.setFormOrderDateDto(new Date());
		customerEntity = mapper.map(formOrderDto.getFormOrderCustomerDto(),CustomerEntity.class );
		customerEntity.setCustomerBirth(MyFormatDate.stringToDate(formOrderDto
				.getFormOrderCustomerDto().getCustomerBirthDto()));
		
		//First: save into customer then save into formOrder 
		customerRepo.saveAndFlush(customerEntity);
		
		FormOrderEntity formOrderEntity = new FormOrderEntity();
		TourEntity tourEntity = tourRepo.findOne(formOrderDto.getFormOrderTourIdDto());
		// tinh tien 
		int money = CalcMoney.calculateMoney(
				formOrderDto.getFormOrderQuantityAdultsDto(),
				formOrderDto.getFormOrderQuantityJuvenileDto(),
				formOrderDto.getFormOrderQuantityChildDto(),
				tourEntity.getGiaTour());
		
		formOrderDto.setFormOrderMoneyDto(money);
		formOrderEntity = mapper.map(formOrderDto, FormOrderEntity.class);
		formOrderEntity.setFormOrderCustomer(customerEntity);
		FormOrderEntity formformOrderEntityNew = formOrderRepo.saveAndFlush(formOrderEntity);
		return formformOrderEntityNew.getFormOrderId();
	}

}

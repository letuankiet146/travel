package com.spr.service;

import org.dozer.DozerBeanMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.spr.dto.FormOrderDto;
import com.spr.model.CustomerEntity;
import com.spr.model.FormOrderEntity;
import com.spr.repository.CustomerRepository;
import com.spr.repository.FormOrderRepository;
import com.spr.util.MyFormatDate;

@Service
public class OrderServicesImp implements IOrderServices {
	@Autowired
	FormOrderRepository formOrderRepo;

	@Autowired
	CustomerRepository customerRepo;

	@Autowired
	private DozerBeanMapper mapper;

	@Transactional
	public Integer orderTour(FormOrderDto formOrderDto) {
		CustomerEntity customerEntity = new CustomerEntity();

		
//		customerEntity = mapper.map(formOrderDto.getFormOrderCustomer(),CustomerEntity.class );
		customerEntity.setData(formOrderDto.getFormOrderCustomerDto());
		customerEntity.setCustomerBirth(MyFormatDate.stringToDate(formOrderDto
				.getFormOrderCustomerDto().getCustomerBirthDto()));
		//First: save into customer then save into formOrder 
		
		customerRepo.saveAndFlush(customerEntity);
		
		FormOrderEntity formOrderEntity = new FormOrderEntity();
//		formOrderEntity = mapper.map(formOrderDto, FormOrderEntity.class);
		formOrderEntity.setData(formOrderDto);
		formOrderEntity.setFormOrderCustomer(customerEntity);
		FormOrderEntity formformOrderEntityNew = formOrderRepo.saveAndFlush(formOrderEntity);
		return formformOrderEntityNew.getFormOrderId();
	}

}

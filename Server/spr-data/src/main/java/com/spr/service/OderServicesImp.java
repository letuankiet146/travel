package com.spr.service;

import org.dozer.DozerBeanMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.spr.dto.FormOrderDto;
import com.spr.model.CustomerEntity;
import com.spr.model.FormOrderEntity;
import com.spr.repository.CustomerRepository;
import com.spr.repository.FormOderRepository;
import com.spr.util.MyFormatDate;

@Service
public class OderServicesImp implements IOrderServices {
	@Autowired
	FormOderRepository formOderRepo;

	@Autowired
	CustomerRepository customerRepo;

	@Autowired
	private DozerBeanMapper mapper;

	@Transactional
	public Integer orderTour(FormOrderDto formOrderDto) {
		CustomerEntity customerEntity = new CustomerEntity();

		
//		customerEntity = mapper.map(formOrderDto.getFormOderCustomer(),CustomerEntity.class );
		customerEntity.setData(formOrderDto.getFormOderCustomer());
		customerEntity.setCustomerBirth(MyFormatDate.stringToDate(formOrderDto
				.getFormOderCustomer().getCustomerBirth()));
		//First: save into customer then save into formOrder 
		
		customerRepo.saveAndFlush(customerEntity);
		
		FormOrderEntity formOrderEntity = new FormOrderEntity();
//		formOrderEntity = mapper.map(formOrderDto, FormOrderEntity.class);
		formOrderEntity.setData(formOrderDto);
		formOrderEntity.setFormOderCustomer(customerEntity);
		FormOrderEntity formformOrderEntityNew = formOderRepo.saveAndFlush(formOrderEntity);
		return formformOrderEntityNew.getFormOrderId();
	}

}

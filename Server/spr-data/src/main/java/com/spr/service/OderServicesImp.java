package com.spr.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.spr.model.FormOrderEntity;
import com.spr.repository.CustomerRepository;
import com.spr.repository.FormOderRepository;

@Service
public class OderServicesImp implements IOrderServices {
	@Autowired
	FormOderRepository formOderRepo;
	
	@Autowired
	CustomerRepository customerRepo;
	
	@Transactional
	public Integer orderTour(FormOrderEntity formOrder) {
		customerRepo.saveAndFlush(formOrder.getFormOderCustomer());
		FormOrderEntity formNew =	formOderRepo.saveAndFlush(formOrder);
		return formNew.getFormOrderId();
	}

}

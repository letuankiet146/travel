package com.spr.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.spr.model.FormOrder;
import com.spr.repository.CustomerRepository;
import com.spr.repository.FormOderRepository;

@Service
public class OderServicesImp implements IOrderServices {
	@Autowired
	FormOderRepository formOderRepo;
	
	@Autowired
	CustomerRepository customerRepo;
	
	@Transactional
	public Integer orderTour(FormOrder formOrder) {
		customerRepo.saveAndFlush(formOrder.getFormOderCustomer());
		FormOrder formNew =	formOderRepo.saveAndFlush(formOrder);
		return formNew.getFormOrderId();
	}

}

package com.spr.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.spr.dto.CustomerDto;
import com.spr.service.ICustomerServices;

@RestController
@RequestMapping("/customer")

public class CustomerController {
	@Autowired
	private ICustomerServices customerService;
	
	@RequestMapping(value = "/add")
	public String add (@RequestBody CustomerDto customerDto){
		return customerService.add(customerDto);
	}
	
	@RequestMapping(value = "/list")
	public List<CustomerDto> list (){
		return customerService.listAll();
	}
	
	@RequestMapping(value = "/delete/{id}")
	public String delete(@PathVariable Integer id){
		return customerService.delete(id);
	}
	
	@RequestMapping (value = "/delete")
	public String delete (@RequestBody List<Integer> listId){
		return customerService.deleteMul(listId);
	}
	
	@RequestMapping(value ="/update")
	public String update (@RequestBody CustomerDto customerDto){
		return customerService.update(customerDto);
	}

}

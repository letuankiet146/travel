package com.travel.api;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.travel.dto.CustomerDto;
import com.travel.services.ICustomerServices;


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
	
	@RequestMapping(value = "/delete/{id}/{userId}")
	public String delete(@PathVariable Integer id,@PathVariable Integer userId){
		return customerService.delete(id,userId);
	}
	
	@RequestMapping (value = "/delete/{userId}")
	public String delete (@RequestBody List<Integer> listId, @PathVariable Integer userId){
		return customerService.deleteMul(listId,  userId);
	}
	
	@RequestMapping(value ="/update")
	public String update (@RequestBody CustomerDto customerDto){
		return customerService.update(customerDto);
	}

}

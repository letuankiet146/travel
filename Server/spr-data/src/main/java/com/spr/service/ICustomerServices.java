package com.spr.service;

import java.util.List;

import com.spr.dto.CustomerDto;

public interface ICustomerServices {
	
	public String add (CustomerDto customerDto);
	public String delete(Integer id);
	public String deleteMul(List<Integer> listId);
	public String update (CustomerDto customerDto);
	public List<CustomerDto> listAll ();
}

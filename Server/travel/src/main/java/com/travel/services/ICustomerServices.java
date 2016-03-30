package com.travel.services;

import java.util.List;

import com.travel.dto.CustomerDto;


public interface ICustomerServices {
	
	public String add (CustomerDto customerDto);
	public String delete(Integer id, Integer userId);
	public String deleteMul(List<Integer> listId, Integer userId);
	public String update (CustomerDto customerDto);
	public List<CustomerDto> listAll ();
}

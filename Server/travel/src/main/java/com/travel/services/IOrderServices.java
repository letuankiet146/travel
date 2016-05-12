package com.travel.services;

import java.util.List;

import com.travel.dto.FormOrderDto;
import com.travel.dto.PasswordDto;


public interface IOrderServices {
	public String addOrderTour(FormOrderDto formOrder);
	public List<FormOrderDto> listAllOrderTour();
	public String deleteMulti(List<Integer> idList, Integer idUser);
	public String updateOrderTour(FormOrderDto formOrderDto);
	public String delete(Integer id, Integer userId);
	public String checkOrderTour (FormOrderDto formOrderDto);
	public String createVerifyCode (int formOrderId);
	public String confirmVerifyCode (PasswordDto verfiyInfo);
}

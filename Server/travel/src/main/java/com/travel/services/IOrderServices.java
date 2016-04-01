package com.travel.services;

import java.util.List;

import com.travel.dto.FormOrderDto;


public interface IOrderServices {
	public String addOrderTour(FormOrderDto formOrder);
	public List<FormOrderDto> listAllOrderTour();
	public String deleteMulti(List<Integer> idList, Integer idUser);
	public String updateOrderTour(FormOrderDto formOrderDto);
	public String delete(Integer id);
}

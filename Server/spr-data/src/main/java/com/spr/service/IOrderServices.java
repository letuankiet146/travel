package com.spr.service;

import java.util.List;

import com.spr.dto.FormOrderDto;

public interface IOrderServices {
	public String addOrderTour(FormOrderDto formOrder);
	public List<FormOrderDto> listAllOrderTour();
	public String deleteMulti(List<Integer> idList);
}

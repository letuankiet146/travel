package com.spr.service;

import java.util.List;

import com.spr.dto.FormOrderDto;

public interface IOrderServices {
	public Integer addOrderTour(FormOrderDto formOrder);
	public List<FormOrderDto> listAllOrderTour();
}

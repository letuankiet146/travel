package com.travel.api;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.context.annotation.Configuration;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

import com.travel.dto.FormOrderDto;
import com.travel.services.IOrderServices;

@RestController
@Configuration
@ComponentScan("com.spr.service")
public class OderTourController {
	@Autowired(required=true)
	private IOrderServices orderService;
	
	@RequestMapping(value="/orderTour", method=RequestMethod.POST )
	public String addOrderTour (@RequestBody FormOrderDto formOrder ){
			return orderService.addOrderTour(formOrder);
	}
	
	@RequestMapping(value="/listOrderTourId", method=RequestMethod.GET )
	public List<FormOrderDto> listAllOrderTour (){
		List<FormOrderDto> formOrderDtoList = orderService.listAllOrderTour();
		return formOrderDtoList;
	}
	
	@RequestMapping (value = "/deleteOrderTour/{idUser}")
	public String deleteMulti (@RequestBody List<Integer> idList, @PathVariable Integer idUser){
		return orderService.deleteMulti(idList,idUser);
	}
	
	@RequestMapping (value ="/updateOrderTour")
	public String update (@RequestBody FormOrderDto formOrderDto){
		return orderService.updateOrderTour(formOrderDto);
	}
	
	@RequestMapping (value = "/delete/{id}")
	public String deleteId (@PathVariable Integer id){
		return orderService.delete(id);
	}

}

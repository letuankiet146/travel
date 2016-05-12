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
import com.travel.dto.PasswordDto;
import com.travel.services.IOrderServices;

@RestController
@Configuration
@ComponentScan("com.spr.service")
public class OderTourController {
	@Autowired(required=true)
	private IOrderServices orderService;
	
	@RequestMapping(value="/createVerify/{formOrderId}" , method=RequestMethod.GET)
	public String createVerfyCode(@PathVariable int formOrderId ){
		return orderService.createVerifyCode(formOrderId);
	}
	
	@RequestMapping(value="/confirmVerify" , method=RequestMethod.POST)
	public String createVerfyCode(@RequestBody PasswordDto verfyCodeIfo ){
		return orderService.confirmVerifyCode(verfyCodeIfo);
	}
	
	
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
	
	@RequestMapping (value = "/delete/{id}/{userId}")
	public String deleteId (@PathVariable Integer id, @PathVariable Integer userId){
		return orderService.delete(id,userId);
	}
	
	@RequestMapping(value = "/checkTour", method=RequestMethod.POST)
	public String check(@RequestBody FormOrderDto formOrderDto){
		return orderService.checkOrderTour(formOrderDto);
	}

}

package com.spr.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.spr.dto.NotificationDto;
import com.spr.service.INotificationServices;

@RestController
@RequestMapping("/notification")
public class NotificationController {
	@Autowired
	private INotificationServices notificationInterface;
	
	@RequestMapping (value="/list")
	public List<NotificationDto> list(){
		List<NotificationDto> notificationDtoList = notificationInterface.listAll();
		return notificationDtoList;
	}
	
	@RequestMapping (value ="/delete/{id}")
	public String delete (@PathVariable(value="id") Integer id){
		return notificationInterface.delete(id);
	}
	
	@RequestMapping (value="/update")
	public String update (@RequestBody NotificationDto notificationDto){
		return notificationInterface.update(notificationDto);
	}
	
	@RequestMapping(value="/add")
	public String add (@RequestBody NotificationDto notificationDto){
		return notificationInterface.add(notificationDto);
	}

}

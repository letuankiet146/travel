package com.spr.service;

import java.util.List;

import com.spr.dto.NotificationDto;

public interface INotificationServices {
	public String add (NotificationDto notificationDto);
	public String delete (Integer id);
	public String update (NotificationDto notificationDto);
	public List<NotificationDto> listAll ();
}

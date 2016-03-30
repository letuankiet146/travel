package com.travel.dto;

import java.util.Date;

import lombok.Data;

import com.travel.model.StaffEntity;

@Data
public class NotificationDto {
	
	private Integer id;
	
	private Integer user;
	
	private String content;
	
	private Date createDate;
	
	private StaffEntity staffEntity;
}

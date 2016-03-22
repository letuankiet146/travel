package com.spr.dto;

import java.util.Date;

import com.spr.model.StaffEntity;

import lombok.Data;

@Data
public class NotificationDto {
	
	private Integer id;
	
	private Integer user;
	
	private String content;
	
	private Date createDate;
	
	private StaffEntity staffEntity;
}

/**
 * 
 */
package com.spr.dto;

import java.util.Date;

import com.spr.model.StaffEntity;

import lombok.Data;

/**
 * @author TuanKiet
 *
 */
@Data
public class HistoryDto {
	
	private Integer id;
	
	private Integer user;
	
	private String action;
	
	private String content;
	
	private Date createDate;
	
	private StaffEntity staffEntity;
	
	/*
	 * not mapping
	 */
	private Date deleteDateDto;
}

/**
 * 
 */
package com.travel.dto;

import java.util.Date;

import lombok.Data;

import com.travel.model.StaffEntity;

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

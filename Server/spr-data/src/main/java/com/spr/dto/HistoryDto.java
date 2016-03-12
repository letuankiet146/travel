/**
 * 
 */
package com.spr.dto;

import java.util.Date;

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
	
	/*
	 * not mapping
	 */
	private Date deleteDateDto;
}

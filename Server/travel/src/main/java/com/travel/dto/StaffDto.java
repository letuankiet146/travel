package com.travel.dto;

import java.util.Date;

import org.dozer.Mapping;

import lombok.Data;

@Data
public class StaffDto {
	
	@Mapping("staffId")
	private Integer staffId;
	
	@Mapping("staffName")
	private String staffName;
	
	@Mapping("staffLevel")
	private Integer staffLevel;
	
	@Mapping("staffUser")
	private String staffUser;

	@Mapping("staffPassword")
	private String staffPassword;

	@Mapping("staffType")
	private Integer staffType;

	@Mapping("staffLock")
	private Integer staffLock;
	
	@Mapping("staffDeleteDate")
	private Date staffDeleteDate;
}

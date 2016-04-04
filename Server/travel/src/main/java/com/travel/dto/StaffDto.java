package com.travel.dto;

import java.util.Date;

import javax.persistence.Column;

import org.dozer.Mapping;

import com.travel.model.GroupUserEntity;

import lombok.Data;

@Data
public class StaffDto {
	
	@Mapping("staffId")
	private Integer staffId;
	
	@Mapping("staffCode")
	private String staffCode;
	
	@Mapping("staffName")
	private String staffName;
	
	@Mapping("staffLevel")
	private Integer staffLevel;
	
	@Mapping ("staffGroupUser")
	private GroupUserEntity groupUserEntity;
	
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
	
	private String staffEmail;
	
	private String staffPhone;
	
	private Date staffDateStart;
	
	private String staffAddress;
	
	private String staffNote;
	
	private Date staffBirthday;
	
	private String staffSex;
	
	private String staffVietNameId;
	
	private String staffImage;
	
	private Integer idUserAdd;
}

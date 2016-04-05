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
	
	public void setDataUpdate (StaffDto staffDto){
		if (staffDto.getStaffName() != null){
			this.staffName = staffDto.getStaffName();
		}
		
		if (staffDto.getStaffLevel() != null){
			this.staffLevel = staffDto.getStaffLevel();
		}
		
		if (staffDto.getStaffUser() != null){
			this.staffUser = staffDto.getStaffUser();
		}
		
		if (staffDto.getStaffPassword()!= null){
			this.staffPassword = staffDto.getStaffPassword();
		}
		
		if (staffDto.getStaffType() != null){
			this.staffType = staffDto.getStaffType();
		}
		
		if (staffDto.getStaffLock()!= null){
			this.staffLock = staffDto.getStaffLock();
		}
		
		if (staffDto.getStaffEmail() != null){
			this.staffEmail = staffDto.getStaffEmail();
		}
		
		if (staffDto.getStaffPhone() != null){
			this.staffPhone = staffDto.getStaffPhone();
		}
		
		if (staffDto.getStaffDateStart() != null){
			this.staffDateStart = staffDto.getStaffDateStart();
		}
		
		if (staffDto.getStaffAddress() != null){
			this.staffAddress = staffDto.getStaffAddress();
		}
		
		if (staffDto.getStaffNote() != null){
			this.staffNote = staffDto.getStaffNote();
		}
		
		if (staffDto.getStaffBirthday() != null){
			this.staffBirthday = staffDto.getStaffBirthday();
		}
		
		if (staffDto.getStaffSex() != null){
			this.staffSex = staffDto.getStaffSex();
		}
		
		if (staffDto.getStaffVietNameId() != null){
			this.staffVietNameId = staffDto.getStaffVietNameId();
		}
		
		if (staffDto.getStaffImage() != null){
			this.staffImage = staffDto.getStaffImage();
		}
		
	}
	
}

package com.travel.dto;

import java.util.Date;

import javax.persistence.Column;

import org.dozer.Mapping;

import com.travel.model.GroupUserEntity;

import lombok.Data;

@Data
public class StaffDto {
	
	@Mapping("staffId")
	private Integer staffIdDto;
	
	@Mapping("staffCode")
	private String staffCodeDto;
	
	@Mapping("staffName")
	private String staffNameDto;
	
	@Mapping("staffLevel")
	private Integer staffLevelDto;
	
	@Mapping ("staffGroupUser")
	private GroupUserEntity groupUserEntityDto;
	
	@Mapping("staffUser")
	private String staffUserDto;

	@Mapping("staffPassword")
	private String staffPasswordDto;

	@Mapping("staffType")
	private Integer staffTypeDto;

	@Mapping("staffLock")
	private Integer staffLockDto;
	
	@Mapping("staffDeleteDate")
	private Date staffDeleteDateDto;
	
	@Mapping("staffEmail")
	private String staffEmailDto;
	
	@Mapping("staffPhone")
	private String staffPhoneDto;
	
//	@Mapping("staffDateStart")
	private String staffDateStartDto;
	
	@Mapping("staffAddress")
	private String staffAddressDto;
	
	@Mapping("staffNote")
	private String staffNoteDto;
	
//	@Mapping("staffBirthdayDto")
	private String staffBirthdayDto;
	
	@Mapping("staffSex")
	private String staffSexDto;
	
	@Mapping("staffVietNameId")
	private String staffVietNameIdDto;
	
	@Mapping("staffImage")
	private String staffImageDto;
	
	private Integer idUserAdd;
	
	public void setDataUpdate (StaffDto staffDto){
		if (staffDto.getStaffNameDto() != null){
			this.staffNameDto = staffDto.getStaffNameDto();
		}
		
		if (staffDto.getStaffLevelDto() != null){
			this.staffLevelDto = staffDto.getStaffLevelDto();
		}
		
		if (staffDto.getStaffUserDto() != null){
			this.staffUserDto = staffDto.getStaffUserDto();
		}
		
		if (staffDto.getStaffPasswordDto()!= null){
			this.staffPasswordDto = staffDto.getStaffPasswordDto();
		}
		
		if (staffDto.getStaffTypeDto() != null){
			this.staffTypeDto = staffDto.getStaffTypeDto();
		}
		
		if (staffDto.getStaffLockDto()!= null){
			this.staffLockDto = staffDto.getStaffLockDto();
		}
		
		if (staffDto.getStaffEmailDto() != null){
			this.staffEmailDto = staffDto.getStaffEmailDto();
		}
		
		if (staffDto.getStaffPhoneDto() != null){
			this.staffPhoneDto = staffDto.getStaffPhoneDto();
		}
		
		if (staffDto.getStaffDateStartDto() != null){
			this.staffDateStartDto = staffDto.getStaffDateStartDto();
		}
		
		if (staffDto.getStaffAddressDto() != null){
			this.staffAddressDto = staffDto.getStaffAddressDto();
		}
		
		if (staffDto.getStaffNoteDto() != null){
			this.staffNoteDto = staffDto.getStaffNoteDto();
		}
		
		if (staffDto.getStaffBirthdayDto() != null){
			this.staffBirthdayDto = staffDto.getStaffBirthdayDto();
		}
		
		if (staffDto.getStaffSexDto() != null){
			this.staffSexDto = staffDto.getStaffSexDto();
		}
		
		if (staffDto.getStaffVietNameIdDto() != null){
			this.staffVietNameIdDto = staffDto.getStaffVietNameIdDto();
		}
		
		if (staffDto.getStaffImageDto() != null){
			this.staffImageDto = staffDto.getStaffImageDto();
		}
		
	}
	
}

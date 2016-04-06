package com.travel.dto;

import java.util.Date;

import javax.persistence.Column;

import org.dozer.Mapping;

import lombok.Data;

@Data
public class HandBookDto {
private Integer id;
	
	@Mapping("code")
	private String codeDto;
	
	@Mapping("name")
	private String nameDto;
	
//	@Mapping("dateCreate")
	private String dateCreateDto;
	
	@Mapping("area")
	private Integer areaDto;
	
	@Mapping("status")
	private Integer statuDto;
	
	@Mapping("info")
	private String infoDto;
	
	@Mapping("image")
	private String imageDto;
	
	private int idUserAdd;
	
	public void setDataUpdate (HandBookDto handBookDto){
		if (handBookDto.getNameDto() != null){
			this.nameDto = handBookDto.getNameDto();
		}
		if (handBookDto.getDateCreateDto() != null){
			this.dateCreateDto = handBookDto.getDateCreateDto();
		}
		if (handBookDto.getAreaDto()!=null){
			this.areaDto = handBookDto.getAreaDto();
		}
		if (handBookDto.getStatuDto() != null){
			this.statuDto = handBookDto.getStatuDto();
		}
		if (handBookDto.getInfoDto() != null){
			this.infoDto = handBookDto.getInfoDto();
		}
		if (handBookDto.getImageDto() != null){
			this.imageDto = handBookDto.getImageDto();
		}
	}
}

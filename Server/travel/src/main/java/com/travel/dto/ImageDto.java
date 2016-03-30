package com.travel.dto;

import org.dozer.Mapping;

import lombok.Data;

@Data
public class ImageDto {
	@Mapping("id")
	private Integer idDto;

	@Mapping("imageName")
	private String imageNameDto;

	@Mapping("imageByte")
	private byte[] imageByteDto;
}

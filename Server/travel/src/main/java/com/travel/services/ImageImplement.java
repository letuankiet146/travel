package com.travel.services;

import java.util.ArrayList;
import java.util.List;

import org.dozer.DozerBeanMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.travel.dto.ImageDto;
import com.travel.model.ImageEntity;
import com.travel.repository.ImageRepository;

@Service
public class ImageImplement implements ImageInterface {
	
	@Autowired
	private ImageRepository imageRepository;
	
	@Autowired
	private DozerBeanMapper mapper;
	
	@Override
	public List<ImageDto> list() {
		List<ImageDto> imageDtoList = new ArrayList<>();
		List<ImageEntity> imageEntityList = imageRepository.findAll();
		for (ImageEntity imageEntity : imageEntityList){
			ImageDto imageDto = mapper.map(imageEntity, ImageDto.class);
			imageDtoList.add(imageDto);
		}
		return imageDtoList;
	}

}

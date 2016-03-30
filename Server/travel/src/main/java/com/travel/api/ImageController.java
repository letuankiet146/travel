package com.travel.api;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.travel.dto.ImageDto;
import com.travel.services.ImageInterface;

@RestController
public class ImageController {
	
	@Autowired
	private ImageInterface imageInterface;
	
	@RequestMapping(value="/list")
	public List<ImageDto> list (){
		List<ImageDto> imageDtoList = imageInterface.list();
		return imageDtoList;
	}
}

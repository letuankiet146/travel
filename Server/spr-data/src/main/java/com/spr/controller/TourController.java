/**
 * 
 */
package com.spr.controller;

import java.util.List;

import javax.servlet.http.HttpServletResponse;

import org.dozer.DozerBeanMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

import com.spr.dto.TourDto;
import com.spr.model.TourEntity;
import com.spr.service.ITourService;

/**
 * @author TuanKiet
 *	@Date Jan 8, 20168:03:39 AM
 */
@RestController
@RequestMapping(value="/tour")
public class TourController {
	@Autowired
	private ITourService iTourService;
	
	
	
	@RequestMapping (value = "/listTour", method = RequestMethod.GET )
	public List<TourDto> listTour (){
		List<TourDto> list = iTourService.listTour();
		return list;
	}
	
	@RequestMapping (value = "/addTour", method = RequestMethod.POST )
	public String addTour ( @RequestBody TourDto tourDto){
		iTourService.add(tourDto);
		return "Them thanh cong";
	}
	
	@RequestMapping (value = "/searchTour", method = RequestMethod.POST)
	public List<TourDto> searchTour (TourDto tourCondition){
		List<TourDto> resultTourDtoList = null ;
		return resultTourDtoList;
	}
	

}

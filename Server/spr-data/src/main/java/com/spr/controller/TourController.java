/**
 * 
 */
package com.spr.controller;

import java.util.List;

import javax.servlet.http.HttpServletResponse;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

import com.spr.model.Tour;
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
	public List<Tour> listTour (){
		List<Tour> list = iTourService.listTour();
		return list;
	}
	

}

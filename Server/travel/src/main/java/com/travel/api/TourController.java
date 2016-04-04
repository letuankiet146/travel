/**
 * 
 */
package com.travel.api;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

import com.travel.dto.TourDto;
import com.travel.services.ITourService;


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
		List<TourDto>  list = iTourService.listTour();
		return list;
	}
	
	@RequestMapping (value = "/addTour", method = RequestMethod.POST )
	public String addTour ( @RequestBody TourDto tourDto){
		int kq = iTourService.add(tourDto);
		return "Them thanh cong";
	}
	
	@RequestMapping (value = "/searchTour", method = RequestMethod.POST)
	public List<TourDto> searchTour (TourDto tourCondition){
		List<TourDto> resultTourDtoList = null ;
		return resultTourDtoList;
	}
	
	@RequestMapping (value = "/updateTour", method= RequestMethod.POST)
	public String updateTour (@RequestBody TourDto tourDtoUpdate){
		String result =  iTourService.update(tourDtoUpdate);
		return result;
	}
	
	@RequestMapping(value = "/deleteTour/{id}/{idUser}", method=RequestMethod.GET)
	public String deleteTour (@PathVariable (value="id") Integer id, @PathVariable (value="idUser") Integer idUser){
		return iTourService.delete(id, idUser);
	}
	
	@RequestMapping (value = "/deleteTour/{idUser}", method = RequestMethod.POST)
	public String deleteMultiTour (@RequestBody List<Integer> idList, @PathVariable Integer idUser){
		return iTourService.deleteMulti(idList, idUser);
	}
	

}

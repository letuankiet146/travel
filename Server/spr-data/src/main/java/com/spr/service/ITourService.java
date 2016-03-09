/**
 * 
 */
package com.spr.service;

import java.util.List;

import com.spr.dto.TourDto;
import com.spr.model.TourEntity;

/**
 * @author TuanKiet
 *	@Date Jan 8, 20167:58:19 AM
 */
public interface ITourService {
	/**
	 * list tours in database
	 * @return List<Tour>
	 */
	public List<TourDto> listTour ();
	
	public Integer add (TourDto tourDto);
	
	public List<TourDto> searchTour(TourDto tourDtoCondition);
	
	public String update (TourDto updateDto);

}

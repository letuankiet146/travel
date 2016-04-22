/**
 * 
 */
package com.travel.services;

import java.util.List;

import com.travel.dto.TourDto;



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
	
	public String update (TourDto updateDto);
	
	public String delete(Integer id, Integer userId);
	
	public String deleteMulti(List<Integer> idList, Integer idUser);

}

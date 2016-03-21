/**
 * 
 */
package com.spr.service;

import java.util.List;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;

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
	public Page<TourEntity> listTour (Pageable pageRequest);
	
	public Integer add (TourDto tourDto);
	
	public List<TourDto> searchTour(TourDto tourDtoCondition);
	
	public String update (TourDto updateDto);
	
	public String delete(Integer id, Integer userId);
	
	public String deleteMulti(List<Integer> idList, Integer idUser);

}

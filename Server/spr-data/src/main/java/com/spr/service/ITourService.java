/**
 * 
 */
package com.spr.service;

import java.util.List;

import com.spr.model.Tour;

/**
 * @author TuanKiet
 *	@Date Jan 8, 20167:58:19 AM
 */
public interface ITourService {
	/**
	 * list tours in database
	 * @return List<Tour>
	 */
	public List<Tour> listTour ();

}

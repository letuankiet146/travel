/**
 * 
 */
package com.spr.service;

import java.util.ArrayList;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.spr.model.Tour;
import com.spr.repository.TourRepository;

/**
 * @author TuanKiet
 *	@Date Jan 8, 20168:00:25 AM
 */
@Service
public class TourServiceImp implements ITourService {
	@Autowired 
	TourRepository tourRepo;
	
	@Transactional
	public List<Tour> listTour() {
		return tourRepo.findAll();
	}

}

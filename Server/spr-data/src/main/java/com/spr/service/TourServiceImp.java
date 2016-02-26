/**
 * 
 */
package com.spr.service;

import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.List;

import org.dozer.DozerBeanMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.spr.dto.TourDto;
import com.spr.model.TourEntity;
import com.spr.repository.TourRepository;

/**
 * @author TuanKiet
 *	@Date Jan 8, 20168:00:25 AM
 */
@Service
public class TourServiceImp implements ITourService {
	@Autowired 
	TourRepository tourRepo;
	
	@Autowired
	private DozerBeanMapper mapper;
	
	@Transactional
	public List<TourDto> listTour() {
		List<TourEntity> listTourEntity = tourRepo.findAll();
		List<TourDto> listTourDto = new ArrayList<TourDto>();
		SimpleDateFormat spdf = new SimpleDateFormat("dd/MM/yyyy");
		for (TourEntity tourEntity : listTourEntity){
			TourDto tourDto = new TourDto();
			tourDto = mapper.map(tourEntity, TourDto.class);
			tourDto.setNgayKH(spdf.format(tourEntity.getNgayKH()));
			tourDto.setNgayKT(spdf.format(tourEntity.getNgayKT()));
			listTourDto.add(tourDto);
		}
		return listTourDto;
	}

}

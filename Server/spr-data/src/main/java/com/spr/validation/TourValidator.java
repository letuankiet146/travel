package com.spr.validation;

import java.util.ArrayList;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import com.spr.dto.TourDto;
import com.spr.model.ArrivePlaceEntity;
import com.spr.model.FromPlaceEntity;
import com.spr.model.GuiderEntity;
import com.spr.model.ServicesEntity;
import com.spr.repository.ArrivePlaceRepository;
import com.spr.repository.FromPlaceRepository;
import com.spr.repository.GuiderRepository;
import com.spr.repository.ServicesRepository;

@Component
public class TourValidator {
	@Autowired 
	private ArrivePlaceRepository arrivePlaceRepository;
	
	@Autowired
	private FromPlaceRepository fromPlaceRepository;
	
	@Autowired
	private ServicesRepository servicesRepository;
	
	@Autowired
	private GuiderRepository guiderRepository;
	
	public List<String> checkExist(TourDto tourDto) {
		List<String> errorList = new ArrayList<String>();
		if (tourDto != null) {
			/*
			 * kiem tra dia diem den
			 */
			if (arrivePlaceRepository.exists(tourDto.getTourArrivePlaceIdDto())){
				ArrivePlaceEntity arrivePlaceEntity = arrivePlaceRepository.findOne(tourDto.getTourArrivePlaceIdDto());
				if (arrivePlaceEntity==null){
					errorList.add("Khong tim thay dia diem den");
				}
			}
			else {
				errorList.add("Khong tim thay dia diem den");
			}
			/*
			 * Kiem tra dia diem xuat pha
			 */
			if (fromPlaceRepository.exists(tourDto.getTourFromPlaceIdDto())){
				FromPlaceEntity fromPlaceEntity = fromPlaceRepository.findOne(tourDto.getTourFromPlaceIdDto());
				if (fromPlaceEntity==null){
					errorList.add("Khong tim thay dia diem xuat phat");
				}
			}
			else {
				errorList.add("Khong tim thay dia diem xuat phat");
			}
			/*
			 * Kiem tra goi dich vu
			 */
			if (servicesRepository.exists(tourDto.getIdDichVuDto())){
				ServicesEntity servicesEntity = servicesRepository.findOne(tourDto.getIdDichVuDto());
				if (servicesEntity==null){
					errorList.add("Khong tim thay goi dich vu");
				}
			}
			else {
				errorList.add("Khong tim thay goi dich vu");
			}
			/*
			 * Kiem tra huong dan vien du lich
			 */
			if (guiderRepository.exists(tourDto.getTourGuiderIdDto())){
				GuiderEntity guiderEntity = guiderRepository.findOne(tourDto.getTourGuiderIdDto());
				if (guiderEntity==null){
					errorList.add("Khong tim thay huong dan vien du lich");
				}
			}
			else {
				errorList.add("Khong tim thay huong dan vien du lich");
			}
		} else {
			errorList.add("Gia tri can kiem tra null");
		}
		return errorList;
	}
}


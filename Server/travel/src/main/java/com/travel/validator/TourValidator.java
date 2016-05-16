package com.travel.validator;

import java.util.ArrayList;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import com.travel.dto.TourDto;
import com.travel.model.ArrivePlaceEntity;
import com.travel.model.FromPlaceEntity;
import com.travel.model.ServicesEntity;
import com.travel.model.StaffEntity;
import com.travel.repository.ArrivePlaceRepository;
import com.travel.repository.FromPlaceRepository;
import com.travel.repository.ServicesRepository;
import com.travel.repository.StaffRepository;


@Component
public class TourValidator {
	@Autowired 
	private ArrivePlaceRepository arrivePlaceRepository;
	
	@Autowired
	private FromPlaceRepository fromPlaceRepository;
	
	@Autowired
	private ServicesRepository servicesRepository;
	
	@Autowired
	private StaffRepository staffRepo;
	
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
		} else {
			errorList.add("Gia tri can kiem tra null");
		}
		return errorList;
	}
}


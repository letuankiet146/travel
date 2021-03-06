/**
 * 
 */
package com.travel.services;

import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.OutputStream;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import org.apache.tomcat.util.codec.binary.Base64;
import org.dozer.DozerBeanMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.travel.dto.HistoryDto;
import com.travel.dto.TourDto;
import com.travel.model.FormOrderEntity;
import com.travel.model.TourEntity;
import com.travel.repository.FormOrderRepository;
import com.travel.repository.TourRepository;
import com.travel.util.MyFormatDate;
import com.travel.validator.TourValidator;





/**
 * @author TuanKiet
 *	@Date Jan 8, 20168:00:25 AM
 */
@Service
public class TourServiceImp implements ITourService {
	
	@Autowired
	FormOrderRepository formOrderRepo;
	
	@Autowired
	IHistoryServices historyInterface;
	
	@Autowired 
	TourRepository tourRepo;
	
	@Autowired
	private DozerBeanMapper mapper;
	
	@Autowired
	private TourValidator validator;
	
	@Transactional
	public List<TourDto> listTour() {
		List<TourEntity> listTourEntity = tourRepo.findAll();
		List<TourDto> listTourDto = new ArrayList<TourDto>();
		for (TourEntity tourEntity : listTourEntity){
			if (tourEntity.getTourDeleteDate()==null){
				TourDto tourDto = mapper.map(tourEntity, TourDto.class);
				tourDto.setNgayKHDto(MyFormatDate.dateToString(tourEntity.getNgayKH()));
				tourDto.setNgayKTDto(MyFormatDate.dateToString(tourEntity.getNgayKT()));
				listTourDto.add(tourDto);
			}
			
		}
		return listTourDto;
	}

	public Integer add(TourDto tourDto) {
		
		TourEntity tourEntity = new TourEntity();
		tourEntity = mapper.map(tourDto, TourEntity.class);
		tourEntity.setNgayKH(MyFormatDate.stringToDate(tourDto.getNgayKHDto()));
		tourEntity.setNgayKT(MyFormatDate.stringToDate(tourDto.getNgayKTDto()));
		
		tourRepo.saveAndFlush(tourEntity);
		
		return tourEntity.getId();
	}

	public String update(TourDto updateDto) {
		TourEntity tourEntity = tourRepo.findById(updateDto.getIdDto());
		TourDto tourDto = mapper.map(tourEntity, TourDto.class);
		tourDto.setNgayKHDto(MyFormatDate.dateToString(tourEntity.getNgayKH()));
		tourDto.setNgayKTDto(MyFormatDate.dateToString(tourEntity.getNgayKT()));
		tourDto.setDataUpdate(updateDto);
		List<String> errorList = validator.checkExist(tourDto);
		if (errorList.isEmpty()){
			tourEntity = mapper.map(tourDto, TourEntity.class);
			tourEntity.setNgayKH(MyFormatDate.stringToDate(tourDto.getNgayKHDto()));
			tourEntity.setNgayKT(MyFormatDate.stringToDate(tourDto.getNgayKTDto()));
			
			tourRepo.saveAndFlush(tourEntity);
			/*
			 * Save history
			 */
			HistoryDto historyDto = new HistoryDto();
			historyDto.setUser(tourDto.getIdUserAdd());
			historyDto.setAction("Update_Tour");
			historyDto.setContent("ID="+tourDto.getIdTourDto());
			historyInterface.add(historyDto);
			return "Update thanh cong";
		}
		String errorReturn ="";
		for (String error : errorList){
			errorReturn = errorReturn + "\n" +error;
		}
		return errorReturn;
	}
	
	public String delete(Integer id, Integer userId){
		if (id !=null && id > 0){
			if (tourRepo.exists(id)){
				TourEntity tourEntity = tourRepo.findOne(id);
				if (tourEntity.getTourDeleteDate()==null){
					List<FormOrderEntity> formList = formOrderRepo.findByFormOrderTourId(id);
					for (FormOrderEntity formEntity : formList){
						formOrderRepo.delete(formEntity.getFormOrderId());
					}
					tourRepo.delete(id);
					/*
					 * Save history
					 */
					HistoryDto historyDto = new HistoryDto();
					historyDto.setUser(userId);
					historyDto.setAction("Delete_Tour");
					historyDto.setContent("Xoa tour co id ="+tourEntity.getId());
					historyInterface.add(historyDto);
					return "Xoa thanh cong";
				}
				return "Khong tim thay tour de xoa";
			}
			return "Khong tim thay tour de xoa";
		}
		return "ID tour khong hop le";
	}

	public String deleteMulti(List<Integer> idList, Integer idUser) {
		if (idUser <=0){
			return "ID user khong hop le";
		}
		for (Integer id: idList){
			if (id <=0){
				return "ID tour khong hop le";
			}
			if (tourRepo.exists(id)){
				TourEntity tourEntity = tourRepo.findOne(id);
				tourEntity.setTourDeleteDate(new Date());
				tourRepo.saveAndFlush(tourEntity);
				/*
				 * Save history
				 */
				HistoryDto historyDto = new HistoryDto();
				historyDto.setUser(idUser);
				historyDto.setAction("Delete_Tour");
				historyDto.setContent("Xoa tour co id ="+tourEntity.getId());
				historyInterface.add(historyDto);
			}
		}
		return "Xoa thanh cong";
	}

}

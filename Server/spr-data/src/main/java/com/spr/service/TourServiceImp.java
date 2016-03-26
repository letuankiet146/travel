/**
 * 
 */
package com.spr.service;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import org.dozer.DozerBeanMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.spr.dto.HistoryDto;
import com.spr.dto.TourDto;
import com.spr.model.TourEntity;
import com.spr.repository.TourRepository;
import com.spr.util.MyFormatDate;
import com.spr.validation.TourValidator;

/**
 * @author TuanKiet
 *	@Date Jan 8, 20168:00:25 AM
 */
@Service
public class TourServiceImp implements ITourService {
	
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
		
		/*
		 * covert image path to byte
		 */
		File fileImage = new File(tourDto.getImageDto());
		byte[] bFile = new byte[(int)fileImage.length()];
		try {
			FileInputStream fis  =  new FileInputStream(fileImage);
			fis.read(bFile);
			fis.close();
		} catch (Exception e) {
			return -2;
		}
		tourEntity.setTourImageByte(bFile);
		tourRepo.saveAndFlush(tourEntity);
		/*
		 * Save history
		 */
		HistoryDto historyDto = new HistoryDto();
		historyDto.setUser(tourDto.getIdUserAdd());
		historyDto.setAction("Create_Tour");
		historyDto.setContent(tourDto.toString());
		historyInterface.add(historyDto);
		
		return tourDto.getIdDto();
	}

	public List<TourDto> searchTour(TourDto tourDtoCondition) {
		List<String> conditionList = new ArrayList<String>();
		conditionList.add(tourDtoCondition.getTenTourDto());
		conditionList.add(tourDtoCondition.getGiaTourDto().toString());
		conditionList.add(tourDtoCondition.getArrivePlaceDto().getArrivePlaceName());
		conditionList.add(MyFormatDate.stringToDate(tourDtoCondition.getNgayKHDto()).toString());
		conditionList.add(tourDtoCondition.getArrivePlaceDto().getArrivePlaceAreaId().toString());
		
		return null;
	}

	public String update(TourDto updateDto) {
		TourEntity tourEntity = tourRepo.findOne(updateDto.getIdDto());
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
			historyDto.setContent(tourDto.toString());
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
					tourEntity.setTourDeleteDate(new Date());
					tourRepo.saveAndFlush(tourEntity);
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

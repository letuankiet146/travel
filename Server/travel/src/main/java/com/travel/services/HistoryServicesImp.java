package com.travel.services;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import org.dozer.DozerBeanMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.travel.dto.HistoryDto;
import com.travel.model.HistoryEntity;
import com.travel.repository.HistoryRepository;


@Service
public class HistoryServicesImp implements IHistoryServices {

	@Autowired
	private HistoryRepository historyRepo;

	@Autowired
	private DozerBeanMapper mapper;

	public String add(HistoryDto historyDto) {
		HistoryEntity historyEntity = mapper.map(historyDto,
				HistoryEntity.class);
		historyEntity.setCreateDate(new Date());
		historyRepo.saveAndFlush(historyEntity);
		return "Them thanh cong";
	}

	public String delete(Integer id) {
		if (historyRepo.exists(id)) {
			historyRepo.delete(id);
			return "Xoa thanh cong";
		}
		return "Khong tim thay du lieu de xoa";
	}

	public String update(HistoryDto historyDto) {
		HistoryEntity historyEntity = historyRepo.findOne(historyDto.getId());
		if (historyEntity!=null){
			HistoryDto historyDtoOld = mapper.map(historyEntity, HistoryDto.class);
			mapper.map(historyDto, historyDtoOld);
			historyEntity = mapper.map(historyDtoOld, HistoryEntity.class);
			historyRepo.saveAndFlush(historyEntity);
			return "Cap nhat lich su thanh cong";
		}
		return "Khong tim thay du lieu de update";
	}

	public List<HistoryDto> listAll() {
		List<HistoryDto> historyDtoList = new ArrayList<HistoryDto>();
		List<HistoryEntity> historyEntityList = historyRepo.findAll();
		for (HistoryEntity historyEntity : historyEntityList) {
			historyDtoList.add(mapper.map(historyEntity, HistoryDto.class));
		}
		return historyDtoList;
	}

	public HistoryDto listId(Integer id) {
		HistoryDto historyDto = mapper.map(historyRepo.findOne(id),
				HistoryDto.class);
		return historyDto;
	}

	public String deleteMulti(List<Integer> idList) {
		for (Integer id : idList){
			if (id<=0){
				return "Xoa khong thanh cong";
			}
			if (historyRepo.exists(id)){
				historyRepo.delete(id);
			}
		}
		return "Xoa thanh cong";
	}

}

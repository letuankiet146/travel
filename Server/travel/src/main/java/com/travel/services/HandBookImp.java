package com.travel.services;

import org.dozer.DozerBeanMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.travel.dto.HandBookDto;
import com.travel.dto.HistoryDto;
import com.travel.model.HandBookEntity;
import com.travel.repository.HandBookRepository;
import com.travel.util.IUtilMethod;
import com.travel.util.MyFormatDate;

@Service
public class HandBookImp implements IHandBook {
	
	@Autowired
	private DozerBeanMapper mapper;
	
	@Autowired
	private HandBookRepository handBookRepo;
	
	@Autowired
	private IHistoryServices historyInterface;
	
	@Autowired
	private IUtilMethod utilMethod;
	
	@Override
	public String add(HandBookDto handBookDto) {
		HandBookEntity handBookEntity = mapper.map(handBookDto, HandBookEntity.class);
		handBookRepo.saveAndFlush(handBookEntity);
		/*
		 * Save history
		 */
		HistoryDto historyDto = new HistoryDto();
		historyDto.setUser(handBookDto.getIdUserAdd());
		historyDto.setAction("Create_HandBook");
		historyDto.setContent("ID="+handBookEntity.getId());
		historyInterface.add(historyDto);
		return "Them thanh cong";
	}

	@Override
	public String delete(int id, int idUserAdd) {
		if (handBookRepo.exists(id)){
			handBookRepo.delete(id);
			/*
			 * Save history
			 */
			HistoryDto historyDto = new HistoryDto();
			historyDto.setUser(idUserAdd);
			historyDto.setAction("Delete_HandBook");
			historyDto.setContent("ID="+id);
			historyInterface.add(historyDto);
			return "Xoa thanh cong";
		}
		return "Khong tim thay ID";
	}

	@Override
	public String update(HandBookDto handBookDto) {
		HandBookEntity handBookEntity = handBookRepo.findOne(handBookDto.getId());
		if (handBookEntity!=null){
			HandBookDto handBookDto2 = mapper.map(handBookEntity, HandBookDto.class);
			handBookDto2.setDateCreateDto(MyFormatDate.dateToString(handBookEntity.getDateCreate()));
			handBookDto2.setDataUpdate(handBookDto);
			handBookEntity = mapper.map(handBookDto2, HandBookEntity.class);
			handBookEntity.setDateCreate(MyFormatDate.stringToDate(handBookDto2.getDateCreateDto()));
			handBookRepo.saveAndFlush(handBookEntity);
			/*
			 * Save history
			 */
			HistoryDto historyDto = new HistoryDto();
			historyDto.setUser(handBookDto.getIdUserAdd());
			historyDto.setAction("Update_HandBook");
			historyDto.setContent("ID="+handBookDto.getId());
			historyInterface.add(historyDto);
		}
		return "Update thanh cong";
	}

	@Override
	public HandBookDto list(int id) {
		HandBookEntity handBookEntity = handBookRepo.findOne(id);
		return mapper.map(handBookEntity, HandBookDto.class);
	}

}

package com.travel.services;

import java.util.ArrayList;
import java.util.List;

import org.dozer.DozerBeanMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.travel.dto.HistoryDto;
import com.travel.dto.StaffDto;
import com.travel.model.StaffEntity;
import com.travel.repository.StaffRepository;

@Service
public class StaffServcesImp implements IStaffService {
	
	@Autowired 
	private StaffRepository staffRepository;
	
	@Autowired
	private IHistoryServices historyInterface;
	
	@Autowired
	private DozerBeanMapper mapper;

	@Override
	public String add(StaffDto staffDto) {
		StaffEntity staffEntity = mapper.map(staffDto, StaffEntity.class);
		staffRepository.saveAndFlush(staffEntity);
		/*
		 * Save history
		 */
		HistoryDto historyDto = new HistoryDto();
		historyDto.setUser(staffDto.getIdUserAdd());
		historyDto.setAction("Create_Staff");
		historyDto.setContent("ID="+staffEntity.getStaffId());
		historyInterface.add(historyDto);
		return "Them thanh cong";
	}

	@Override
	public String delete(Integer id, Integer idUserAdd) {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public String update(StaffDto staffDto) {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public List<StaffDto> list() {
		List<StaffDto> staffDtoList = new ArrayList<>();
		List<StaffEntity> staffEntityList = staffRepository.findAll();
		for (StaffEntity staffEntity : staffEntityList){
			StaffDto staffDto = mapper.map(staffEntity, StaffDto.class);
			staffDtoList.add(staffDto);
		}
		return staffDtoList;
	}

}

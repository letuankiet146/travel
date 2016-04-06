package com.travel.services;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import org.dozer.DozerBeanMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.travel.dto.HistoryDto;
import com.travel.dto.StaffDto;
import com.travel.model.StaffEntity;
import com.travel.repository.StaffRepository;
import com.travel.util.MyFormatDate;

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
		if (staffDto.getStaffDateStartDto()!=null){
			staffEntity.setStaffDateStart(MyFormatDate.stringToDate(staffDto.getStaffDateStartDto()));
		}
		if (staffDto.getStaffBirthdayDto()!=null){
			staffEntity.setStaffBirthday(MyFormatDate.stringToDate(staffDto.getStaffBirthdayDto()));
		}
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
		
		if (staffRepository.exists(id)){
			/*
			 * Save history
			 */
			StaffEntity staffEntity = staffRepository.findOne(id);
			staffEntity.setStaffDeleteDate(new Date());
			staffRepository.saveAndFlush(staffEntity);
			
			HistoryDto historyDto = new HistoryDto();
			historyDto.setUser(idUserAdd);
			historyDto.setAction("Delete_Staff");
			historyDto.setContent("ID="+id);
			historyInterface.add(historyDto);
			return "Xoa thanh cong";
		}
		return "Xoa khong thanh cong";
		
	}

	@Override
	public String update(StaffDto staffDto) {
		StaffEntity staffEntity = staffRepository.findOne(staffDto.getStaffIdDto());
		StaffDto staffDto2 = mapper.map(staffEntity, StaffDto.class);
		staffDto2.setDataUpdate(staffDto);
		staffEntity = mapper.map(staffDto2, StaffEntity.class);
		if (staffDto.getStaffDateStartDto()!=null){
			staffEntity.setStaffDateStart(MyFormatDate.stringToDate(staffDto.getStaffDateStartDto()));
		}
		if (staffDto.getStaffBirthdayDto()!=null){
			staffEntity.setStaffBirthday(MyFormatDate.stringToDate(staffDto.getStaffBirthdayDto()));
		}
		staffRepository.saveAndFlush(staffEntity);
		/*
		 * Save history
		 */
		HistoryDto historyDto = new HistoryDto();
		historyDto.setUser(staffDto.getIdUserAdd());
		historyDto.setAction("Update_Staff");
		historyDto.setContent("ID="+staffDto.getStaffIdDto());
		historyInterface.add(historyDto);
		return "Update thanh cong";
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

package com.travel.services;

import java.util.List;

import com.travel.dto.StaffDto;

public interface IStaffService {
	
	public String add (StaffDto staffDto);
	public String delete (Integer id, Integer idUserAdd);
	public String update (StaffDto staffDto);
	public List<StaffDto> list ();
}

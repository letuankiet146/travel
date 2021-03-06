package com.travel.api;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.travel.dto.StaffDto;
import com.travel.services.IStaffService;

@RestController
@RequestMapping("/staff")
public class StaffController {
	@Autowired
	private IStaffService staffService;
	
	@RequestMapping(value ="/list")
	public List<StaffDto> list (){
		return staffService.list();
	}
	
	@RequestMapping(value ="/add")
	public String add (@RequestBody StaffDto staffDto){
		return staffService.add(staffDto);
	}
	
	@RequestMapping (value="/update")
	public String update (@RequestBody StaffDto staffDto){
		return staffService.update(staffDto);
	}
	
	@RequestMapping(value="delete/{id}/{idUserAdd}")
	public String delete(@PathVariable Integer id, @PathVariable Integer idUserAdd){
		return staffService.delete(id, idUserAdd);
	}
}

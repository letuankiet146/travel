package com.travel.api;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.travel.dto.HandBookDto;
import com.travel.services.IHandBook;

@RestController
@RequestMapping("/handbook")
public class HandBookController {
	@Autowired
	private IHandBook service;
	
	@RequestMapping(value="/list/{id}")
	public HandBookDto list (@PathVariable int id){
		return service.list(id);
	}
	
	@RequestMapping(value="/add")
	public String add (@RequestBody HandBookDto handBookDto){
		return service.add(handBookDto);
	}
	
	@RequestMapping(value="/update")
	public String update (@RequestBody HandBookDto handBookDto){
		return service.update(handBookDto);
	}
	
	@RequestMapping(value="/delete/{id}/{idUserAdd}")
	public String delete (@PathVariable int id, @PathVariable int idUserAdd){
		return service.delete(id, idUserAdd);
	}
	

}

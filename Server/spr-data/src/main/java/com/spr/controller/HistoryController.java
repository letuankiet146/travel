package com.spr.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.spr.dto.HistoryDto;
import com.spr.service.IHistoryServices;

@RestController
@RequestMapping("/history")
public class HistoryController {
	@Autowired
	private IHistoryServices historyInterface;
	
	@RequestMapping(value="/list")
	public List<HistoryDto> list (){
		List<HistoryDto> historyDtoList = historyInterface.listAll();
		return historyDtoList;
	}
	
	@RequestMapping(value="/list/{id}")
	public HistoryDto list (@PathVariable Integer id){
		HistoryDto historyDto = historyInterface.listId(id);
		return historyDto;
	}
	
	@RequestMapping(value = "/add")
	public String add (@RequestBody HistoryDto historyDto){
		return historyInterface.add(historyDto);
	}
	
	@RequestMapping(value="/delete/{id}")
	public String delete (@PathVariable Integer id){
		return historyInterface.delete(id);
	}
	
	@RequestMapping (value = "/update")
	public String update (@RequestBody HistoryDto historyDto){
		return historyInterface.update(historyDto);
	}
	

}

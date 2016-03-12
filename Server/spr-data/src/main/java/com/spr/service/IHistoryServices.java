package com.spr.service;

import java.util.List;

import com.spr.dto.HistoryDto;

public interface IHistoryServices {
	
	public String add (HistoryDto historyDto);
	public String delete (Integer id);
	public String update (HistoryDto historyDto);
	public List<HistoryDto> listAll ();
	public HistoryDto listId(Integer id);
}

package com.travel.services;

import java.util.List;

import com.travel.dto.HistoryDto;


public interface IHistoryServices {
	
	public String add (HistoryDto historyDto);
	public String delete (Integer id);
	public String update (HistoryDto historyDto);
	public List<HistoryDto> listAll ();
	public HistoryDto listId(Integer id);
	public String deleteMulti(List<Integer> idList);
}

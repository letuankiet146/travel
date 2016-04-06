package com.travel.services;

import com.travel.dto.HandBookDto;

public interface IHandBook {
	public String add (HandBookDto handBookDto);
	public String delete (int id, int idUserAdd);
	public String update (HandBookDto handBookDto);
	public HandBookDto list (int id);
	public String sendMail(String email);

}

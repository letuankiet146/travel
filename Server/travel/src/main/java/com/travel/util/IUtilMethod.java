package com.travel.util;

import com.travel.dto.ContentEmail;
import com.travel.dto.FormOrderDto;

public interface IUtilMethod {
	public int sendEmail(ContentEmail content);
	
	public String createPassword();
	
	public String encodePassword(String password);
	
	public int checkOrderTour (FormOrderDto formOrderDto);
}

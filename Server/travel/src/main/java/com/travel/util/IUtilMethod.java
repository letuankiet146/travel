package com.travel.util;

import com.travel.dto.ContentEmail;

public interface IUtilMethod {
	public int sendEmail(ContentEmail content);
	
	public String createPassword();
	
	public String encodePassword(String password);
}

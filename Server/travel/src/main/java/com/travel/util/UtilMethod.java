package com.travel.util;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.mail.SimpleMailMessage;
import org.springframework.mail.javamail.JavaMailSender;
import org.springframework.stereotype.Component;

@Component
public class UtilMethod implements IUtilMethod {
	@Autowired
	private JavaMailSender mailSender;
	
	@Override
	public int sendEmail(String emailAddress) {
		SimpleMailMessage message = new SimpleMailMessage();
		message.setTo(emailAddress);
		message.setSubject("Demo spring send mail");
		message.setText("Hello Spring boot");
		mailSender.send(message);
		return 0;
	}

}

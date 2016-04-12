package com.travel.util;

import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.Random;

import org.apache.commons.codec.binary.Hex;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.mail.SimpleMailMessage;
import org.springframework.mail.javamail.JavaMailSender;
import org.springframework.stereotype.Component;

import com.travel.dto.ContentEmail;

@Component
public class UtilMethod implements IUtilMethod {
	@Autowired
	private JavaMailSender mailSender;

	@Override
	public int sendEmail(ContentEmail content) {
		SimpleMailMessage message = new SimpleMailMessage();
		message.setTo(content.getTo());
		message.setSubject(content.getSubject());
		message.setText(content.getContent().toString());
		mailSender.send(message);
		return 0;
	}

	@Override
	public String createPassword() {
		StringBuilder passwordMd5 = new StringBuilder();
		 Random r = new Random();
		    for (int i = 0; i < 8; i++) {
		    	char c = (char)(r.nextInt(26)+'a');
		    	passwordMd5.append(c);
		    }
		    
		return passwordMd5.toString();
	}

	@Override
	public String encodePassword(String password) {
		byte[] byteOfPass = password.getBytes();
		MessageDigest md;
		try {
			md = MessageDigest.getInstance("MD5");
			byte[] passwordEncoded = md.digest(byteOfPass);
			String result = new String(Hex.encodeHex(passwordEncoded));
			return result;
		} catch (NoSuchAlgorithmException e) {
			e.printStackTrace();
			return null;
		}
		
		
	}
}

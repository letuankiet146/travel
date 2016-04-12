package com.travel.dto;

import lombok.Data;

@Data
public class ContentEmail {
	String from;
	String to;
	String subject;
	StringBuilder content;
	public ContentEmail(String from, String to, String subject, StringBuilder content){
		this.from = from;
		this.to = to;
		this.subject = subject;
		this.content = content;
	}
}

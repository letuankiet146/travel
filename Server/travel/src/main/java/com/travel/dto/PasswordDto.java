package com.travel.dto;

import lombok.Data;

@Data
public class PasswordDto {
	private int customerId;
	private String oldPassword;
	private String newPassword;
	private String verifyCode;
}

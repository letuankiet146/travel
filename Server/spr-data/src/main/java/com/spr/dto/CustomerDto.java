/**
 * 
 */
package com.spr.dto;

import java.util.Date;

import javax.persistence.Column;

import org.dozer.Mapping;

import lombok.Data;


/**
 * @author TuanKiet
 *
 */
@Data
public class CustomerDto {
	@Mapping("customerId")
	private Integer customerIdDto;
	
	@Mapping("customerName")
	private String customerNameDto;
	
//	@Mapping("customerName")
	private String customerBirthDto;
	
	@Mapping("customerSex")
	private Integer customerSexDto;
	
	@Mapping("customerPhone")
	private String customerPhoneDto;
	
	@Mapping("customerEmail")
	private String customerEmailDto;
	
	@Mapping("customerAddress")
	private String customerAddressDto;
	
	@Mapping("customerVietNamId")
	private String customerVietNamIdDto;
	
	@Mapping("customerCompanyName")
	private String customerCompanyNameDto;
	
	@Mapping("customerAddressCompany")
	private String customerAddressCompanyDto;
	
	@Mapping("customerPhoneCompany")
	private String customerPhoneCompanyDto;
	
	@Mapping("customerImage")
	private String customerImageDto;
	
	@Mapping("customerUser")
	private String customerUserDto;

	@Mapping("customerPassword")
	private String customerPasswordDto;

	@Mapping("customerType")
	private Integer customerTypeDto;

	@Mapping("customerLock")
	private Integer customerLockDto;
	
	@Mapping("customerDeleteDate")
	private Date customerDeleteDateDto;
}

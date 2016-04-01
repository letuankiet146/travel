/**
 * 
 */
package com.travel.dto;

import java.util.Date;

import javax.persistence.Column;

import lombok.Data;

import org.dozer.Mapping;


/**
 * @author TuanKiet
 *
 */
@Data
public class CustomerDto {
	@Mapping("customerId")
	private Integer customerIdDto;
	
	@Mapping ("customerCode")
	private String customerCode;
	
	@Mapping("customerName")
	private String customerNameDto;
	
//	@Mapping("customerBirth")
	private String customerBirthDto;
	
	@Mapping("customerSex")
	private String customerSexDto;
	
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
	
	@Mapping("customerGroup")
	private Integer customerGroupDto;
	
	@Mapping("customerCity")
	private Integer customerCityDto;
	
	@Mapping("customerCountry")
	private Integer customerCountryDto;
	
	@Mapping("customerNote")
	private String customerNoteDto;
	
	private Integer idUserAdd;
}

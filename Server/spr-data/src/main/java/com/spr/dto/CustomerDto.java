/**
 * 
 */
package com.spr.dto;

import java.util.Date;

import org.dozer.Mapping;

import lombok.Data;

import com.spr.model.AccountEntity;

/**
 * @author TuanKiet
 *
 */
@Data
public class CustomerDto {
	@Mapping("customerId")
	private Integer customerId;
	
	@Mapping("customerName")
	private String customerName;
	
	private String customerBirth;
	
	@Mapping("customerSex")
	private Integer customerSex;
	
	@Mapping("customerPhone")
	private String customerPhone;
	
	@Mapping("customerEmail")
	private String customerEmail;
	
	@Mapping("customerAddress")
	private String customerAddress;
	
	@Mapping("customerVietNamId")
	private String customerVietNamId;
	
	@Mapping("customerCompanyName")
	private String customerCompanyName;
	
	@Mapping("customerAddressCompany")
	private String customerAddressCompany;
	
	@Mapping("customerPhoneCompany")
	private String customerPhoneCompany;
	
	@Mapping("customerImage")
	private String customerImage;
	
	@Mapping("customerAccountId")
	private AccountEntity customerAccountId;
	
	@Mapping("customerDeleteDate")
	private Date customerDeleteDate;
}

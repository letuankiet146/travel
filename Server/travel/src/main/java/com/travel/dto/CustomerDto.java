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
	
	@Mapping("customerVerifyCode")
	private String customerVerifyCodeDto;
	
	@Mapping("customerNewPassword")
	private String customerNewPasswordDto;
	
	private Integer idUserAdd;
	
	public void setUpdateData (CustomerDto customerDto){
		if (customerDto.getCustomerNameDto() !=null){
			this.customerNameDto = customerDto.getCustomerNameDto();
		}
		
		if (customerDto.getCustomerBirthDto() !=null){
			this.customerBirthDto = customerDto.getCustomerBirthDto();
		}
		
		if (customerDto.getCustomerSexDto() !=null){
			this.customerSexDto = customerDto.getCustomerSexDto();
		}
		
		if (customerDto.getCustomerPhoneDto() !=null){
			this.customerPhoneDto = customerDto.getCustomerPhoneDto();
		}
		
		if (customerDto.getCustomerEmailDto() !=null){
			this.customerEmailDto = customerDto.getCustomerEmailDto();
		}
		
		if (customerDto.getCustomerAddressDto() !=null){
			this.customerAddressDto = customerDto.getCustomerAddressDto();
		}
		
		if (customerDto.getCustomerVietNamIdDto() !=null){
			this.customerVietNamIdDto = customerDto.getCustomerVietNamIdDto();
		}
		
		if (customerDto.getCustomerCompanyNameDto() !=null){
			this.customerCompanyNameDto = customerDto.getCustomerCompanyNameDto();
		}
		
		if (customerDto.getCustomerAddressCompanyDto() !=null){
			this.customerAddressCompanyDto = customerDto.getCustomerAddressCompanyDto();
		}
		
		if (customerDto.getCustomerPhoneCompanyDto() !=null){
			this.customerPhoneCompanyDto = customerDto.getCustomerPhoneCompanyDto();
		}
		
		if (customerDto.getCustomerImageDto() !=null){
			this.customerImageDto = customerDto.getCustomerImageDto();
		}
		
		if (customerDto.getCustomerPasswordDto() !=null){
			this.customerPasswordDto = customerDto.getCustomerPasswordDto();
		}
		
		if (customerDto.getCustomerTypeDto() !=null){
			this.customerTypeDto = customerDto.getCustomerTypeDto();
		}
		
		if (customerDto.getCustomerLockDto() !=null){
			this.customerLockDto = customerDto.getCustomerLockDto();
		}
		
		if (customerDto.getCustomerGroupDto() !=null){
			this.customerGroupDto = customerDto.getCustomerGroupDto();
		}
		
		if (customerDto.getCustomerCityDto() !=null){
			this.customerCityDto = customerDto.getCustomerCityDto();
		}
		
		if (customerDto.getCustomerNoteDto() !=null){
			this.customerNoteDto = customerDto.getCustomerNoteDto();
		}
		
		if (customerDto.getIdUserAdd() !=null){
			this.idUserAdd = customerDto.getIdUserAdd();
		}
		if (customerDto.getCustomerVerifyCodeDto() !=null){
			this.customerVerifyCodeDto = customerDto.getCustomerVerifyCodeDto();
		}
		if (customerDto.getCustomerNewPasswordDto() !=null){
			this.customerNewPasswordDto = customerDto.getCustomerNewPasswordDto();
		}
	}
}

package com.travel.model;


import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;
import javax.validation.constraints.Size;

import lombok.Data;

/**
 * 
 * @author TuanKiet
 *
 */
@Entity
@Table(name="customer")
@Data
public class CustomerEntity {
	@Id
	@GeneratedValue (strategy = GenerationType.IDENTITY)
	@Column (name = "customer_id")
	private Integer customerId;
	
	@Column(name="customer_code")
	private String customerCode;
	
	@Column(name="customer_name")
	private String customerName;
	
	@Column(name="customer_birth")
	private Date customerBirth;
	
	@Column(name="customer_sex")
	private String customerSex;
	
	@Column(name="customer_phone")
	private String customerPhone;
	
	@Column(name="customer_email")
	private String customerEmail;
	
	@Column (name="customer_address")
	private String customerAddress;
	
	@Column(name="customer_vietnam_id")
	private String customerVietNamId;
	
	@Column(name="customer_company_name")
	private String customerCompanyName;
	
	@Column(name="customer_address_company")
	private String customerAddressCompany;
	
	@Column(name="customer_phone_company")
	private String customerPhoneCompany;
	
	@Column(name="customer_image")
	private String customerImage;
	
	@Column (name = "customer_delete_date")
	private Date customerDeleteDate;
	
	@Column(name = "customer_password")
	private String customerPassword;

	@Column(name = "customer_type")
	private Integer customerType;

	@Column(name = "customer_lock")
	private Integer customerLock;
	
	@Column(name="customer_group")
	private Integer customerGroup;
	
	@Column(name="customer_city")
	private Integer customerCity;
	
	@Column(name="customer_country")
	private Integer customerCountry;
	
	@Column(name="customer_note")
	private String customerNote;
	
	
//	public void setData (CustomerDto customerDto){
//		this.customerId = customerDto.getCustomerIdDto();
//		this.customerName = customerDto.getCustomerNameDto();
//		this.customerSex  = customerDto.getCustomerSexDto();
//		this.customerPhone =customerDto.getCustomerPhoneDto();
//		this.customerEmail = customerDto.getCustomerEmailDto();
//		this.customerAddress = customerDto.getCustomerAddressDto();
//		this.customerVietNamId = customerDto.getCustomerVietNamIdDto();
//		this.customerCompanyName =  customerDto.getCustomerCompanyNameDto();
//		this.customerAddressCompany = customerDto.getCustomerAddressCompanyDto();
//		this.customerPhoneCompany = customerDto.getCustomerPhoneCompanyDto();
//		this.customerUser = customerDto.getCustomerUserDto();
//		this.customerPassword = customerDto.getCustomerPasswordDto();
//		this.customerType = customerDto.getCustomerTypeDto();
//		this.customerLock = customerDto.getCustomerLockDto();
//		this.customerImage = customerDto.getCustomerImageDto();
//		this.customerDeleteDate = customerDto.getCustomerDeleteDateDto();
//		
//	}
}

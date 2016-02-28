package com.spr.model;


import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;
import javax.validation.constraints.Size;

import com.spr.dto.CustomerDto;

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
	@Column(name="customer_id")
	private Integer customerId;
	
	@Column(name="customer_name")
	private String customerName;
	
	@Column(name="customer_birth")
	private Date customerBirth;
	
	@Column(name="customer_sex")
	private Integer customerSex;
	
	@Size(min=10, max=11)
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
	
	@ManyToOne
	@JoinColumn (name="customer_account_id")
	private AccountEntity customerAccountId;
	
	@Column (name = "customer_delete_date")
	private Date customerDeleteDate;
	
	public void setData (CustomerDto customerDto){
		this.customerId = customerDto.getCustomerId();
		this.customerName = customerDto.getCustomerName();
		this.customerSex  = customerDto.getCustomerSex();
		this.customerPhone =customerDto.getCustomerPhone();
		this.customerEmail = customerDto.getCustomerEmail();
		this.customerAddress = customerDto.getCustomerAddress();
		this.customerVietNamId = customerDto.getCustomerVietNamId();
		this.customerCompanyName =  customerDto.getCustomerCompanyName();
		this.customerAddressCompany = customerDto.getCustomerAddressCompany();
		this.customerPhoneCompany = customerDto.getCustomerPhoneCompany();
		this.customerImage = customerDto.getCustomerImage();
		this.customerAccountId =  customerDto.getCustomerAccountId();
		this.customerDeleteDate = customerDto.getCustomerDeleteDate();
		
	}
}

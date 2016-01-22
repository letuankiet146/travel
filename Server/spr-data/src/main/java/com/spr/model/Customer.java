package com.spr.model;

import java.sql.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;

/**
 * 
 * @author TuanKiet
 *
 */
@Entity
@Table(name="customer")
public class Customer {
	@Id
	@Column(name="customer_id")
	private Integer customerId;
	
	@Column(name="customer_name")
	private String customerName;
	
	@Column(name="customer_birth")
	private Date customerBirth;
	
	@Column(name="customer_sex")
	private Integer customerSex;
	
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
	private Account customerAccountId;

	/**
	 * @return the customerId
	 */
	public Integer getCustomerId() {
		return customerId;
	}

	/**
	 * @param customerId the customerId to set
	 */
	public void setCustomerId(Integer customerId) {
		this.customerId = customerId;
	}

	/**
	 * @return the customerName
	 */
	public String getCustomerName() {
		return customerName;
	}

	/**
	 * @param customerName the customerName to set
	 */
	public void setCustomerName(String customerName) {
		this.customerName = customerName;
	}

	/**
	 * @return the customerBirth
	 */
	public Date getCustomerBirth() {
		return customerBirth;
	}

	/**
	 * @param customerBirth the customerBirth to set
	 */
	public void setCustomerBirth(Date customerBirth) {
		this.customerBirth = customerBirth;
	}

	/**
	 * @return the customerSex
	 */
	public Integer getCustomerSex() {
		return customerSex;
	}

	/**
	 * @param customerSex the customerSex to set
	 */
	public void setCustomerSex(Integer customerSex) {
		this.customerSex = customerSex;
	}

	/**
	 * @return the customerPhone
	 */
	public String getCustomerPhone() {
		return customerPhone;
	}

	/**
	 * @param customerPhone the customerPhone to set
	 */
	public void setCustomerPhone(String customerPhone) {
		this.customerPhone = customerPhone;
	}

	/**
	 * @return the customerEmail
	 */
	public String getCustomerEmail() {
		return customerEmail;
	}

	/**
	 * @param customerEmail the customerEmail to set
	 */
	public void setCustomerEmail(String customerEmail) {
		this.customerEmail = customerEmail;
	}

	/**
	 * @return the customerAddress
	 */
	public String getCustomerAddress() {
		return customerAddress;
	}

	/**
	 * @param customerAddress the customerAddress to set
	 */
	public void setCustomerAddress(String customerAddress) {
		this.customerAddress = customerAddress;
	}

	/**
	 * @return the customerVietNamId
	 */
	public String getCustomerVietNamId() {
		return customerVietNamId;
	}

	/**
	 * @param customerVietNamId the customerVietNamId to set
	 */
	public void setCustomerVietNamId(String customerVietNamId) {
		this.customerVietNamId = customerVietNamId;
	}

	/**
	 * @return the customerCompanyName
	 */
	public String getCustomerCompanyName() {
		return customerCompanyName;
	}

	/**
	 * @param customerCompanyName the customerCompanyName to set
	 */
	public void setCustomerCompanyName(String customerCompanyName) {
		this.customerCompanyName = customerCompanyName;
	}

	/**
	 * @return the customerAddressCompany
	 */
	public String getCustomerAddressCompany() {
		return customerAddressCompany;
	}

	/**
	 * @param customerAddressCompany the customerAddressCompany to set
	 */
	public void setCustomerAddressCompany(String customerAddressCompany) {
		this.customerAddressCompany = customerAddressCompany;
	}

	/**
	 * @return the customerPhoneCompany
	 */
	public String getCustomerPhoneCompany() {
		return customerPhoneCompany;
	}

	/**
	 * @param customerPhoneCompany the customerPhoneCompany to set
	 */
	public void setCustomerPhoneCompany(String customerPhoneCompany) {
		this.customerPhoneCompany = customerPhoneCompany;
	}

	/**
	 * @return the customerImage
	 */
	public String getCustomerImage() {
		return customerImage;
	}

	/**
	 * @param customerImage the customerImage to set
	 */
	public void setCustomerImage(String customerImage) {
		this.customerImage = customerImage;
	}

	/**
	 * @return the customerAccountId
	 */
	public Account getCustomerAccountId() {
		return customerAccountId;
	}

	/**
	 * @param customerAccountId the customerAccountId to set
	 */
	public void setCustomerAccountId(Account customerAccountId) {
		this.customerAccountId = customerAccountId;
	}
	
	

}

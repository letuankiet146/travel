package com.spr.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

/**
 * 
 * @author TuanKiet
 *
 */
@Entity
@Table(name="guider")
public class Guider {
	@Id
	@Column(name="guider_id")
	private Integer guiderId;
	
	@Column(name="guider_name")
	private String guiderName;
	
	@Column(name="guider_birth")
	private String guiderBirth;
	
	@Column(name="guider_sex")
	private Integer guiderSex;
	
	@Column(name="guider_phone")
	private String guiderPhone;
	
	@Column(name="guider_email")
	private String guiderEmail;
	
	@Column(name="guider_address")
	private String guiderAddress;
	
	@Column(name="guider_vietnam_id")
	private String guiderVietNamId;
	
	@Column(name="customer_image")
	private String customerImage;

	/**
	 * @return the guiderId
	 */
	public Integer getGuiderId() {
		return guiderId;
	}

	/**
	 * @param guiderId the guiderId to set
	 */
	public void setGuiderId(Integer guiderId) {
		this.guiderId = guiderId;
	}

	/**
	 * @return the guiderName
	 */
	public String getGuiderName() {
		return guiderName;
	}

	/**
	 * @param guiderName the guiderName to set
	 */
	public void setGuiderName(String guiderName) {
		this.guiderName = guiderName;
	}

	/**
	 * @return the guiderBirth
	 */
	public String getGuiderBirth() {
		return guiderBirth;
	}

	/**
	 * @param guiderBirth the guiderBirth to set
	 */
	public void setGuiderBirth(String guiderBirth) {
		this.guiderBirth = guiderBirth;
	}

	/**
	 * @return the guiderSex
	 */
	public Integer getGuiderSex() {
		return guiderSex;
	}

	/**
	 * @param guiderSex the guiderSex to set
	 */
	public void setGuiderSex(Integer guiderSex) {
		this.guiderSex = guiderSex;
	}

	/**
	 * @return the guiderPhone
	 */
	public String getGuiderPhone() {
		return guiderPhone;
	}

	/**
	 * @param guiderPhone the guiderPhone to set
	 */
	public void setGuiderPhone(String guiderPhone) {
		this.guiderPhone = guiderPhone;
	}

	/**
	 * @return the guiderEmail
	 */
	public String getGuiderEmail() {
		return guiderEmail;
	}

	/**
	 * @param guiderEmail the guiderEmail to set
	 */
	public void setGuiderEmail(String guiderEmail) {
		this.guiderEmail = guiderEmail;
	}

	/**
	 * @return the guiderAddress
	 */
	public String getGuiderAddress() {
		return guiderAddress;
	}

	/**
	 * @param guiderAddress the guiderAddress to set
	 */
	public void setGuiderAddress(String guiderAddress) {
		this.guiderAddress = guiderAddress;
	}

	/**
	 * @return the guiderVietNamId
	 */
	public String getGuiderVietNamId() {
		return guiderVietNamId;
	}

	/**
	 * @param guiderVietNamId the guiderVietNamId to set
	 */
	public void setGuiderVietNamId(String guiderVietNamId) {
		this.guiderVietNamId = guiderVietNamId;
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
}

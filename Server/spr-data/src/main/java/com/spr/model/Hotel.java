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
@Table(name="hotel")
public class Hotel {
	@Id
	@Column(name="hotel_id")
	private Integer hotelId;
	
	@Column(name="hotel_name")
	private String hotelName;
	
	@Column(name="hotel_info")
	private String hotelInfo;
	
	@Column(name="hotel_phone")
	private String hotelPhone;
	
	@Column(name="hotel_standard")
	private String hotelStandar;

	/**
	 * @return the hotelId
	 */
	public Integer getHotelId() {
		return hotelId;
	}

	/**
	 * @param hotelId the hotelId to set
	 */
	public void setHotelId(Integer hotelId) {
		this.hotelId = hotelId;
	}

	/**
	 * @return the hotelName
	 */
	public String getHotelName() {
		return hotelName;
	}

	/**
	 * @param hotelName the hotelName to set
	 */
	public void setHotelName(String hotelName) {
		this.hotelName = hotelName;
	}

	/**
	 * @return the hotelInfo
	 */
	public String getHotelInfo() {
		return hotelInfo;
	}

	/**
	 * @param hotelInfo the hotelInfo to set
	 */
	public void setHotelInfo(String hotelInfo) {
		this.hotelInfo = hotelInfo;
	}

	/**
	 * @return the hotelPhone
	 */
	public String getHotelPhone() {
		return hotelPhone;
	}

	/**
	 * @param hotelPhone the hotelPhone to set
	 */
	public void setHotelPhone(String hotelPhone) {
		this.hotelPhone = hotelPhone;
	}

	/**
	 * @return the hotelStandar
	 */
	public String getHotelStandar() {
		return hotelStandar;
	}

	/**
	 * @param hotelStandar the hotelStandar to set
	 */
	public void setHotelStandar(String hotelStandar) {
		this.hotelStandar = hotelStandar;
	}

}

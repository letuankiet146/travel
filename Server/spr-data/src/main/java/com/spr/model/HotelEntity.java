package com.spr.model;

import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

import lombok.Data;

/**
 * 
 * @author TuanKiet
 *
 */
@Entity
@Table(name = "hotel")
@Data
public class HotelEntity {
	@Id
	@Column(name = "hotel_id")
	private Integer hotelId;

	@Column(name = "hotel_name")
	private String hotelName;

	@Column(name = "hotel_info")
	private String hotelInfo;

	@Column(name = "hotel_phone")
	private String hotelPhone;

	@Column(name = "hotel_standard")
	private String hotelStandar;

	@Column(name = "hotel_delete_date")
	private Date hotelDeleteDate;
}

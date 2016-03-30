package com.travel.model;

import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;

import lombok.Data;

/**
 * 
 * @author TuanKiet
 *
 */
@Entity
@Table(name="services")
@Data
public class ServicesEntity {
	@Id
	@Column(name="services_id")
	private Integer servicesId;
	
	@Column(name="services_name")
	private String servicesName;
	
	@ManyToOne
	@JoinColumn(name="services_vehicle_id")
	private VehicleEntity servicesVehicleId;
	
	@ManyToOne
	@JoinColumn(name="services_hotel_id")
	private HotelEntity servicesHotelId;
	
	@Column(name="services_delete_date")
	private Date servicesDeleteDate;
}

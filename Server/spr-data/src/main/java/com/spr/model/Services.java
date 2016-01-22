package com.spr.model;

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
@Table(name="services")
public class Services {
	@Id
	@Column(name="services_id")
	private Integer servicesId;
	
	@Column(name="services_name")
	private String servicesName;
	
	@ManyToOne
	@JoinColumn(name="services_vehicle_id")
	private Vehicle servicesVehicleId;
	
	@ManyToOne
	@JoinColumn(name="services_hotel_id")
	private Hotel servicesHotelId;

	/**
	 * @return the servicesId
	 */
	public Integer getServicesId() {
		return servicesId;
	}

	/**
	 * @param servicesId the servicesId to set
	 */
	public void setServicesId(Integer servicesId) {
		this.servicesId = servicesId;
	}

	/**
	 * @return the servicesName
	 */
	public String getServicesName() {
		return servicesName;
	}

	/**
	 * @param servicesName the servicesName to set
	 */
	public void setServicesName(String servicesName) {
		this.servicesName = servicesName;
	}

	/**
	 * @return the servicesVehicleId
	 */
	public Vehicle getServicesVehicleId() {
		return servicesVehicleId;
	}

	/**
	 * @param servicesVehicleId the servicesVehicleId to set
	 */
	public void setServicesVehicleId(Vehicle servicesVehicleId) {
		this.servicesVehicleId = servicesVehicleId;
	}

	/**
	 * @return the servicesHotelId
	 */
	public Hotel getServicesHotelId() {
		return servicesHotelId;
	}

	/**
	 * @param servicesHotelId the servicesHotelId to set
	 */
	public void setServicesHotelId(Hotel servicesHotelId) {
		this.servicesHotelId = servicesHotelId;
	}
}

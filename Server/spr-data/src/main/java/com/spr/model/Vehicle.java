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
@Table(name="vehicle")
public class Vehicle {
	@Id
	@Column(name="vehicle_id")
	private Integer verhicleId;
	
	@Column(name="vehicle_name")
	private String vehicleName;

	/**
	 * @return the verhicleId
	 */
	public Integer getVerhicleId() {
		return verhicleId;
	}

	/**
	 * @param verhicleId the verhicleId to set
	 */
	public void setVerhicleId(Integer verhicleId) {
		this.verhicleId = verhicleId;
	}

	/**
	 * @return the vehicleName
	 */
	public String getVehicleName() {
		return vehicleName;
	}

	/**
	 * @param vehicleName the vehicleName to set
	 */
	public void setVehicleName(String vehicleName) {
		this.vehicleName = vehicleName;
	}
}

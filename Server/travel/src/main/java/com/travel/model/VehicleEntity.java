package com.travel.model;

import java.sql.Date;

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
@Table(name="vehicle")
@Data
public class VehicleEntity {
	@Id
	@Column(name="vehicle_id")
	private Integer verhicleId;
	
	@Column(name="vehicle_name")
	private String vehicleName;
	
	@Column (name="vehicle_delete_date")
	private Date vehicleDeleteDate;

	}

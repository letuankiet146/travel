/**
 * 
 */
package com.travel.model;

import java.util.Date;
import java.util.List;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.persistence.Table;

import lombok.Data;

/**
 * @author TuanKiet
 *
 */
@Entity
@Table(name="area")
@Data
public class AreaEntity {
	@Id
	@Column (name="area_id")
	private Integer areaId;
	
	@Column (name="area_name")
	private String areaName;
	
	@Column(name="area_delete_date")
	private Date areaDeleteDate;
}

/**
 * 
 */
package com.spr.model;

import java.util.List;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.persistence.Table;

/**
 * @author TuanKiet
 *
 */
@Entity
@Table(name="area")
public class Area {
	@Id
	@Column (name="area_id")
	private Integer areaId;
	
	@Column (name="area_name")
	private String areaName;

	public Integer getAreaId() {
		return areaId;
	}

	public void setAreaId(Integer areaId) {
		this.areaId = areaId;
	}

	public String getAreaName() {
		return areaName;
	}

	public void setAreaName(String areaName) {
		this.areaName = areaName;
	}
	
}

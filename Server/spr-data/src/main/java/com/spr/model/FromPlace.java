/**
 * 
 */
package com.spr.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

/**
 * @author TuanKiet
 *
 */
@Entity
@Table(name="from_place")
public class FromPlace {
	@Id
	@Column(name="from_place_id")
	private Integer fromPlaceId;
	
	@Column(name="from_place_name")
	private String fromPlaceName;

	public Integer getFromPlaceId() {
		return fromPlaceId;
	}

	public void setFromPlaceId(Integer fromPlaceId) {
		this.fromPlaceId = fromPlaceId;
	}

	public String getFromPlaceName() {
		return fromPlaceName;
	}

	public void setFromPlaceName(String fromPlaceName) {
		this.fromPlaceName = fromPlaceName;
	}
	
	
}

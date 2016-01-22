/**
 * 
 */
package com.spr.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;

/**
 * @author TuanKiet
 *
 */
@Entity
@Table(name="arrive_place")
public class ArrivePlace {
	@Id
	@Column(name="arrive_place_id")
	private Integer arrivePlaceId;
	
	@Column(name="arrive_place_name")
	private String arrivePlaceName;
	
//	@ManyToOne
//	@JoinColumn(name="IdKhuVuc")
//	private KhuVuc idKhuVuc;
	@Column (name = "arrive_place_area_id")
	private Integer arrivePlaceAreaId;

	public Integer getArrivePlaceId() {
		return arrivePlaceId;
	}

	public void setArrivePlaceId(Integer arrivePlaceId) {
		this.arrivePlaceId = arrivePlaceId;
	}

	public String getArrivePlaceName() {
		return arrivePlaceName;
	}

	public void setArrivePlaceName(String arrivePlaceName) {
		this.arrivePlaceName = arrivePlaceName;
	}

	public Integer getArrivePlaceAreaId() {
		return arrivePlaceAreaId;
	}

	public void setArrivePlaceAreaId(Integer arrivePlaceAreaId) {
		this.arrivePlaceAreaId = arrivePlaceAreaId;
	}
	

}

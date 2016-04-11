/**
 * 
 */
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
 * @author TuanKiet
 *
 */
@Entity
@Table(name="arrive_place")
@Data
public class ArrivePlaceEntity {
	@Id
	@Column(name="arrive_place_id")
	private Integer arrivePlaceId;
	
	@Column(name="arrive_place_name")
	private String arrivePlaceName;
	
	@Column (name = "arrive_place_area_id")
	private Integer arrivePlaceAreaId;
	
	@ManyToOne
	@JoinColumn(name="arrive_place_area_id",updatable=false, insertable=false)
	private AreaEntity areaEntity;

	@Column(name="arrive_place_delete_date")
	private Date arrivePlaceDeleteDate;
	

}

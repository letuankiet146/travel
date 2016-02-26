/**
 * 
 */
package com.spr.model;

import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

import lombok.Data;

/**
 * @author TuanKiet
 *
 */
@Entity
@Table(name="from_place")
@Data
public class FromPlaceEntity {
	@Id
	@Column(name="from_place_id")
	private Integer fromPlaceId;
	
	@Column(name="from_place_name")
	private String fromPlaceName;
	
	@Column (name = "from_place_delete_date")
	private Date fromePlaceDeleteDate;
}

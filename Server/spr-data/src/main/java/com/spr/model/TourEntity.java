/**
 * 
 */
package com.spr.model;


import java.sql.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;

import lombok.Data;
import lombok.Getter;
import lombok.Setter;

/**
 * @author TuanKiet
 *
 */
@Entity
@Table(name="tour")
@Data
public class TourEntity {
	@Id
	@GeneratedValue
	@Column (name = "tour_id")
	private Integer id;
	
	@Column(name = "tour_code")
	private String idTour;
	
	@Column(name = "tour_name")
	private String tenTour;
	
	@Column(name = "tour_description")
	private String moTa;
	
	@Column(name = "tour_infor")
	private String info;
	
	@Column(name = "tour_image")
	private String image;
	
	@Column(name = "tour_seat_number")
	private Integer soCho;
	
	@Column(name = "tour_charge")
	private String giaTour;
	
	@Column(name = "tour_sale_off")
	private Float giaTourKM;
	
	@Column(name = "tour_day_start")
	private Date ngayKH;
	
	@Column(name = "tour_day_end")
	private Date ngayKT;
	
	@Column(name = "tour_service_id")
	private Integer idDichVu;
	
	@Column(name = "tour_view")
	private Integer view;
	
	@Column(name = "tour_active")
	private Integer active;
	
	@Column (name="tour_arrive_place_id")
	private Integer tourArrivePlaceId;
	
	@Column(name="tour_from_place_id")
	private Integer tourFromPlaceId;
	
	@ManyToOne
	@JoinColumn(name="tour_arrive_place_id", updatable=false, insertable = false)
	private ArrivePlaceEntity arrivePlace;
	
	@ManyToOne
	@JoinColumn(name="tour_from_place_id", updatable = false, insertable = false)
	private FromPlaceEntity fromPlace;
	
	@Column (name="tour_delete_date")
	private Date tourDeleteDate;
	
}

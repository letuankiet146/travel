/**
 * 
 */
package com.travel.model;


import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;
import javax.validation.constraints.NotNull;

import lombok.Data;

/**
 * @author TuanKiet
 *
 */
@Entity
@Table(name="tour")
@Data
public class TourEntity {
	@Id
	@GeneratedValue (strategy = GenerationType.IDENTITY)
	@Column (name = "tour_id")
	private Integer id;
	
	@Column(name = "tour_code")
	private String idTour;
	
	@Column(name = "tour_name")
	private String tenTour;
	
	@Column(name = "tour_infor")
	private String info;
	
	@Column(name = "tour_image")
	private String image;
	
	@Column (name="tour_booked")
	private int tourBooked;
	
	@Column(name = "tour_seat_number")
	private Integer soCho;
	
	@Column(name = "tour_charge")
	private Integer giaTour;
	
	@Column(name = "tour_sale_off")
	private Integer giaTourKM;
	
	@Column(name = "tour_day_start")
	private Date ngayKH;
	
	@Column(name = "tour_day_end")
	private Date ngayKT;
	
	@Column(name = "tour_service_id")
	private Integer idDichVu;
	
	@ManyToOne
	@JoinColumn(name="tour_service_id", insertable=false, updatable=false)
	private ServicesEntity servicesEntity;
	
	
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
	
	@Column(name="tour_guider_id")
	private Integer tourGuiderId;
	
	@Column (name="tour_delete_date")
	private Date tourDeleteDate;
	
	@Column (name= "tour_image_data")
	private String tourImageData;
	
	
}

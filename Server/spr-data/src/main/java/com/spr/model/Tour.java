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

/**
 * @author TuanKiet
 *
 */
@Entity
@Table(name="tour")
public class Tour {
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
	private ArrivePlace arrivePlace;
	
	@ManyToOne
	@JoinColumn(name="tour_from_place_id", updatable = false, insertable = false)
	private FromPlace fromPlace;
	

	/**
	 * @return the tourArrivePlaceId
	 */
	public Integer getTourArrivePlaceId() {
		return tourArrivePlaceId;
	}

	/**
	 * @param tourArrivePlaceId the tourArrivePlaceId to set
	 */
	public void setTourArrivePlaceId(Integer tourArrivePlaceId) {
		this.tourArrivePlaceId = tourArrivePlaceId;
	}

	/**
	 * @return the tourFromPlaceId
	 */
	public Integer getTourFromPlaceId() {
		return tourFromPlaceId;
	}

	/**
	 * @param tourFromPlaceId the tourFromPlaceId to set
	 */
	public void setTourFromPlaceId(Integer tourFromPlaceId) {
		this.tourFromPlaceId = tourFromPlaceId;
	}

	public FromPlace getFromPlace() {
		return fromPlace;
	}

	public void setFromPlace(FromPlace fromPlace) {
		this.fromPlace = fromPlace;
	}

	public ArrivePlace getArrivePlace() {
		return arrivePlace;
	}

	public void setArrivePlace(ArrivePlace arrivePlace) {
		this.arrivePlace = arrivePlace;
	}

	/**
	 * @return the id
	 */
	public Integer getId() {
		return id;
	}

	/**
	 * @param id the id to set
	 */
	public void setId(Integer id) {
		this.id = id;
	}

	/**
	 * @return the idTour
	 */
	public String getIdTour() {
		return idTour;
	}

	/**
	 * @param idTour the idTour to set
	 */
	public void setIdTour(String idTour) {
		this.idTour = idTour;
	}

	/**
	 * @return the tenTour
	 */
	public String getTenTour() {
		return tenTour;
	}

	/**
	 * @param tenTour the tenTour to set
	 */
	public void setTenTour(String tenTour) {
		this.tenTour = tenTour;
	}

	/**
	 * @return the moTa
	 */
	public String getMoTa() {
		return moTa;
	}

	/**
	 * @param moTa the moTa to set
	 */
	public void setMoTa(String moTa) {
		this.moTa = moTa;
	}

	/**
	 * @return the info
	 */
	public String getInfo() {
		return info;
	}

	/**
	 * @param info the info to set
	 */
	public void setInfo(String info) {
		this.info = info;
	}

	/**
	 * @return the image
	 */
	public String getImage() {
		return image;
	}

	/**
	 * @param image the image to set
	 */
	public void setImage(String image) {
		this.image = image;
	}

	/**
	 * @return the soCho
	 */
	public Integer getSoCho() {
		return soCho;
	}

	/**
	 * @param soCho the soCho to set
	 */
	public void setSoCho(Integer soCho) {
		this.soCho = soCho;
	}

	/**
	 * @return the giaTour
	 */
	public String getGiaTour() {
		return giaTour;
	}

	/**
	 * @param giaTour the giaTour to set
	 */
	public void setGiaTour(String giaTour) {
		this.giaTour = giaTour;
	}

	/**
	 * @return the giaTourKM
	 */
	public Float getGiaTourKM() {
		return giaTourKM;
	}

	/**
	 * @param giaTourKM the giaTourKM to set
	 */
	public void setGiaTourKM(Float giaTourKM) {
		this.giaTourKM = giaTourKM;
	}

	/**
	 * @return the ngayKM
	 */
	public Date getNgayKH() {
		return ngayKH;
	}

	/**
	 * @param ngayKM the ngayKM to set
	 */
	public void setNgayKH(Date ngayKH) {
		this.ngayKH = ngayKH;
	}

	/**
	 * @return the ngayKT
	 */
	public Date getNgayKT() {
		return ngayKT;
	}

	/**
	 * @param ngayKT the ngayKT to set
	 */
	public void setNgayKT(Date ngayKT) {
		this.ngayKT = ngayKT;
	}

	
	/**
	 * @return the idDichVu
	 */
	public Integer getIdDichVu() {
		return idDichVu;
	}

	/**
	 * @param idDichVu the idDichVu to set
	 */
	public void setIdDichVu(Integer idDichVu) {
		this.idDichVu = idDichVu;
	}

	/**
	 * @return the view
	 */
	public Integer getView() {
		return view;
	}

	/**
	 * @param view the view to set
	 */
	public void setView(Integer view) {
		this.view = view;
	}

	/**
	 * @return the active
	 */
	public Integer getActive() {
		return active;
	}

	/**
	 * @param active the active to set
	 */
	public void setActive(Integer active) {
		this.active = active;
	}
	
}

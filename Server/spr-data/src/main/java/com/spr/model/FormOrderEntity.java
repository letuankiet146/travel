package com.spr.model;

import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;

import com.spr.dto.FormOrderDto;

import lombok.Data;

/**
 * 
 * @author TuanKiet
 *
 */
@Entity
@Table(name = "form_order")
@Data
public class FormOrderEntity {
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "form_order_id")
	private Integer formOrderId;

	@Column(name = "form_order_tour_id")
	private Integer formOrderTourId;

	@ManyToOne
	@JoinColumn(name = "form_order_tour_id", updatable = false, insertable = false)
	private TourEntity formOrderTour;

	@ManyToOne
	@JoinColumn(name = "form_order_customer_id")
	private CustomerEntity formOrderCustomer;

	@Column(name = "form_order_date")
	private Date formOrderDate;
	
	@Column(name = "form_order_delete_date")
	private Date formOrderDeleteDate;
	
	@Column (name="form_order_quantity_adults")
	private Integer formOrderQuantityAdults;
	
	@Column (name="form_order_quantity_juvenile")
	private Integer formOrderQuantityJuvenile;
	
	@Column (name="form_order_quantity_child")
	private Integer formOrderQuantityChild;
	
	@Column (name="form_order_isPay")
	private Boolean formOrderIsPay;
	
	@Column (name="form_order_otherRequire")
	private String formOrderQuantityOtherRequire;
	
	public void setData (FormOrderDto formOrderDto){
		this.formOrderTourId = formOrderDto.getFormOrderTourId();
		this.formOrderTour = formOrderDto.getFormOrderTour();
		this.formOrderQuantityAdults = formOrderDto.getFormOrderQuantityAdults();
		this.formOrderQuantityJuvenile = formOrderDto.getFormOrderQuantityJuvenile();
		this.formOrderQuantityChild = formOrderDto.getFormOrderQuantityChild();
		this.formOrderIsPay = formOrderDto.getFormOrderIsPay();
		this.formOrderQuantityOtherRequire = formOrderDto.getFormOrderQuantityOtherRequire();
	}
}

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

	@Column(name = "form_order_code")
	private String formOrderTourCode;

	@ManyToOne
	@JoinColumn(name = "form_order_tour_id", updatable = false, insertable = false)
	private TourEntity formOrderTour;

	@ManyToOne
	@JoinColumn(name = "form_order_customer_id", updatable= false, insertable = false)
	private CustomerEntity formOrderCustomer;
	
	@Column(name="form_order_tour_id")
	private Integer formOrderTourId;
	
	@Column(name="form_order_customer_id")
	private Integer formOrderCustomerId;

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
	
	@Column (name="form_order_is_pay")
	private Integer formOrderIsPay;
	
	@Column (name="form_order_other_require")
	private String formOrderQuantityOtherRequire;
	
	@Column (name = "form_order_money")
	private Integer formOrderMoney;
	
//	public void setData (FormOrderDto formOrderDto){
//		this.formOrderTourId = formOrderDto.getFormOrderTourIdDto();
//		this.formOrderTour = formOrderDto.getFormOrderTourDto();
//		this.formOrderQuantityAdults = formOrderDto.getFormOrderQuantityAdultsDto();
//		this.formOrderQuantityJuvenile = formOrderDto.getFormOrderQuantityJuvenileDto();
//		this.formOrderQuantityChild = formOrderDto.getFormOrderQuantityChildDto();
//		this.formOrderIsPay = formOrderDto.getFormOrderIsPayDto();
//		this.formOrderQuantityOtherRequire = formOrderDto.getFormOrderQuantityOtherRequireDto();
//	}
}

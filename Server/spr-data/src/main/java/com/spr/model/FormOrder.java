package com.spr.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;

/**
 * 
 * @author TuanKiet
 *
 */
@Entity
@Table(name = "form_order")
public class FormOrder {
	@Id
	@Column(name = "form_order_id")
	private Integer formOrderId;

	@ManyToOne
	@JoinColumn(name = "form_order_tour_id")
	private Tour formOderTourId;
	
	@ManyToOne
	@JoinColumn(name = "form_order_customer_id")
	private Customer formOderCustomerId;

	@Column(name = "form_order_date")
	private Integer formOderDate;

}

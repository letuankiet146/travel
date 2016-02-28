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
	private Integer formOderTourId;

	@ManyToOne
	@JoinColumn(name = "form_order_tour_id", updatable = false, insertable = false)
	private TourEntity formOderTour;

	@ManyToOne
	@JoinColumn(name = "form_order_customer_id")
	private CustomerEntity formOderCustomer;

	@Column(name = "form_order_date")
	private Date formOderDate;
	
	@Column(name = "form_order_delete_date")
	private Date formOrderDeleteDate;
	
	public void setData (FormOrderDto formOrderDto){
		this.formOderTourId = formOrderDto.getFormOderTourId();
		this.formOderTour = formOrderDto.getFormOderTour();
	}
}

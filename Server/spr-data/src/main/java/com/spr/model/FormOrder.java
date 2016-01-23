package com.spr.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
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
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name = "form_order_id")
	private Integer formOrderId;
	
	@Column(name="form_order_tour_id")
	private Integer formOderTourId;

	@ManyToOne
	@JoinColumn(name = "form_order_tour_id", updatable = false, insertable = false)
	private Tour formOderTour;
	
//	@Column(name="form_order_customer_id")
//	private Integer formOderCustomerId;
	
	@ManyToOne
	@JoinColumn(name = "form_order_customer_id")
	private Customer formOderCustomer;

	@Column(name = "form_order_date")
	private Integer formOderDate;

	/**
	 * @return the formOrderId
	 */
	public Integer getFormOrderId() {
		return formOrderId;
	}

	/**
	 * @param formOrderId the formOrderId to set
	 */
	public void setFormOrderId(Integer formOrderId) {
		this.formOrderId = formOrderId;
	}

	/**
	 * @return the formOderTourId
	 */
	public Integer getFormOderTourId() {
		return formOderTourId;
	}

	/**
	 * @param formOderTourId the formOderTourId to set
	 */
	public void setFormOderTourId(Integer formOderTourId) {
		this.formOderTourId = formOderTourId;
	}

	/**
	 * @return the formOderTour
	 */
	public Tour getFormOderTour() {
		return formOderTour;
	}

	/**
	 * @param formOderTour the formOderTour to set
	 */
	public void setFormOderTour(Tour formOderTour) {
		this.formOderTour = formOderTour;
	}



	/**
	 * @return the formOderCustomer
	 */
	public Customer getFormOderCustomer() {
		return formOderCustomer;
	}

	/**
	 * @param formOderCustomer the formOderCustomer to set
	 */
	public void setFormOderCustomer(Customer formOderCustomer) {
		this.formOderCustomer = formOderCustomer;
	}

	/**
	 * @return the formOderDate
	 */
	public Integer getFormOderDate() {
		return formOderDate;
	}

	/**
	 * @param formOderDate the formOderDate to set
	 */
	public void setFormOderDate(Integer formOderDate) {
		this.formOderDate = formOderDate;
	}

}

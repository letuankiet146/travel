/**
 * 
 */
package com.spr.dto;

import java.util.Date;

import javax.persistence.Column;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;

import org.dozer.Mapping;

import com.spr.model.CustomerEntity;
import com.spr.model.TourEntity;

import lombok.Data;

/**
 * @author TuanKiet
 *
 */
@Data
public class FormOrderDto {
	@Mapping("formOrderId")
	private Integer formOrderId;
	
	@Mapping("formOderTourId")
	private Integer formOderTourId;

	@Mapping("formOderTour")
	private TourEntity formOderTour;

	private CustomerDto formOderCustomer;

	private String formOderDate;
	
	private String formOrderDeleteDate;

}

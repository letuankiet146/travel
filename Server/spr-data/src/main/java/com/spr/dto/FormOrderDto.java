/**
 * 
 */
package com.spr.dto;

import lombok.Data;

import org.dozer.Mapping;

import com.spr.model.TourEntity;

/**
 * @author TuanKiet
 *
 */
@Data
public class FormOrderDto {
	@Mapping("formOrderId")
	private Integer formOrderId;
	
	@Mapping("formOrderTourId")
	private Integer formOrderTourId;

	@Mapping("formrOrderTour")
	private TourEntity formOrderTour;

	private CustomerDto formOrderCustomer;

	private String formOrderDate;
	
	private String formOrderDeleteDate;
	
	@Mapping("formOrderQuantityAdults")
	private Integer formOrderQuantityAdults;
	
	@Mapping("formOrderQuantityJuvenile")
	private Integer formOrderQuantityJuvenile;
	
	@Mapping("formOrderQuantityChild")
	private Integer formOrderQuantityChild;
	
	@Mapping("formOrderIsPay")
	private Boolean formOrderIsPay;
	
	@Mapping("formOrderQuantityOtherRequire")
	private String formOrderQuantityOtherRequire;

}

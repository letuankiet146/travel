/**
 * 
 */
package com.spr.dto;

import java.util.Date;

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
	private Integer formOrderIdDto;
	
	@Mapping("formOrderTourId")
	private Integer formOrderTourIdDto;

	private CustomerDto formOrderCustomerDto;

	@Mapping("formOrderDate")
	private Date formOrderDateDto;
	
	@Mapping ("formOrderDeleteDate")
	private Date formOrderDeleteDateDto;
	
	@Mapping("formOrderQuantityAdults")
	private Integer formOrderQuantityAdultsDto;
	
	@Mapping("formOrderQuantityJuvenile")
	private Integer formOrderQuantityJuvenileDto;
	
	@Mapping("formOrderQuantityChild")
	private Integer formOrderQuantityChildDto;
	
	@Mapping("formOrderIsPay")
	private Boolean formOrderIsPayDto;
	
	@Mapping("formOrderQuantityOtherRequire")
	private String formOrderQuantityOtherRequireDto;
	
	@Mapping("formOrderMoney")
	private Integer formOrderMoneyDto;

}

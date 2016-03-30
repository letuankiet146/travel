/**
 * 
 */
package com.travel.dto;

import java.util.Date;

import lombok.Data;

import org.dozer.Mapping;

/**
 * @author TuanKiet
 *
 */
@Data
public class FormOrderDto {
	@Mapping("formOrderId")
	private Integer formOrderIdDto;
	
	@Mapping("formOrderTourCode")
	private String formOrderTourCodeDto;

	@Mapping("formOrderCustomerId")
	private Integer formOrderCustomerIdDto;
	
	@Mapping("formOrderTourId")
	private Integer formOrderTourIdDto;
	
	private CustomerDto formOrderCustomerDto;
	
	private TourDto formOrderTourDto;

	private String formOrderDateDto;
	
	@Mapping ("formOrderDeleteDate")
	private Date formOrderDeleteDateDto;
	
	@Mapping("formOrderQuantityAdults")
	private Integer formOrderQuantityAdultsDto;
	
	@Mapping("formOrderQuantityJuvenile")
	private Integer formOrderQuantityJuvenileDto;
	
	@Mapping("formOrderQuantityChild")
	private Integer formOrderQuantityChildDto;
	
	@Mapping("formOrderIsPay")
	private Integer formOrderIsPayDto;
	
	@Mapping("formOrderQuantityOtherRequire")
	private String formOrderQuantityOtherRequireDto;
	
	@Mapping("formOrderMoney")
	private Integer formOrderMoneyDto;
	
	private Integer idUserAdd;

}

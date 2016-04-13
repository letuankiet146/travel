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
	
	public void setData (FormOrderDto formOrderDto){
		if (formOrderDto.getFormOrderTourCodeDto()!=null){
			this.formOrderTourCodeDto = formOrderDto.getFormOrderTourCodeDto();
		}
		if (formOrderDto.getFormOrderCustomerIdDto()!=null){
			this.formOrderCustomerIdDto = formOrderDto.getFormOrderCustomerIdDto();
		}
		if (formOrderDto.getFormOrderTourIdDto()!=null){
			this.formOrderTourIdDto = formOrderDto.getFormOrderTourIdDto();
		}
		if (formOrderDto.getFormOrderDeleteDateDto()!=null){
			this.formOrderDeleteDateDto = formOrderDto.getFormOrderDeleteDateDto();
		}
		if (formOrderDto.getFormOrderQuantityAdultsDto()!=null){
			this.formOrderQuantityAdultsDto = formOrderDto.getFormOrderQuantityAdultsDto();
		}
		if (formOrderDto.getFormOrderQuantityJuvenileDto()!=null){
			this.formOrderQuantityJuvenileDto = formOrderDto.getFormOrderQuantityJuvenileDto();
		}
		if (formOrderDto.getFormOrderQuantityChildDto()!=null){
			this.formOrderQuantityChildDto = formOrderDto.getFormOrderQuantityChildDto();
		}
		if (formOrderDto.getFormOrderMoneyDto()!=null){
			this.formOrderMoneyDto = formOrderDto.getFormOrderMoneyDto();
		}
		
		if (formOrderDto.getFormOrderIsPayDto()!=null){
			this.formOrderIsPayDto = formOrderDto.getFormOrderIsPayDto();
		}
		if (formOrderDto.getFormOrderQuantityOtherRequireDto()!=null){
			this.formOrderQuantityOtherRequireDto = formOrderDto.getFormOrderQuantityOtherRequireDto();
		}
		if (formOrderDto.getFormOrderDateDto()!=null){
			this.formOrderDateDto = formOrderDto.getFormOrderDateDto();
		}
	}

}

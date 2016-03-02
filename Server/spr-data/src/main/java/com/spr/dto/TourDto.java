/**
 * 
 */
package com.spr.dto;

import java.util.Date;

import javax.persistence.Column;

import lombok.Data;

import org.dozer.Mapping;

import com.spr.model.ArrivePlaceEntity;
import com.spr.model.FromPlaceEntity;

/**
 * @author TuanKiet
 *
 */
@Data
public class TourDto {
	@Mapping("id")
	private Integer idDto;
	
	@Mapping("idTour")
	private String idTourDto;
	
	@Mapping("tenTour")
	private String tenTourDto;
	
	@Mapping("moTa")
	private String moTaDto;
	
	@Mapping("info")
	private String infoDto;
	
	@Mapping("image")
	private String imageDto;
	
	@Mapping("soCho")
	private Integer soChoDto;
	
	@Mapping("giaTour")
	private String giaTourDto;
	
	@Mapping("giaTourKM")
	private Float giaTourKMDto;
	
	@Mapping("ngayKH")
	private Date ngayKHDto;
	
	@Mapping("ngayKT")
	private Date ngayKTDto;
	
	
	@Mapping("idDichVu")
	private Integer idDichVuDto;
	
	@Mapping("view")
	private Integer viewDto;
	
	@Mapping("active")
	private Integer activeDto;
	
	@Mapping("tourArrivePlaceId")
	private Integer tourArrivePlaceIdDto;
	
	@Mapping("tourFromPlaceId")
	private Integer tourFromPlaceIdDto;
	
	@Mapping("arrivePlace")
	private ArrivePlaceEntity arrivePlaceDto;
	
	@Mapping("fromPlace")
	private FromPlaceEntity fromPlaceDto;
	
	@Mapping("tourGuiderId")
	private Integer tourGuiderIdDto;
	
	@Mapping("tourDeleteDate")
	private Date tourDeleteDateDto;
}

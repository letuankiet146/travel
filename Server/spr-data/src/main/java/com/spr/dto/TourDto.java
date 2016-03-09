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
	
	@Mapping("info")
	private String infoDto;
	
	@Mapping("image")
	private String imageDto;
	
	@Mapping("soCho")
	private Integer soChoDto;
	
	@Mapping("giaTour")
	private Integer giaTourDto;
	
	@Mapping("giaTourKM")
	private Integer giaTourKMDto;
	
//	@Mapping("ngayKH")
	private String ngayKHDto;
	
//	@Mapping("ngayKT")
	private String ngayKTDto;
	
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
	
	public void setDataUpdate (TourDto tourDto){
		this.idTourDto = tourDto.getIdTourDto();
		this.tenTourDto = tourDto.getTenTourDto();
		this.infoDto = tourDto.getInfoDto();
		this.imageDto = tourDto.getImageDto();
		this.soChoDto = tourDto.getSoChoDto();
		this.giaTourDto = tourDto.getGiaTourDto();
		this.giaTourKMDto = tourDto.getGiaTourKMDto();
		this.ngayKHDto = tourDto.getNgayKHDto();
		this.ngayKTDto = tourDto.getNgayKTDto();
		this.idDichVuDto = tourDto.getIdDichVuDto();
		this.activeDto = tourDto.getActiveDto();
		this.tourArrivePlaceIdDto = tourDto.getTourArrivePlaceIdDto();
		this.tourFromPlaceIdDto = tourDto.getTourFromPlaceIdDto();
		this.tourGuiderIdDto = tourDto.getTourGuiderIdDto();
	}
}

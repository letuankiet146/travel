/**
 * 
 */
package com.travel.dto;

import java.io.File;
import java.io.FileInputStream;
import java.util.Date;

import lombok.Data;

import org.dozer.Mapping;

import com.travel.model.ArrivePlaceEntity;
import com.travel.model.FromPlaceEntity;
import com.travel.model.ServicesEntity;



/**
 * @author TuanKiet
 *
 */
@Data
public class TourDto {

	@Mapping("id")
	public Integer idDto;

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

	// @Mapping("ngayKH")
	private String ngayKHDto;

	// @Mapping("ngayKT")
	private String ngayKTDto;

	@Mapping("idDichVu")
	private Integer idDichVuDto;
	
	@Mapping("servicesEntity")
	private ServicesEntity servicesDto;

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
	
	@Mapping("tourImageData")
	private String tourImageDataDto;
	
	private Integer idUserAdd;
	

	public void setDataUpdate(TourDto tourDto) {
		if (tourDto.getIdTourDto() != null) {
			this.idTourDto = tourDto.getIdTourDto();
		}
		if (tourDto.getTenTourDto() != null) {
			this.tenTourDto = tourDto.getTenTourDto();
		}
		if (tourDto.getInfoDto() != null) {

			this.infoDto = tourDto.getInfoDto();
		}
		if (tourDto.getSoChoDto() != null) {

			this.soChoDto = tourDto.getSoChoDto();
		}
		if (tourDto.getGiaTourDto() != null) {

			this.giaTourDto = tourDto.getGiaTourDto();
		}
		if (tourDto.getGiaTourKMDto() != null) {

			this.giaTourKMDto = tourDto.getGiaTourKMDto();
		}
		if (tourDto.getNgayKHDto() != null) {

			this.ngayKHDto = tourDto.getNgayKHDto();
		}
		if (tourDto.getNgayKTDto() != null) {

			this.ngayKTDto = tourDto.getNgayKTDto();
		}
		if (tourDto.getIdDichVuDto() != null) {
			this.idDichVuDto = tourDto.getIdDichVuDto();
		}
		if (tourDto.getActiveDto() != null) {
			this.activeDto = tourDto.getActiveDto();
		}
		if (tourDto.getTourArrivePlaceIdDto() != null) {
			this.tourArrivePlaceIdDto = tourDto.getTourArrivePlaceIdDto();
		}
		if (tourDto.getTourFromPlaceIdDto() != null) {
			this.tourFromPlaceIdDto = tourDto.getTourFromPlaceIdDto();
		}
		if (tourDto.getTourGuiderIdDto() != null) {
			this.tourGuiderIdDto = tourDto.getTourGuiderIdDto();
		}
		
		if (tourDto.getIdUserAdd() != null) {
			this.idUserAdd = tourDto.getIdUserAdd();
		}
		if (tourDto.getTourImageDataDto() !=null){
			this.tourImageDataDto = tourDto.getTourImageDataDto();
		}

	}
}

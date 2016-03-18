/**
 * 
 */
package com.spr.dto;

import java.lang.reflect.Field;
import java.lang.reflect.InvocationTargetException;
import java.util.Date;
import java.util.Hashtable;
import java.util.jar.Attributes;

import javax.naming.NamingEnumeration;

import lombok.Data;

import org.apache.commons.beanutils.BeanUtils;
import org.apache.commons.beanutils.BeanUtilsBean;
import org.dozer.DozerBeanMapper;
import org.dozer.Mapping;
import org.springframework.beans.factory.annotation.Autowired;

import com.spr.model.ArrivePlaceEntity;
import com.spr.model.FromPlaceEntity;

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
		if (tourDto.getImageDto() != null) {

			this.imageDto = tourDto.getImageDto();
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

	}
}

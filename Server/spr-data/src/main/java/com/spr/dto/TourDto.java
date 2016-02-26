/**
 * 
 */
package com.spr.dto;

import java.util.Date;

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
	private Integer id;
	
	@Mapping("idTour")
	private String idTour;
	
	@Mapping("tenTour")
	private String tenTour;
	
	@Mapping("moTa")
	private String moTa;
	
	@Mapping("info")
	private String info;
	
	@Mapping("image")
	private String image;
	
	@Mapping("soCho")
	private Integer soCho;
	
	@Mapping("giaTour")
	private String giaTour;
	
	@Mapping("giaTourKM")
	private Float giaTourKM;
	
	private String ngayKH;
	
	private String ngayKT;
	
	
	@Mapping("idDichVu")
	private Integer idDichVu;
	
	@Mapping("view")
	private Integer view;
	
	@Mapping("active")
	private Integer active;
	
	@Mapping("tourArrivePlaceId")
	private Integer tourArrivePlaceId;
	
	@Mapping("tourFromPlaceId")
	private Integer tourFromPlaceId;
	
	@Mapping("arrivePlace")
	private ArrivePlaceEntity arrivePlace;
	
	@Mapping("fromPlace")
	private FromPlaceEntity fromPlace;
	
	@Mapping("tourDeleteDate")
	private Date tourDeleteDate;
}

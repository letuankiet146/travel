package com.spr.model;

import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

import lombok.Data;

/**
 * 
 * @author TuanKiet
 *
 */
@Entity
@Table(name="guider")
@Data
public class GuiderEntity {
	@Id
	@Column(name="guider_id")
	private Integer guiderId;
	
	@Column(name="guider_name")
	private String guiderName;
	
	@Column(name="guider_birth")
	private Date guiderBirth;
	
	@Column(name="guider_sex")
	private Integer guiderSex;
	
	@Column(name="guider_phone")
	private String guiderPhone;
	
	@Column(name="guider_email")
	private String guiderEmail;
	
	@Column(name="guider_address")
	private String guiderAddress;
	
	@Column(name="guider_vietnam_id")
	private String guiderVietNamId;
	
	@Column(name="customer_image")
	private String customerImage;
	
	@Column(name="guider_delete_date")
	private Date guiderDeleteDate;

}

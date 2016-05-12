package com.travel.model;

import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;

import lombok.Data;

/**
 * 
 * @author TuanKiet
 *
 */
@Entity
@Table(name="staff")
@Data
public class StaffEntity {
	@Id
	@GeneratedValue (strategy= GenerationType.IDENTITY)
	@Column(name="staff_id")
	private Integer staffId;
	
	@Column (name="staff_code")
	private String staffCode;
	
	@Column(name="staff_name")
	private String staffName;
	
	
	@Column(name="staff_level")
	private Integer staffLevel;
	
	@ManyToOne
	@JoinColumn(name="staff_level", insertable = false, updatable = false)
	private GroupUserEntity staffGroupUser;
	
	@Column(name = "staff_user")
	private String staffUser;

	@Column(name = "staff_password")
	private String staffPassword;

	@Column(name = "staff_type")
	private Integer staffType;

	@Column(name = "staff_lock")
	private Integer staffLock;
	
	@Column (name="staff_delete_date")
	private Date staffDeleteDate;
	
	@Column (name="staff_email")
	private String staffEmail;
	
	@Column (name="staff_phone")
	private String staffPhone;
	
	@Column (name="staff_date_start")
	private Date staffDateStart;
	
	@Column (name="staff_address")
	private String staffAddress;
	
	@Column (name="staff_note")
	private String staffNote;
	
	@Column (name="staff_birthday")
	private Date staffBirthday;
	
	@Column (name="staff_sex")
	private String staffSex;
	
	@Column (name="staff_vietnam_id")
	private String staffVietNameId;
	
	@Column (name="staff_image")
	private String staffImage;
	
	@Column (name="privileged")
	private String privileged;
}

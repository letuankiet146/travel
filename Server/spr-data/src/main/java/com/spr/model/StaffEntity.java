package com.spr.model;

import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
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
	@Column(name="staff_id")
	private Integer staffId;
	
	@Column(name="staff_name")
	private String staffName;
	
	@Column(name="staff_level")
	private String staffLevel;
	
	@ManyToOne
	@JoinColumn(name="staff_account_id")
	private AccountEntity staffAccountId;
	
	@Column (name="staff_delete_date")
	private Date StaffDeleteDate;
}

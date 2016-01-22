package com.spr.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;

/**
 * 
 * @author TuanKiet
 *
 */
@Entity
@Table(name="staff")
public class Staff {
	@Id
	@Column(name="staff_id")
	private Integer staffId;
	
	@Column(name="staff_name")
	private String staffName;
	
	@Column(name="staff_level")
	private String staffLevel;
	
	@ManyToOne
	@JoinColumn(name="staff_account_id")
	private Account staffAccountId;

	/**
	 * @return the staffId
	 */
	public Integer getStaffId() {
		return staffId;
	}

	/**
	 * @param staffId the staffId to set
	 */
	public void setStaffId(Integer staffId) {
		this.staffId = staffId;
	}

	/**
	 * @return the staffName
	 */
	public String getStaffName() {
		return staffName;
	}

	/**
	 * @param staffName the staffName to set
	 */
	public void setStaffName(String staffName) {
		this.staffName = staffName;
	}

	/**
	 * @return the staffLevel
	 */
	public String getStaffLevel() {
		return staffLevel;
	}

	/**
	 * @param staffLevel the staffLevel to set
	 */
	public void setStaffLevel(String staffLevel) {
		this.staffLevel = staffLevel;
	}

	/**
	 * @return the staffAccountId
	 */
	public Account getStaffAccountId() {
		return staffAccountId;
	}

	/**
	 * @param staffAccountId the staffAccountId to set
	 */
	public void setStaffAccountId(Account staffAccountId) {
		this.staffAccountId = staffAccountId;
	}
}

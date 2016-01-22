package com.spr.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

/**
 * 
 * @author TuanKiet
 *
 */
@Entity
@Table(name="account")
public class Account {
	@Id
	@Column(name="account_id")
	private Integer accountId;
	
	@Column(name="account_user")
	private String accountUser;
	
	@Column(name="account_password")
	private String accountPassword;
	
	@Column(name="account_type")
	private Integer accountType;
	
	@Column(name="account_lock")
	private Integer accountLock;

	/**
	 * @return the accountId
	 */
	public Integer getAccountId() {
		return accountId;
	}

	/**
	 * @param accountId the accountId to set
	 */
	public void setAccountId(Integer accountId) {
		this.accountId = accountId;
	}

	/**
	 * @return the accountUser
	 */
	public String getAccountUser() {
		return accountUser;
	}

	/**
	 * @param accountUser the accountUser to set
	 */
	public void setAccountUser(String accountUser) {
		this.accountUser = accountUser;
	}

	/**
	 * @return the accountPassword
	 */
	public String getAccountPassword() {
		return accountPassword;
	}

	/**
	 * @param accountPassword the accountPassword to set
	 */
	public void setAccountPassword(String accountPassword) {
		this.accountPassword = accountPassword;
	}

	/**
	 * @return the accountType
	 */
	public Integer getAccountType() {
		return accountType;
	}

	/**
	 * @param accountType the accountType to set
	 */
	public void setAccountType(Integer accountType) {
		this.accountType = accountType;
	}

	/**
	 * @return the accountLock
	 */
	public Integer getAccountLock() {
		return accountLock;
	}

	/**
	 * @param accountLock the accountLock to set
	 */
	public void setAccountLock(Integer accountLock) {
		this.accountLock = accountLock;
	}
}

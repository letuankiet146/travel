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
@Table(name = "account")
@Data
public class AccountEntity {
	@Id
	@Column(name = "account_id")
	private Integer accountId;

	@Column(name = "account_user")
	private String accountUser;

	@Column(name = "account_password")
	private String accountPassword;

	@Column(name = "account_type")
	private Integer accountType;

	@Column(name = "account_lock")
	private Integer accountLock;
	
	@Column (name= "account_delete_date")
	private Date accountDeleteDate;
}

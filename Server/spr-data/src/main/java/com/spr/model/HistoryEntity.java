/**
 * 
 */
package com.spr.model;

import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;

import lombok.Data;

/**
 * @author TuanKiet
 *
 */
@Entity
@Table(name="history")
@Data
public class HistoryEntity {
	
	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name="id")
	private Integer id;
	
	@Column(name="user")
	private Integer user;
	
	@Column(name="action")
	private String action;
	
	@Column(name="content")
	private String content;
	
	@Column(name="create_date")
	private Date createDate;
	
	@Column(name="delete_date")
	private Date deleteDate;
}

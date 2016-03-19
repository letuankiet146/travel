package com.spr.model;

import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;

import lombok.Data;

@Entity
@Table(name="notification")
@Data
public class NotificationEntity {
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column (name="id")
	private Integer id;
	
	@Column(name="user")
	private Integer user;
	
	@Column(name="content")
	private String content;
	
	@Column(name="create_date")
	private Date createDate;

}
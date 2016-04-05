package com.travel.model;

import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;

import lombok.Data;

@Entity
@Table(name="hand_book")
@Data
public class HandBookEntity {
	@Id
	@GeneratedValue (strategy=GenerationType.IDENTITY)
	@Column (name="id")
	private Integer id;
	
	@Column (name="code")
	private String code;
	
	@Column (name="name")
	private String name;
	
	@Column (name="date_create")
	private Date dateCreate;
	
	@Column (name="area")
	private int area;
	
	@Column (name="status")
	private int status;
	
	@Column (name="info")
	private String info;
	
	@Column (name="image")
	private String image;
	
	
	

}

package com.travel.model;

import javax.annotation.Generated;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;

import lombok.Data;

@Entity
@Table(name="group_users")
@Data
public class GroupUserEntity {
	
	@Id
	@GeneratedValue (strategy = GenerationType.IDENTITY)
	@Column(name="group_users_id")
	private Integer groupUsersId;
	
	@Column(name="group_users_name")
	private String groupUsersName;

}

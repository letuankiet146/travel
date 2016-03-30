package com.travel.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.travel.model.GuiderEntity;


public interface GuiderRepository extends JpaRepository<GuiderEntity,Integer>{
	@Query("select guiderEntity FROM GuiderEntity guiderEntity "
			+ "WHERE guiderEntity.guiderId =?1 "
			+ "AND guiderEntity.guiderDeleteDate = null")
	public GuiderEntity findOne(Integer arg0);

}

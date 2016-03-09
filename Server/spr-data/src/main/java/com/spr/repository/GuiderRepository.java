package com.spr.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.spr.model.GuiderEntity;

public interface GuiderRepository extends JpaRepository<GuiderEntity,Integer>{
	@Query("select guiderEntity GuiderEntity guiderEntity "
			+ "WHERE guiderEntity.guiderId =?1 "
			+ "AND guiderEntity.guiderDeleteDate = null")
	public GuiderEntity findOne(Integer arg0);

}

package com.spr.repository;


import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.spr.model.ServicesEntity;

public interface ServicesRepository extends JpaRepository<ServicesEntity, Integer > {
	@Query("select servicesEntity ServicesEntity servicesEntity "
			+ "WHERE servicesEntity.servicesId =?1 "
			+ "AND servicesEntity.servicesDeleteDate = null")
	public ServicesEntity findOne(Integer arg0);
}

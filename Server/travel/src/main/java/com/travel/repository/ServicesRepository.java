package com.travel.repository;


import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.travel.model.ServicesEntity;


public interface ServicesRepository extends JpaRepository<ServicesEntity, Integer > {
	@Query("select servicesEntity FROM ServicesEntity servicesEntity "
			+ "WHERE servicesEntity.servicesId =?1 "
			+ "AND servicesEntity.servicesDeleteDate = null")
	public ServicesEntity findOne(Integer arg0);
}

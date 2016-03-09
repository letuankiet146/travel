package com.spr.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.spr.model.ArrivePlaceEntity;

public interface ArrivePlaceRepository extends
		JpaRepository<ArrivePlaceEntity, Integer> {

	@Query("select arrivePlaceEntity ArrivePlaceEntity arrivePlaceEntity "
			+ "WHERE arrivePlaceEntity.arrivePlaceId =?1 "
			+ "AND arrivePlaceEntity.arrivePlaceDeleteDate = null")
	public ArrivePlaceEntity findOne(Integer arg0);

}

package com.travel.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.travel.model.ArrivePlaceEntity;


public interface ArrivePlaceRepository extends
		JpaRepository<ArrivePlaceEntity, Integer> {

	@Query(value="select arrivePlaceEntity FROM ArrivePlaceEntity arrivePlaceEntity "
			+ "WHERE arrivePlaceEntity.arrivePlaceId =?1 "
			+ "AND arrivePlaceEntity.arrivePlaceDeleteDate = null")
	public ArrivePlaceEntity findOne(Integer arg0);

}

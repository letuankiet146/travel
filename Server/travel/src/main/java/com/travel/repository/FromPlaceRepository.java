/**
 * 
 */
package com.travel.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.travel.model.FromPlaceEntity;


/**
 * @author TuanKiet
 *
 */
public interface FromPlaceRepository extends JpaRepository<FromPlaceEntity,Integer> {
	@Query("select fromPlaceEntity FROM FromPlaceEntity fromPlaceEntity "
			+ "WHERE fromPlaceEntity.fromPlaceId =?1 "
			+ "AND fromPlaceEntity.fromePlaceDeleteDate = null")
	public FromPlaceEntity findOne(Integer arg0);

}

/**
 * 
 */
package com.spr.repository;

import java.util.List;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Repository;

import com.spr.model.TourEntity;

/**
 * @author TuanKiet
 *
 */
@Repository
public interface TourRepository extends JpaRepository<TourEntity, Integer> {
	
	 @Query("SELECT t FROM TourEntity t WHERE t.tourDeleteDate = null")
	public List<TourEntity> findAll();
}

/**
 * 
 */
package com.spr.repository;

import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;

import com.spr.model.TourEntity;

/**
 * @author TuanKiet
 *
 */
public interface TourRepository extends JpaRepository<TourEntity, Integer> {
	public Page<TourEntity> findAll(Pageable page);
}

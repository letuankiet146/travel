/**
 * 
 */
package com.spr.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.spr.model.Tour;

/**
 * @author TuanKiet
 *
 */
public interface TourRepository extends JpaRepository<Tour, Integer> {

}

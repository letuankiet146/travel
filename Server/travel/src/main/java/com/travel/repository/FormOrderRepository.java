package com.travel.repository;

import java.util.List;

import org.joda.time.DateTime;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.travel.model.FormOrderEntity;


public interface FormOrderRepository extends JpaRepository<FormOrderEntity,Integer> {
	
	public List<FormOrderEntity> findByFormOrderCustomerId (int id);
	
	@Query(value="Select form from FormOrderEntity form WHERE form.formOrderCustomerId = ?1 "
			+ "AND form.formOrderTourId = ?2")
	public FormOrderEntity findCustomerIdAndTourId (int customerId, int tourId);
}

package com.travel.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.travel.model.CustomerEntity;


public interface CustomerRepository extends JpaRepository<CustomerEntity, Integer> {
	
	@Query(value="Select customer from CustomerEntity customer WHERE customer.customerEmail = ?1")
	public CustomerEntity findByCustomerEmail(String email);
}

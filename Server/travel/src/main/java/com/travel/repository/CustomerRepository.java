package com.travel.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.travel.model.CustomerEntity;


public interface CustomerRepository extends JpaRepository<CustomerEntity, Integer> {
	public CustomerEntity findByCustomerEmail(String email);
}

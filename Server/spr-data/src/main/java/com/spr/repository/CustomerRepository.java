package com.spr.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.spr.model.Customer;

public interface CustomerRepository extends JpaRepository<Customer, Integer> {

}

package com.spr.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.spr.model.CustomerEntity;

public interface CustomerRepository extends JpaRepository<CustomerEntity, Integer> {

}

package com.travel.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.travel.model.FormOrderEntity;


public interface FormOrderRepository extends JpaRepository<FormOrderEntity,Integer> {

}

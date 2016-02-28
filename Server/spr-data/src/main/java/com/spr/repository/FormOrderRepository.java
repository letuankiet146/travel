package com.spr.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.spr.model.FormOrderEntity;

public interface FormOrderRepository extends JpaRepository<FormOrderEntity,Integer> {

}

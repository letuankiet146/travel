package com.travel.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.travel.model.HandBookEntity;

public interface HandBookRepository extends JpaRepository<HandBookEntity,Integer> {

}

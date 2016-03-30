package com.travel.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.travel.model.ImageEntity;

public interface ImageRepository extends JpaRepository<ImageEntity, Integer> {

}

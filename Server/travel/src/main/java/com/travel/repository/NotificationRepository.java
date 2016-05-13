package com.travel.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import com.travel.model.NotificationEntity;


public interface NotificationRepository extends JpaRepository<NotificationEntity,Integer> {
	public List<NotificationEntity> findByUser (int id);

}

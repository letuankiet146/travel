package com.travel.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.travel.model.NotificationEntity;


public interface NotificationRepository extends JpaRepository<NotificationEntity,Integer> {

}

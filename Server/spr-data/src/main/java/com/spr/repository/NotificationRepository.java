package com.spr.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.spr.model.NotificationEntity;

public interface NotificationRepository extends JpaRepository<NotificationEntity,Integer> {

}

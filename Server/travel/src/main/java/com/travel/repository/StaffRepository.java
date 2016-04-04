package com.travel.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.travel.model.StaffEntity;

public interface StaffRepository extends JpaRepository<StaffEntity,Integer> {
	
	@Query ("select s FROM StaffEntity s WHERE s.staffDeleteDate =null ")
	public List<StaffEntity> findAll();
}

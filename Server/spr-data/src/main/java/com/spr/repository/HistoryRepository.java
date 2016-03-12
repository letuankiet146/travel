package com.spr.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.spr.model.HistoryEntity;

public interface HistoryRepository extends JpaRepository<HistoryEntity,Integer> {
	
//	@Query("Select history from HistoryEntity history WHERE history.deleteDate = null")
	List<HistoryEntity> findAll();
	
//	@Query("Select history from HistoryEntity history WHERE history.id=?1 AND history.deleteDate = null")
	HistoryEntity findOne(Integer id);

}

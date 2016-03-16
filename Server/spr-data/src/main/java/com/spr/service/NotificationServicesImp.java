package com.spr.service;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import org.dozer.DozerBeanMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.spr.dto.NotificationDto;
import com.spr.model.NotificationEntity;
import com.spr.repository.NotificationRepository;

@Service
public class NotificationServicesImp implements INotificationServices {
	
	@Autowired
	private NotificationRepository notificationRepository;
	
	@Autowired
	private DozerBeanMapper mapper;

	public String add(NotificationDto notificationDto) {
		if (notificationDto!=null){
			notificationDto.setCreateDate(new Date());
			NotificationEntity notificationEntity = mapper.map(notificationDto, NotificationEntity.class);
			notificationRepository.saveAndFlush(notificationEntity);
			return "Them thanh cong [ ID="+notificationEntity.getId()+" ]";
		}
		return "Them khong thanh cong";
	}

	public String delete(Integer id) {
		if (id!=null){
			if (notificationRepository.exists(id)){
				notificationRepository.delete(id);
				return "Xoa thanh cong";
			}
			return "Xoa khong thanh cong - Khong tim thay ID";
		}
		return "Xoa khong thanh cong - ID null";
	}

	public String update(NotificationDto notificationDto) {
		if (notificationDto !=null){
			notificationDto.setCreateDate(new Date());
			NotificationEntity notificationEntity = notificationRepository.findOne(notificationDto.getId());
			mapper.map(notificationDto, notificationEntity);
			notificationRepository.saveAndFlush(notificationEntity);
			return "Update thanh cong";
		}
		return "Update khong thanh cong";
	}

	public List<NotificationDto> listAll() {
		List<NotificationDto> notificationDtos = new ArrayList<NotificationDto>();
		List<NotificationEntity> notificationEntities = notificationRepository.findAll();
		for (NotificationEntity notificationEntity : notificationEntities){
			notificationDtos.add(mapper.map(notificationEntity, NotificationDto.class));
		}
		return notificationDtos;
	}

}

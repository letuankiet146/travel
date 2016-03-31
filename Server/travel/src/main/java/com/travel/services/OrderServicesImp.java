package com.travel.services;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import org.dozer.DozerBeanMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.travel.dto.CustomerDto;
import com.travel.dto.FormOrderDto;
import com.travel.dto.HistoryDto;
import com.travel.dto.TourDto;
import com.travel.model.CustomerEntity;
import com.travel.model.FormOrderEntity;
import com.travel.model.TourEntity;
import com.travel.repository.CustomerRepository;
import com.travel.repository.FormOrderRepository;
import com.travel.repository.TourRepository;
import com.travel.util.CalcMoney;
import com.travel.util.MyFormatDate;




@Service
public class OrderServicesImp implements IOrderServices {
	@Autowired
	private IHistoryServices historyInterface;
	
	@Autowired
	FormOrderRepository formOrderRepo;

	@Autowired
	CustomerRepository customerRepo;

	@Autowired
	TourRepository tourRepo;

	@Autowired
	private DozerBeanMapper mapper;

	@Transactional
	public String addOrderTour(FormOrderDto formOrderDto) {
		CustomerEntity customerEntity = new CustomerEntity();

		customerEntity = mapper.map(formOrderDto.getFormOrderCustomerDto(),
				CustomerEntity.class);
		customerEntity.setCustomerBirth(MyFormatDate.stringToDate(formOrderDto
				.getFormOrderCustomerDto().getCustomerBirthDto()));

		// First: save into customer then save into formOrder
		customerRepo.saveAndFlush(customerEntity);
		

		FormOrderEntity formOrderEntity = new FormOrderEntity();
		TourEntity tourEntity = tourRepo.findOne(formOrderDto
				.getFormOrderTourIdDto());
		if (tourEntity==null || tourEntity.getTourDeleteDate()!=null){
			return "Khong tim thay tour";
		}
		// tinh tien
		int money = CalcMoney.calculateMoney(
				formOrderDto.getFormOrderQuantityAdultsDto(),
				formOrderDto.getFormOrderQuantityJuvenileDto(),
				formOrderDto.getFormOrderQuantityChildDto(),
				tourEntity.getGiaTour());

		formOrderDto.setFormOrderMoneyDto(money);
		formOrderEntity = mapper.map(formOrderDto, FormOrderEntity.class);
		formOrderEntity.setFormOrderCustomerId(customerEntity.getCustomerId());
		formOrderEntity.setFormOrderDate(new Date());
		FormOrderEntity formformOrderEntityNew = formOrderRepo
				.saveAndFlush(formOrderEntity);
		/*
		 * Save history
		 */
		HistoryDto historyDto = new HistoryDto();
		historyDto.setUser(formOrderDto.getIdUserAdd());
		historyDto.setAction("Create_Order");
		historyDto.setContent("ID="+formOrderDto.getFormOrderIdDto().toString());
		historyInterface.add(historyDto);
		
		return "Dat tour thanh cong: ID="+formformOrderEntityNew.getFormOrderId();
	}

	public List<FormOrderDto> listAllOrderTour() {
		List<FormOrderDto> formOrderDtoList = new ArrayList<FormOrderDto>();
		List<FormOrderEntity> formOrderEntities = formOrderRepo.findAll();
		for (FormOrderEntity formOrderEntity : formOrderEntities) {

			FormOrderDto formOrderDto = new FormOrderDto();
			// map to FormOrderDto
			formOrderDto = mapper.map(formOrderEntity, FormOrderDto.class);

			CustomerDto customerDto = mapper.map(formOrderEntity.getFormOrderCustomer(), CustomerDto.class);
			TourDto tourDto = mapper.map(formOrderEntity.getFormOrderTour(), TourDto.class);
			
			// change date: Date to String
			customerDto.setCustomerBirthDto(MyFormatDate
					.dateToString(formOrderEntity.getFormOrderCustomer()
							.getCustomerBirth()));
			
			tourDto.setNgayKHDto(MyFormatDate.dateToString(formOrderEntity.getFormOrderTour().getNgayKH()));
			tourDto.setNgayKTDto(MyFormatDate.dateToString(formOrderEntity.getFormOrderTour().getNgayKT()));
			
			
			// set Customer and Tour for FormDto
			formOrderDto.setFormOrderCustomerDto(customerDto);
			formOrderDto.setFormOrderTourDto(tourDto);
			formOrderDto.setFormOrderDateDto(MyFormatDate.dateToString(formOrderEntity.getFormOrderDate()));
			
			formOrderDtoList.add(formOrderDto);
		}
		return formOrderDtoList;
	}

	public String deleteMulti(List<Integer> idList, Integer idUser) {
		for (Integer id : idList){
			if (formOrderRepo.exists(id)){
				formOrderRepo.delete(id);
				/*
				 * Save history
				 */
				HistoryDto historyDto = new HistoryDto();
				historyDto.setUser(idUser);
				historyDto.setAction("Delete_Order");
				historyDto.setContent("ID="+id);
				historyInterface.add(historyDto);
			}
			else {
				return "Xoa khong thanh cong";
			}
		}
		
		return "Xoa thanh cong";
	}

	@Override
	public String updateOrderTour(FormOrderDto formOrderDto) {
		if (formOrderDto !=null){
			FormOrderEntity formOrderEntity = formOrderRepo.findOne(formOrderDto.getFormOrderIdDto());
			if (formOrderEntity !=null){
				mapper.map(formOrderDto, formOrderEntity);
				formOrderRepo.saveAndFlush(formOrderEntity);
				/*
				 * Save history
				 */
				HistoryDto historyDto = new HistoryDto();
				historyDto.setUser(formOrderDto.getIdUserAdd());
				historyDto.setAction("Update_Order");
				historyDto.setContent(formOrderDto.getFormOrderIdDto().toString());
				historyInterface.add(historyDto);
				return "Update thanh cong";
			}
			return "Khong tim thay don dat tour";
		}
		return "Gia tri update khong hop le";
	}
}
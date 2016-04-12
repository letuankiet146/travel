package com.travel.services;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import org.dozer.DozerBeanMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.travel.dto.CustomerDto;
import com.travel.dto.HistoryDto;
import com.travel.model.CustomerEntity;
import com.travel.repository.CustomerRepository;
import com.travel.util.MyFormatDate;



@Service
public class CustomerServicesImp implements ICustomerServices {

	@Autowired
	private CustomerRepository customerRepository;
	@Autowired
	private DozerBeanMapper mapper;
	
	@Autowired
	private IHistoryServices historyInterface;
	public String add(CustomerDto customerDto) {
		if (customerDto!=null){
			CustomerEntity customerEntity = mapper.map(customerDto, CustomerEntity.class);
			if (customerDto.getCustomerBirthDto()!=null){
				customerEntity.setCustomerBirth(MyFormatDate.stringToDate(customerDto.getCustomerBirthDto()));
			}
			customerRepository.saveAndFlush(customerEntity);
			
			/*
			 * Save history
			 */
			HistoryDto historyDto = new HistoryDto();
			historyDto.setUser(customerDto.getIdUserAdd());
			historyDto.setAction("Create_Customer");
			historyDto.setContent("ID="+customerDto.getCustomerCode());
			historyInterface.add(historyDto);
			
			return "Them thanh cong";
		}
		return "Them khong thanh cong";
	}

	public String delete(Integer id,Integer userId) {
		if (customerRepository.exists(id)){
			CustomerEntity customerEntity = customerRepository.findOne(id);
			if (customerEntity.getCustomerDeleteDate()==null){
				customerEntity.setCustomerDeleteDate(new Date());
				customerRepository.saveAndFlush(customerEntity);
				/*
				 * Save history
				 */
				HistoryDto historyDto = new HistoryDto();
				historyDto.setUser(userId);
				historyDto.setAction("Delete_Customer");
				historyDto.setContent("Xoa khach hang co id ="+customerEntity.getCustomerId());
				historyInterface.add(historyDto);
				return "Xoa thanh cong";
			}
			return "Khong tim thay khach hang can xoa";
		}
		return "Khong tim thay khach hang can xoa";
	}

	public String deleteMul(List<Integer> listId, Integer userId) {
		for (Integer id : listId){
			if (customerRepository.exists(id)){
				CustomerEntity customerEntity = customerRepository.findOne(id);
				if (customerEntity.getCustomerDeleteDate()==null){
					customerEntity.setCustomerDeleteDate(new Date());
					customerRepository.saveAndFlush(customerEntity);
				}
				/*
				 * Save history
				 */
				HistoryDto historyDto = new HistoryDto();
				historyDto.setUser(userId);
				historyDto.setAction("Delete_Customer");
				historyDto.setContent("Xoa tour co id ="+customerEntity.getCustomerId());
				historyInterface.add(historyDto);
			}
		}
		return "Xoa thanh cong";
	}

	public String update(CustomerDto customerDto) {
		if (customerDto !=null){
			CustomerEntity customerEntity = customerRepository.findOne(customerDto.getCustomerIdDto());
			if (customerEntity!=null){
				CustomerDto customerDto2 = mapper.map(customerEntity, CustomerDto.class);
				customerDto2.setUpdateData(customerDto);
				customerEntity = mapper.map(customerDto2, CustomerEntity.class);
				customerRepository.saveAndFlush(customerEntity);
				/*
				 * Save history
				 */
				HistoryDto historyDto = new HistoryDto();
				historyDto.setUser(customerDto.getIdUserAdd());
				historyDto.setAction("Update_Customer");
				historyDto.setContent("Update khach hang: "+customerDto.getCustomerCode());
				historyInterface.add(historyDto);
				return "Update thanh cong";
			}
		}
		return "Update khong thanh cong";
	}

	public List<CustomerDto> listAll() {
		List<CustomerDto> listCustomerDto = new ArrayList<CustomerDto>();
		List<CustomerEntity> listCustomerEntity = customerRepository.findAll();
		for (CustomerEntity customerEntity: listCustomerEntity){
			if (customerEntity !=null && customerEntity.getCustomerDeleteDate()==null){
				CustomerDto customerDto = mapper.map(customerEntity, CustomerDto.class);
				customerDto.setCustomerBirthDto(MyFormatDate.dateToString(customerEntity.getCustomerBirth()));
				listCustomerDto.add(customerDto);
			}
		}
		return listCustomerDto;
	}

}

package com.spr.service;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import org.dozer.DozerBeanMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.spr.dto.CustomerDto;
import com.spr.model.CustomerEntity;
import com.spr.repository.CustomerRepository;
import com.spr.util.MyFormatDate;

@Service
public class CustomerServicesImp implements ICustomerServices {

	@Autowired
	private CustomerRepository customerRepository;
	@Autowired
	private DozerBeanMapper mapper;
	public String add(CustomerDto customerDto) {
		if (customerDto!=null){
			CustomerEntity customerEntity = mapper.map(customerDto, CustomerEntity.class);
			customerEntity.setCustomerBirth(MyFormatDate.stringToDate(customerDto.getCustomerBirthDto()));
			customerRepository.saveAndFlush(customerEntity);
			return "Them thanh cong";
		}
		return "Them khong thanh cong";
	}

	public String delete(Integer id) {
		if (customerRepository.exists(id)){
			CustomerEntity customerEntity = customerRepository.findOne(id);
			if (customerEntity.getCustomerDeleteDate()==null){
				customerEntity.setCustomerDeleteDate(new Date());
				customerRepository.saveAndFlush(customerEntity);
				return "Xoa thanh cong";
			}
			return "Khong tim thay khach hang can xoa";
		}
		return "Khong tim thay khach hang can xoa";
	}

	public String deleteMul(List<Integer> listId) {
		for (Integer id : listId){
			if (customerRepository.exists(id)){
				CustomerEntity customerEntity = customerRepository.findOne(id);
				if (customerEntity.getCustomerDeleteDate()==null){
					customerEntity.setCustomerDeleteDate(new Date());
					customerRepository.saveAndFlush(customerEntity);
				}
			}
		}
		return "Xoa thanh cong";
	}

	public String update(CustomerDto customerDto) {
		if (customerDto !=null){
			CustomerEntity customerEntity = customerRepository.findOne(customerDto.getCustomerIdDto());
			if (customerEntity!=null){
				String codeCustomer = customerEntity.getCustomerCode();
				customerEntity = mapper.map(customerDto, CustomerEntity.class);
				customerEntity.setCustomerBirth(MyFormatDate.stringToDate(customerDto.getCustomerBirthDto()));
				customerEntity.setCustomerCode(codeCustomer);
				customerRepository.saveAndFlush(customerEntity);
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

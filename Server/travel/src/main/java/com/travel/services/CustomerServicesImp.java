package com.travel.services;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import org.dozer.DozerBeanMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.travel.dto.ContentEmail;
import com.travel.dto.CustomerDto;
import com.travel.dto.HistoryDto;
import com.travel.dto.PasswordDto;
import com.travel.model.CustomerEntity;
import com.travel.repository.CustomerRepository;
import com.travel.util.IUtilMethod;
import com.travel.util.MyFormatDate;



@Service
public class CustomerServicesImp implements ICustomerServices {

	@Autowired
	private CustomerRepository customerRepository;
	@Autowired
	private DozerBeanMapper mapper;
	
	@Autowired
	private IHistoryServices historyInterface;
	
	@Autowired
	private IUtilMethod utilMethod;
	
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
				if (customerEntity.getCustomerBirth()!=null){
					customerDto2.setCustomerBirthDto(MyFormatDate.dateToString(customerEntity.getCustomerBirth()));
				}
				customerDto2.setUpdateData(customerDto);
				customerEntity = mapper.map(customerDto2, CustomerEntity.class);
				if (customerDto2.getCustomerBirthDto()!=null){
					customerEntity.setCustomerBirth(MyFormatDate.stringToDate(customerDto2.getCustomerBirthDto()));
				}
				customerRepository.saveAndFlush(customerEntity);
				/*
				 * Save history
				 */
				if (customerDto.getIdUserAdd()!=null){
					HistoryDto historyDto = new HistoryDto();
					historyDto.setUser(customerDto.getIdUserAdd());
					historyDto.setAction("Update_Customer");
					historyDto.setContent("Update khach hang: "+customerDto.getCustomerCode());
					historyInterface.add(historyDto);
				}
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

	@Override
	public int sendVerifyCode(PasswordDto passwordDto) {
		CustomerEntity customerEntity = customerRepository.findOne(passwordDto.getCustomerId());
		String oldPassword = customerEntity.getCustomerPassword();
		String oldPassword2 = utilMethod.encodePassword(passwordDto.getOldPassword());
		String newPassword = utilMethod.encodePassword(passwordDto.getNewPassword());
		if (oldPassword.equals(oldPassword2)){
			//change password in here
			CustomerEntity customerEntity2 = new CustomerEntity();
			String verifyCode = utilMethod.createPassword();
			String toEmail = customerEntity.getCustomerEmail();
			String subject = "[iuh-travle.tk] Change password";
			StringBuilder contentEmail = new StringBuilder();
			contentEmail.append("Bạn đang thay đổi mật khẩu \n\n");
			contentEmail.append("MÃ XÁC THỰC: ");
			contentEmail.append(verifyCode);
			contentEmail.append("\nMã xác thực sẽ mất hiệu lực sau 10 phút");
			ContentEmail content = new ContentEmail(null, toEmail, subject, contentEmail);
			CustomerDto customerDto = new CustomerDto();
			customerDto.setCustomerVerifyCodeDto(verifyCode);
			customerDto.setCustomerNewPasswordDto(newPassword);
			customerDto.setCustomerIdDto(passwordDto.getCustomerId());
			utilMethod.sendEmail(content);
			update(customerDto);
			return 1;
		}
		return -1;
	}

	@Override
	public int confirmVerifyCode(PasswordDto passwordDto) {
		CustomerEntity customerEntity = customerRepository.findOne(passwordDto.getCustomerId());
		String verify = passwordDto.getVerifyCode();
		String oldVerify = customerEntity.getCustomerVerifyCode();
		if (verify.equals(oldVerify)){
			
			CustomerDto customerDto = new CustomerDto();
			customerDto.setCustomerIdDto(passwordDto.getCustomerId());
			customerDto.setCustomerPasswordDto(customerEntity.getCustomerNewPassword());
			update(customerDto);
			return 1;
		}
		return -1;
	}

	@Override
	public int deleteVerifyCode(int idCustomer ) {
		CustomerEntity customerEntity = customerRepository.findOne(idCustomer);
		if (customerEntity!=null){
			CustomerDto customerDto = new CustomerDto();
			customerDto.setCustomerIdDto(idCustomer);
			customerDto.setCustomerVerifyCodeDto("");
			customerDto.setCustomerNewPasswordDto("");
			update(customerDto);
			return 1;
		}
		return -1;
	}


}

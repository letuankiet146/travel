package com.travel.config;

import org.dozer.DozerBeanMapper;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;

@Configuration
public class ConfigBean {
	@Bean
	public DozerBeanMapper dozerBeanMapper (){
		return new DozerBeanMapper();
	}
}

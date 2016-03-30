package com.travel.config;

import org.dozer.DozerBeanMapper;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.web.servlet.config.annotation.CorsRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurerAdapter;

@Configuration
public class ConfigBean {
	@Bean
	public DozerBeanMapper dozerBeanMapper (){
		return new DozerBeanMapper();
	}
	
	@Bean
	public WebMvcConfigurer corsConfigurer(){
		return new WebMvcConfigurerAdapter() {
			@Override
			public void addCorsMappings(CorsRegistry registry) {
				super.addCorsMappings(registry);
				/*
				 * Customer
				 */
				registry.addMapping("/customer/delete/{userId}").allowedOrigins("*");
				registry.addMapping("/customer/delete/{id}/{userId}").allowedOrigins("*");
				registry.addMapping("/customer/add").allowedOrigins("*");
				registry.addMapping("/customer/list").allowedOrigins("*");
				registry.addMapping("/customer/update/").allowedOrigins("*");
				registry.addMapping("/customer/delete/{id}/{userId}").allowedOrigins("*");
				
				/*
				 * History
				 */
				registry.addMapping("/history/delete/{id}").allowedOrigins("*");
				registry.addMapping("/history/add").allowedOrigins("*");
				registry.addMapping("/history/list").allowedOrigins("*");
				registry.addMapping("/history/update/").allowedOrigins("*");
				
				/*
				 * Notification
				 */
				registry.addMapping("/notification/delete/{id}").allowedOrigins("*");
				registry.addMapping("/notification/add").allowedOrigins("*");
				registry.addMapping("/notification/update").allowedOrigins("*");
				registry.addMapping("/notification/list").allowedOrigins("*");
				
				/*
				 * Oder Tour
				 */
				
				registry.addMapping("/orderTour").allowedOrigins("*");
				registry.addMapping("/listOrderTourId").allowedOrigins("*");
				registry.addMapping("/deleteOrderTour").allowedOrigins("*");
				
				/*
				 * Tour
				 */
				registry.addMapping("/tour/listTour").allowedOrigins("*");
				registry.addMapping("/tour/updateTour").allowedOrigins("*");
				registry.addMapping("/tour/addTour").allowedOrigins("*");
				registry.addMapping("/tour/deleteTour/{id}/{idUser}").allowedOrigins("*");
				registry.addMapping("/tour/deleteTour/{idUser}").allowedOrigins("*");
				registry.addMapping("/tour/listOrderTourId").allowedOrigins("*");
				registry.addMapping("/tour/orderTour").allowedOrigins("*");
				
			}
		};
	}
}

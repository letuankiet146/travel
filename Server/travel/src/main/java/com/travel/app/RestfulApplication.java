package com.travel.app;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.EnableAutoConfiguration;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.orm.jpa.EntityScan;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.data.jpa.repository.config.EnableJpaRepositories;
import org.springframework.web.servlet.config.annotation.EnableWebMvc;

@SpringBootApplication
@EnableWebMvc
@EnableAutoConfiguration
@ComponentScan(basePackages ={"com.travel"})
@EntityScan(basePackages={"com.travel.model"})
@EnableJpaRepositories(basePackages={"com.travel.repository"})
public class RestfulApplication {
	

	public static void main(String[] args) {
		SpringApplication.run(RestfulApplication.class, args);
	}
}

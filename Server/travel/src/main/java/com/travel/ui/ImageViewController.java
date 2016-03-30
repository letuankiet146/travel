package com.travel.ui;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

@Controller
@RequestMapping("/view")
public class ImageViewController {
	
	@RequestMapping(value="/", method=RequestMethod.GET)
	public String home(){
		return "index";
	}

}

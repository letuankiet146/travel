/**
 * 
 */
package com.travel.util;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;

/**
 * @author TuanKiet
 *
 */
public class MyFormatDate {
	
	public static String dateToString(Date date){
		SimpleDateFormat spdf = new SimpleDateFormat("dd/MM/yyyy");
		String dateStr = spdf.format(date);
		return dateStr;
		
	}
	/*
	 * Date String "dd/MM/yyyy"
	 */
	public static Date stringToDate(String myDateStr){
		SimpleDateFormat spdf = new SimpleDateFormat("dd/MM/yyyy");
		Date myDate =null;
		try {
			myDate = spdf.parse(myDateStr);
		} catch (ParseException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return myDate;
	}

}

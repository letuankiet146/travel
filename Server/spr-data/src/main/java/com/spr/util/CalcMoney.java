/**
 * 
 */
package com.spr.util;

/**
 * @author TuanKiet
 *
 */
public class CalcMoney {

	public static Integer calculateMoney (Integer adult, Integer juvenile, Integer child, Integer money){
		int moneyTotal = (int) (money *adult + money*child*0.25 + money*juvenile*0.5);
		return moneyTotal;
	}
}

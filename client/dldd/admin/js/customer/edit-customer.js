//======================================
//==========kiểm tra form===============
//======================================
function click_edit(){

	var customerPhoneDto=document.getElementById("customerPhoneDto");
	var phone = document.getElementById("customerPhoneDto").value;
	var phoneCompany = document.getElementById("customerPhoneCompanyDto").value;
	var customerBirthDto =$("#customerBirthDto").val();
	var today =$("#today").val();
	var ngaysinh = $.datepicker.parseDate('dd/mm/yy', customerBirthDto);
	var ngayht = $.datepicker.parseDate('dd/mm/yy', today);
	var date = /^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((1[6-9]|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((1[6-9]|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((1[6-9]|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/;
	var number=/^[0-9.]+$/;
	var customerEmailDto =$("#customerEmailDto").val();
	var mail = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;
	var count = phone.length;

	var fields = $(".row").closest(".info-l").find( ":input" );
	jQuery.each( fields, function( i, field ) {
	 	var b = "#" + field.name;
	 	if(field.value == "" || field.value <= 0){
	 		if((b != "#customerBirthDto") && (b != "#customerSexDto")){
			 	$(b).closest(".row").find(".error").empty();
		      	$(b).closest(".row").find(".error").append("Thông tin bắt buộc");
		      	field.value.focus();
		      	return false;
		    }
	    }
	    else{
	    	$(b).closest(".row").find(".error").empty();	
	    }
    });

	if(this.customerBirthDto.value == "") {
		$("#customerBirthDto").closest(".row_left").find(".error").empty();
	  	$("#customerBirthDto").closest(".row_left").find(".error").append("Thông tin bắt buộc");
		this.customerBirthDto.focus();
		return false;
	}
	else if(this.customerSexDto.value == "") {
		$("#customerSexDto").closest(".row_right").find(".error").empty();
	  	$("#customerSexDto").closest(".row_right").find(".error").append("Thông tin bắt buộc");
		this.customerSexDto.focus();
		return false;
	}
	else if(!mail.test(customerEmailDto)){
		$("#customerEmailDto").closest(".row").find(".error").empty();
	  	$("#customerEmailDto").closest(".row").find(".error").append("Chưa đúng format");
		this.customerEmailDto.focus();
		return false;
	}
	else if(!number.test(customerPhoneDto.value)){
		$("#customerPhoneDto").closest(".row").find(".error").empty();
	  	$("#customerPhoneDto").closest(".row").find(".error").append("Giá trị phải là số");
		this.customerPhoneDto.focus();
		return false;
	}
	else if(count > 11 || count <10){
		$("#customerPhoneDto").closest(".row").find(".error").empty();
	  	$("#customerPhoneDto").closest(".row").find(".error").append("SDT không đúng");
		this.customerPhoneDto.focus();
		return false;
	}
    else if (ngaysinh > ngayht) {
	  	alert("Ngày sinh phải nhỏ hơn ngày hiện tại");
      	this.customerBirthDto.focus();
      	return false;
	}
	else if(!(date.test(customerBirthDto))){
	  alert("Chưa đúng format");
      this.customerBirthDto.focus();
      return false;
    }
    else if(this.customerPhoneCompanyDto.value != ""){
    	if(!number.test(customerPhoneCompanyDto.value)){
    		$("#customerPhoneCompanyDto").closest(".row").find(".error").empty();
		  	$("#customerPhoneCompanyDto").closest(".row").find(".error").append("Giá trị phải là số");
			this.customerPhoneCompanyDto.focus();
			return false;
    	}
	    else if(phoneCompany.length > 11 || phoneCompany.length < 10){
			$("#customerPhoneCompanyDto").closest(".row").find(".error").empty();
		  	$("#customerPhoneCompanyDto").closest(".row").find(".error").append("SDT không đúng");
			this.customerPhoneCompanyDto.focus();
			return false;
		}
		else{
			edit_customer();
		}
	}
    else{
		edit_customer();
	}	
}

//======================================
//===========tạo tour===================
//======================================
function edit_customer(){
	var customerCode =$("#customerCode").val();
    var customerNameDto =$("#customerNameDto").val();
    var customerPhoneDto =$("#customerPhoneDto").val();
    var customerEmailDto =$("#customerEmailDto").val();
    var customerAddressDto =$("#customerAddressDto").val();
    var customerCompanyNameDto =$("#customerCompanyNameDto").val();
    var customerAddressCompanyDto =$("#customerAddressCompanyDto").val();
    var customerPhoneCompanyDto =$("#customerPhoneCompanyDto").val();
    var customerPasswordDto =$("#customerPasswordDto").val();
    var customerBirthDto =$("#customerBirthDto").val();
    var customerSexDto =$("#customerSexDto").val();
    var customerUserDto =$("#customerUserDto").val();
    var customerCityDto =$("#customerCityDto").val();
    var customerCountryDto =$("#customerCountryDto").val();
    var customerNoteDto =$("#customerNoteDto").val();
    var idUserAdd =$("#idUserAdd").val();
    var customerGroupDto =$("#customerGroupDto").val();
    var customerIdDto =$("#customerIdDto").val();
    
	var mydata = {
		"customerIdDto": customerIdDto,
	    "customerCode": customerCode,
	    "customerNameDto": customerNameDto,
	    "customerBirthDto": customerBirthDto,
	    "customerSexDto": customerSexDto,
	    "customerPhoneDto": customerPhoneDto,
	    "customerEmailDto": customerEmailDto,
	    "customerAddressDto": customerAddressDto,
	    "customerVietNamIdDto": null,
	    "customerCompanyNameDto": customerCompanyNameDto,
	    "customerAddressCompanyDto": customerAddressCompanyDto,
	    "customerPhoneCompanyDto": customerPhoneCompanyDto,
	    "customerImageDto": null,
	    "customerUserDto": null,
	    "customerPasswordDto": customerPasswordDto,
	    "customerTypeDto": null,
	    "customerLockDto": null,
	    "customerDeleteDateDto": null,
	    "customerGroupDto": customerGroupDto,
    	"customerCityDto": customerCityDto,
    	"customerCountryDto": customerCountryDto,
    	"customerNoteDto": customerNoteDto,
	    "idUserAdd": idUserAdd
	};
	console.log(mydata);
	$.ajax({
		url : "http://103.47.194.91:8080/spr-data/customer/update/",
		type: "POST",
		dataType: "json",
		contentType: "application/json", 
		data :JSON.stringify(mydata),
		beforeSend: function () {
            $('.add-edit').append('<div class="gif"><img src="images/preloader.GIF" /></div><div class="f_overlay"></div>');
        },
		success: function(data){ 

		},
		statusCode: {
			404:function(){
				alert("khong tim thay trang.");
			},
			200:function(){
				alert("Cập nhật khách hàng thành công");
				location.reload();
			}
		}
	});
}
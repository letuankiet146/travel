//======================================
//==========kiểm tra form===============
//======================================
function click_edit(){

	// var giaTourKMDto=document.getElementById("giaTourKMDto");
	// var soChoDto=document.getElementById("soChoDto");
	// var giaTourDto=document.getElementById("giaTourDto");
	// var ngayKHDto =$("#ngayKHDto").val();
	// var ngayKTDto =$("#ngayKTDto").val();
	// var today =$("#today").val();
	// var ngaykh = $.datepicker.parseDate('dd/mm/yy', ngayKHDto);
	// var ngaykt = $.datepicker.parseDate('dd/mm/yy', ngayKTDto);
	// var ngayht = $.datepicker.parseDate('dd/mm/yy', today);
	// var date = /^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((1[6-9]|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((1[6-9]|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((1[6-9]|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/;
	// var number=/^[0-9.]+$/;
	
	// if(this.areaIdDto.value < 1) {
 //      alert("Chọn loại tour");
 //      this.areaIdDto.focus();
 //      return false;
 //    }
 //    else if(this.tenTourDto.value == "") {
 //      alert("Yêu cầu nhập tên tour");
 //      this.tenTourDto.focus();
 //      return false;
 //    }
 //    else if(this.tourFromPlaceIdDto.value < 1) {
 //      alert("Chọn nơi khỏi hành");
 //      this.tourFromPlaceIdDto.focus();
 //      return false;
 //    }
 //    else if(this.tourArrivePlaceIdDto.value < 1) {
 //      alert("Chọn địa điểm đến");
 //      this.tourArrivePlaceIdDto.focus();
 //      return false;
 //    }
 //    else if(this.tourGuiderIdDto.value < 1) {
 //      alert("Chọn hướng dẫn viên");
 //      this.tourGuiderIdDto.focus();
 //      return false;
 //    }
 //    else if(this.soChoDto.value == "") {
 //      alert("Yêu cầu nhập số lượng");
 //      this.soChoDto.focus();
 //      return false;
 //    }
 //    else if(!number.test(soChoDto.value)){
	// 	alert("Số lượng phải là số");
	// 	soChoDto.focus();
	// 	return(false);
	// }
	// else if(this.ngayKHDto.value == "") {
 //      alert("Yêu cầu nhập ngày khởi hành");
 //      this.ngayKHDto.focus();
 //      return false;
 //    }
	// else if(!(date.test(ngayKHDto))){
 //      alert("Chưa đúng format");
 //      this.ngayKHDto.focus();
 //      return false;
 //    }
 //    else if (ngaykh <= ngayht) {
 //      	alert("Ngay KH phải lớn ngày hiện tại");
 //      	this.ngayKHDto.focus();
 //      	return false;
	// }
 //    else if(this.ngayKTDto.value == "") {
 //      alert("Yêu cầu nhập ngày kết thúc");
 //      this.ngayKTDto.focus();
 //      return false;
 //    }
	// else if(!(date.test(ngayKTDto))){
 //      alert("Chưa đúng format");
 //      this.ngayKTDto.focus();
 //      return false;
 //    }
	// else if (ngaykt <= ngaykh) {
 //      	alert("Ngay Kt phải lớn ngày kh");
 //      	this.ngayKTDto.focus();
 //      	return false;
	// }
 //    else if(this.idDichVuDto.value < 1) {
 //      alert("Chọn loại dịch vụ");
 //      this.idDichVuDto.focus();
 //      return false;
 //    }
 //    else if(this.giaTourKMDto.value == "") {
 //      alert("Yêu cầu nhập giá tour KM");
 //      this.giaTourKMDto.focus();
 //      return false;
 //    }
 //    else if(!number.test(giaTourKMDto.value)){
	// 	alert("Giá tour KM phải là số");
	// 	giaTourKMDto.focus();
	// 	return(false);
	// }
 //    else if(!number.test(giaTourDto.value)){
	// 	alert("Giá tour phải là số");
	// 	giaTourDto.focus();
	// 	return(false);
	// }
	// else if(this.imageDto.value == "") {
	// 	alert("Yêu cầu chọn ảnh đại diện");
	// 	this.imageDto.focus();
	// 	return false;
	// }
 //    else{
		edit_customer();
	// }	
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
	// $.ajax({
	// 	url : "http://localhost:8080/spr-data/customer/add/",
	// 	type: "POST",
	// 	dataType: "json",
	// 	contentType: "application/json", 
	// 	data :JSON.stringify(mydata),
	// 	beforeSend: function () {
 //            $('.add-edit').append('<div class="gif"><img src="images/preloader.GIF" /></div><div class="f_overlay"></div>');
 //        },
	// })
	// .done(function() {
	// 	console.log("success");
	// })
	// .fail(function(error) {
	// 	console.log(error);
	// })
	// .always(function() {
	// 	console.log("complete");
	// });
	
	$.ajax({
		url : "http://localhost:8080/spr-data/customer/update/",
		type: "POST",
		dataType: "json",
		contentType: "application/json", 
		data :JSON.stringify(mydata),
		beforeSend: function () {
            $('.add-edit').append('<div class="gif"><img src="images/preloader.GIF" /></div><div class="f_overlay"></div>');
        },
		success: function(data){ 
			//location.reload();
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
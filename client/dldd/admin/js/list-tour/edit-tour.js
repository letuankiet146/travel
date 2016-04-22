//======================================
//==========kiểm tra form===============
//======================================
$(document).ready(function () {
    $("#formAddEdit").validate({
        rules: {
            tenTourDto: {required: true},
            tourFromPlaceIdDto: {required: true},
            tourArrivePlaceIdDto: {required: true},
            tourGuiderIdDto: {required: true},
            soChoDto: {required: true, number: true, min: 15, max:50},
            ngayKHDto: {required: true, dateISO:true},
            ngayKTDto: {required: true, dateISO:true},
            idDichVuDto: {required: true},
            giaTourDto: {required: true, number: true, minlength:7 , maxlength:10},
            giaTourKMDto: {number: true, minlength: 7, maxlength:10}
        },
        messages: {
            tenTourDto: {required: "Thông tin bắt buộc"},
            tourFromPlaceIdDto: {required: "Thông tin bắt buộc"},
            tourArrivePlaceIdDto: {required: "Thông tin bắt buộc"},
            tourGuiderIdDto: {required: "Thông tin bắt buộc"},
            soChoDto: {required: "Thông tin bắt buộc",number: "Giá trị phải là số",
        				min: "Giá trị >= 15",max: "Giá trị <= 50" },
            ngayKHDto: {required: "Thông tin bắt buộc",dateISO: "Định dạng ngày không hợp lệ"},
            ngayKTDto: {required: "Thông tin bắt buộc",dateISO: "Định dạng ngày không hợp lệ"},
            idDichVuDto: {required: "Thông tin bắt buộc"},
            giaTourDto: {required: "Thông tin bắt buộc", number: "Giá trị phải là số",
        				minlength: "Giá trị > 100,000vnđ",maxlength: "Giá trị < 100,000,000vnđ"},
            giaTourKMDto: {number: "Giá trị phải là số", minlength: "Giá trị > 100,000vnđ",
            			maxlength: "Giá trị < 100,000,000vnđ"}
        },
        // thực hiện sau khi kiểm tra đúng
        submitHandler: function() {
        	var infoDto =CKEDITOR.instances['infoDto'].getData();
			var ngayKHDto =$("#ngayKHDto").val();
			var ngayKTDto =$("#ngayKTDto").val();
			var ngaykh = $.datepicker.parseDate('dd/mm/yy', ngayKHDto);
			var ngaykt = $.datepicker.parseDate('dd/mm/yy', ngayKTDto);
        	
			if (ngaykt <= ngaykh) {
		      	$("#ngayKTDto").closest(".row").find(".error-r").empty();
			  	$("#ngayKTDto").closest(".row").find(".error-r").append("Ngay Kt phải lớn ngày kh");
			}
			else if(infoDto == "") {
				$("#infoDto").closest(".details").find(".error-r").empty();
			  	$("#infoDto").closest(".details").find(".error-r").append("Thông tin bắt buộc");
			}
			else{
 	       		Update_Tour();
 	       	}
        }
    }); 
});
// function click_edit(){

// 	var infoDto =CKEDITOR.instances['infoDto'].getData();
// 	var giaTourKMDto=document.getElementById("giaTourKMDto");
// 	var soChoDto=document.getElementById("soChoDto");
// 	var giaTourDto=document.getElementById("giaTourDto");
// 	var ngayKHDto =$("#ngayKHDto").val();
// 	var ngayKTDto =$("#ngayKTDto").val();
// 	var today =$("#today").val();
// 	var ngaykh = $.datepicker.parseDate('dd/mm/yy', ngayKHDto);
// 	var ngaykt = $.datepicker.parseDate('dd/mm/yy', ngayKTDto);
// 	var ngayht = $.datepicker.parseDate('dd/mm/yy', today);
// 	var date = /^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((1[6-9]|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((1[6-9]|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((1[6-9]|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/;
// 	var number=/^[0-9.]+$/;
// 	var fields = $(".row").closest(".info").find( ":input" );
// 	jQuery.each( fields, function( i, field ) {
// 	 	var b = "#" + field.name;
// 	 	if(field.value == "" || field.value <= 0){
// 	 		if(b != "#giaTourDto"){
// 		 		$(b).closest(".row").find(".error").empty();
// 	      		$(b).closest(".row").find(".error").append("Thông tin bắt buộc");
// 	      		field.value.focus();
// 	      		return false;
//       		}
// 	    }
// 	    else{
// 	    	$(b).closest(".row").find(".error").empty();	
// 	    }
//     });

// 	if(this.soChoDto.value >= 1000) {
//       $("#soChoDto").closest(".row").find(".error").empty();
// 	  $("#soChoDto").closest(".row").find(".error").append("số lượng quá lớn");
//       this.soChoDto.focus();
//       return false;
//     }
//     else if(!number.test(soChoDto.value)){
// 		$("#soChoDto").closest(".row").find(".error").empty();
// 	  	$("#soChoDto").closest(".row").find(".error").append("Số lượng phải là số");
// 		this.soChoDto.focus();
// 		return(false);
// 	}
// 	else if(!(date.test(ngayKHDto))){
//       $("#ngayKHDto").closest(".row").find(".error").empty();
// 	  $("#ngayKHDto").closest(".row").find(".error").append("Chưa đúng format");
//       this.ngayKHDto.focus();
//       return false;
//     }
// 	else if(!(date.test(ngayKTDto))){
//       $("#ngayKTDto").closest(".row").find(".error").empty();
// 	  $("#ngayKTDto").closest(".row").find(".error").append("Chưa đúng format");
//       this.ngayKTDto.focus();
//       return false;
//     }
// 	else if (ngaykt <= ngaykh) {
//       	$("#ngayKTDto").closest(".row").find(".error").empty();
// 	  	$("#ngayKTDto").closest(".row").find(".error").append("Ngay Kt phải lớn ngày kh");
//       	this.ngayKTDto.focus();
//       	return false;
// 	}
//     else if(!number.test(giaTourKMDto.value)){
// 		$("#giaTourKMDto").closest(".row").find(".error").empty();
// 	  	$("#giaTourKMDto").closest(".row").find(".error").append("Giá tour KM phải là số");
// 		this.giaTourKMDto.focus();
// 		return false;
// 	}
//     else if(this.giaTourDto.value != "" && !number.test(giaTourDto.value)){
// 			$("#giaTourDto").closest(".row").find(".error").empty();
// 	  		$("#giaTourDto").closest(".row").find(".error").append("Giá tour phải là số")
// 			this.giaTourDto.focus();
// 			return false;
// 	}
// 	else if(infoDto == "") {
// 		$("#infoDto").closest(".details").find(".error").empty();
// 	  	$("#infoDto").closest(".details").find(".error").append("Thông tin bắt buộc")
// 		this.CKEDITOR.instances['infoDto'].focus();
// 		return false;
// 	}
//     else{
// 			Update_Tour();	
// 	}
// }

//======================================
//=========Cập nhật tour================
//======================================
function Update_Tour(){

	var touridDto =$("#touridDto").val();
	var giaTourDto =$("#giaTourDto").val();
	giaTourDto = numeral().unformat(giaTourDto);
	var soChoDto =$("#soChoDto").val();
	var giaTourKMDto =$("#giaTourKMDto").val();
	giaTourKMDto = numeral().unformat(giaTourKMDto);
	var ngayKHDto =$("#ngayKHDto").val();
	var ngayKTDto =$("#ngayKTDto").val();
	var idTourDto =$("#idTourDto").val();
    var tourFromPlaceIdDto = document.getElementsByName("tourFromPlaceIdDto")[0].value;
    var tourGuiderIdDto = document.getElementsByName("tourGuiderIdDto")[0].value;
    var tenTourDto =$("#tenTourDto").val();
    var tourArrivePlaceIdDto = document.getElementsByName("tourArrivePlaceIdDto")[0].value;
    var idDichVuDto = document.getElementsByName("idDichVuDto")[0].value;
    var activeDto =$("#activeDto").val();
    var idUserAdd =$("#idUserAdd").val();
    var infoDto =CKEDITOR.instances['infoDto'].getData();
    var imageDto =$("#imageDto").val();
    var idUserAdd =$("#idUserAdd").val();
    var tourImageDataDto=document.getElementById("tourImageDataDto").value;
	
	var mydata = {
		idDto: touridDto,
		idTourDto: idTourDto,
	   	tenTourDto: tenTourDto,
	   	infoDto: infoDto,
	   	imageDto: imageDto,
	   	soChoDto: soChoDto,
	   	giaTourDto: giaTourDto,
	   	giaTourKMDto: giaTourKMDto,
	   	ngayKHDto: ngayKHDto,
	   	ngayKTDto:ngayKTDto,
	   	idDichVuDto: idDichVuDto,
	   	viewDto: null,
	   	activeDto: activeDto,
	   	tourArrivePlaceIdDto: tourArrivePlaceIdDto,
	   	tourGuiderIdDto: tourGuiderIdDto,
	   	tourFromPlaceIdDto: tourFromPlaceIdDto,
	   	tourDeleteDateDto: null,
	   	tourImageDataDto: tourImageDataDto,
	   	idUserAdd: idUserAdd
	};
	console.log(mydata);
	$.ajax({
		url : "http://103.47.194.91:8080/spr-data/tour/updateTour",
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
				alert("khong tim thay trang");
				document.location.href='index.php';
			},
			200:function(){
				alert("Cập nhật thành công");
				document.location.href='index.php?page=list-tour';
			},
			500:function(){
				alert("Lỗi server!!!");
				document.location.href='index.php?page=list-tour';
			}
		}
	});
}

// format money to int 
var format = function(num){
	var str = num.toString().replace("$", ""), parts = false, output = [], i = 1, formatted = null;
	if(str.indexOf(".") > 0) {
		parts = str.split(".");
		str = parts[0];
	}
	str = str.split("").reverse();
	for(var j = 0, len = str.length; j < len; j++) {
		if(str[j] != ",") {
			output.push(str[j]);
			if(i%3 == 0 && j < (len - 1)) {
				output.push(",");
			}
			i++;
		}
	}
	formatted = output.reverse().join("");
	return(formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
};
$(function(){
    $("#giaTourDto").keyup(function(e){
        $(this).val(format($(this).val()));
    });
    $("#giaTourKMDto").keyup(function(e){
        $(this).val(format($(this).val()));
    });
});
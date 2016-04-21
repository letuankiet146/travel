//======================================
//==========kiểm tra form===============
//======================================
function click_edit(){

	var infoDto =CKEDITOR.instances['infoDto'].getData();
	var giaTourKMDto=document.getElementById("giaTourKMDto");
	var soChoDto=document.getElementById("soChoDto");
	var giaTourDto=document.getElementById("giaTourDto");
	var ngayKHDto =$("#ngayKHDto").val();
	var ngayKTDto =$("#ngayKTDto").val();
	var today =$("#today").val();
	var ngaykh = $.datepicker.parseDate('dd/mm/yy', ngayKHDto);
	var ngaykt = $.datepicker.parseDate('dd/mm/yy', ngayKTDto);
	var ngayht = $.datepicker.parseDate('dd/mm/yy', today);
	var date = /^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((1[6-9]|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((1[6-9]|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((1[6-9]|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/;
	var number=/^[0-9.]+$/;

	var fields = $(".row").closest(".info").find( ":input" );
	jQuery.each( fields, function( i, field ) {
	 	var b = "#" + field.name;
	 	if(field.value == "" || field.value <= 0){
	 		if(b != "#giaTourDto"){
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

	if(this.soChoDto.value >= 1000) {
      $("#soChoDto").closest(".row").find(".error").empty();
	  $("#soChoDto").closest(".row").find(".error").append("số lượng quá lớn");
      this.soChoDto.focus();
      return false;
    }
    else if(!number.test(soChoDto.value)){
		$("#soChoDto").closest(".row").find(".error").empty();
	  	$("#soChoDto").closest(".row").find(".error").append("Số lượng phải là số");
		this.soChoDto.focus();
		return(false);
	}
	else if(!(date.test(ngayKHDto))){
      $("#ngayKHDto").closest(".row").find(".error").empty();
	  $("#ngayKHDto").closest(".row").find(".error").append("Chưa đúng format");
      this.ngayKHDto.focus();
      return false;
    }
    else if (ngaykh <= ngayht) {
      	$("#ngayKHDto").closest(".row").find(".error").empty();
	  	$("#ngayKHDto").closest(".row").find(".error").append("Ngay KH phải lớn ngày hiện tại");
      	this.ngayKHDto.focus();
      	return false;
	}
	else if(!(date.test(ngayKTDto))){
      $("#ngayKTDto").closest(".row").find(".error").empty();
	  $("#ngayKTDto").closest(".row").find(".error").append("Chưa đúng format");
      this.ngayKTDto.focus();
      return false;
    }
	else if (ngaykt <= ngaykh) {
      	$("#ngayKTDto").closest(".row").find(".error").empty();
	  	$("#ngayKTDto").closest(".row").find(".error").append("Ngay Kt phải lớn ngày kh");
      	this.ngayKTDto.focus();
      	return false;
	}
    else if(!number.test(giaTourKMDto.value)){
		$("#giaTourKMDto").closest(".row").find(".error").empty();
	  	$("#giaTourKMDto").closest(".row").find(".error").append("Giá tour KM phải là số");
		this.giaTourKMDto.focus();
		return false;
	}
    else if(this.giaTourDto.value != "" && !number.test(giaTourDto.value)){
			$("#giaTourDto").closest(".row").find(".error").empty();
	  		$("#giaTourDto").closest(".row").find(".error").append("Giá tour phải là số")
			this.giaTourDto.focus();
			return false;
	}
	else if(infoDto == "") {
		$("#infoDto").closest(".details").find(".error").empty();
	  	$("#infoDto").closest(".details").find(".error").append("Thông tin bắt buộc")
		this.CKEDITOR.instances['infoDto'].focus();
		return false;
	}
    else{
			Update_Tour();	
	}
}

//======================================
//=========Cập nhật tour================
//======================================
function Update_Tour(){

	var touridDto =$("#touridDto").val();
	var giaTourDto =$("#giaTourDto").val();
	var soChoDto =$("#soChoDto").val();
	var giaTourKMDto =$("#giaTourKMDto").val();
	var ngayKHDto =$("#ngayKHDto").val();
	var ngayKTDto =$("#ngayKTDto").val();
	var idTourDto =$("#idTourDto").val();
    var tourFromPlaceIdDto =$("#tourFromPlaceIdDto").val();
    var tourGuiderIdDto =$("#tourGuiderIdDto").val();
    var tenTourDto =$("#tenTourDto").val();
    var tourArrivePlaceIdDto =$("#tourArrivePlaceIdDto").val();
    var idDichVuDto =$("#idDichVuDto").val();
    var imageDto =$("#imageDto").val();
    var activeDto =$("#activeDto").val();
    var idUserAdd =$("#idUserAdd").val();
    var infoDto =CKEDITOR.instances['infoDto'].getData();
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
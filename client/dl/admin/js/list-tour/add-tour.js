//======================================
//==========kiểm tra form===============
//======================================
function click_load(){
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
	  		$("#giaTourDto").closest(".row").find(".error").append("Giá tour phải là số");
			this.giaTourDto.focus();
			return false;
	}
	else if(this.imageDto.value == "") {
		$("#imageDto").closest(".thumb").find(".error").empty();
	  	$("#imageDto").closest(".thumb").find(".error").append("Yêu cầu chọn ảnh đại diện");
		this.imageDto.focus();
		return false;
	}
	else if(infoDto == "") {
		$("#infoDto").closest(".details").find(".error").empty();
	  	$("#infoDto").closest(".details").find(".error").append("Thông tin bắt buộc");
		this.CKEDITOR.instances['infoDto'].focus();
		return false;
	}
    else{
		add_tour();
	}	
}

//======================================
//===========tạo tour===================
//======================================
function add_tour(){
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
    var activeDto =$("#activeDto").val();
    var idUserAdd =$("#idUserAdd").val();
    var infoDto =CKEDITOR.instances['infoDto'].getData();
    var imageDto =$("#imageDto").val();
    var tourImageDataDto=document.getElementById("tourImageDataDto").value;
    var x = Math.floor((Math.random() * 1000000000) + 1);

	var mydata = {
		idTourDto: idTourDto,
	   	tenTourDto: tenTourDto,
	   	infoDto: infoDto,
	   	imageDto: x + '_' +imageDto,
	   	soChoDto: soChoDto,
	   	giaTourDto: giaTourDto,
	   	giaTourKMDto: giaTourKMDto,
	   	ngayKHDto: ngayKHDto,
	   	ngayKTDto:ngayKTDto,
	   	idDichVuDto: idDichVuDto,
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
		url : "http://localhost:8080/spr-data/tour/addTour",
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
				alert("Tạo tour thành công.");
				location.reload();
			},
			500:function(){
				alert("ERROr.");
			}
		}
	});
}

//======================================
//===Load địa điểm đến theo Loại tour===
//======================================
function ajax_arrive(){
    var areaIdDto =$("#areaIdDto").val();
	$.ajax({
		url : "controller/list-tour.php?type=arrive",
		type: "POST",
		dataType: "json",
		cache: false,
		data:{
			"areaIdDto": areaIdDto
		}
	})
	.done(function(data) {
		var str='';
		str+='<option value="0">Chọn địa điểm đến</option>';
		$.each(data, function(i, val) {
			str += '<option value="' + val.arrive_place_id + '">' + val.arrive_place_name + ' </option>';
			$('#tourArrivePlaceIdDto').html(str);
		});
	});
}
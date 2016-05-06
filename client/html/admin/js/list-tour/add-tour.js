//======================================
//==========kiểm tra form===============
//======================================
$(document).ready(function () {
    $("#formAddEdit").validate({
        rules: {
            areaIdDto: {required: true},
            idTourDto: {required: true},
            tenTourDto: {required: true},
            tourFromPlaceIdDto: {required: true},
            tourArrivePlaceIdDto: {required: true},
            tourGuiderIdDto: {required: true},
            soChoDto: {required: true, number: true, min: 15, max:50},
            ngayKHDto: {required: true, dateISO:true},
            ngayKTDto: {required: true, dateISO:true},
            idDichVuDto: {required: true},
            giaTourDto: {required: true, number: true, minlength:7 , maxlength:10},
            giaTourKMDto: {number: true, minlength: 7, maxlength:10},
            imageDto: {required: true}
        },
        messages: {
            areaIdDto: {required: "Thông tin bắt buộc"},
            idTourDto: {required: "Thông tin bắt buộc"},
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
            			maxlength: "Giá trị < 100,000,000vnđ"},
            imageDto: {required: "Thông tin bắt buộc"}
        },
        // thực hiện sau khi kiểm tra đúng
        submitHandler: function() {
        	var infoDto =CKEDITOR.instances['editor'].getData();
			var ngayKHDto =$("#ngayKHDto").val();
			var ngayKTDto =$("#ngayKTDto").val();
			var ngaykh = $.datepicker.parseDate('dd/mm/yy', ngayKHDto);
			var ngaykt = $.datepicker.parseDate('dd/mm/yy', ngayKTDto);
        	
			if (ngaykt <= ngaykh) {
		      	$("#ngayKTDto").closest(".row").find(".error-r").empty();
			  	$("#ngayKTDto").closest(".row").find(".error-r").append("Ngay Kt phải lớn ngày kh");
			}
			else if(infoDto == "") {
				$("#editor").closest(".details").find(".error-r").empty();
			  	$("#editor").closest(".details").find(".error-r").append("Thông tin bắt buộc");
			}
			else{
 	       		add_tour();
 	       	}
        }
    }); 
});

//======================================
//===========tạo tour===================
//======================================
function add_tour(){
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
    var infoDto =CKEDITOR.instances['editor'].getData();
    var imageDto =$("#imageDto").val();
    var tourImageDataDto=document.getElementById("tourImageDataDto").value;

	var mydata = {
		idTourDto: idTourDto,
	   	tenTourDto: tenTourDto,
	   	infoDto: infoDto,
	   	imageDto: imageDto,
	   	soChoDto: soChoDto,
	   	giaTourDto: "" + giaTourDto + "",
	   	giaTourKMDto: "" + giaTourKMDto + "",
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
		url : "http://103.47.194.91:8080/spr-data/tour/addTour",
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
				$("div").remove('.gif, .f_overlay');
				alert("Lỗi server!");
				// location.reload();
			}
		}
	});
}

//======================================
//===Load địa điểm đến theo Loại tour===
//======================================
function ajax_arrive(){
    var areaIdDto = document.getElementsByName("areaIdDto")[0].value;
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
		str+='<option value="">Chọn địa điểm đến</option>';
		$.each(data, function(i, val) {
			str += '<option value="' + val.arrive_place_id + '">' + val.arrive_place_name + ' </option>';
			$('.tourArrivePlaceIdDto').html(str);
		});
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
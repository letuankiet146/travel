//======================================
//==========kiểm tra form===============
//======================================
$(document).ready(function () {
    $("#formAddEdit").validate({
        rules: {
            areaDto: {required: true},
            nameDto: {required: true},
            dateCreateDto: {required: true,dateISO:true}
        },
        messages: {
            areaDto: {required: "Thông tin bắt buộc"},
            nameDto: {required: "Thông tin bắt buộc"},
            dateCreateDto: {required: "Thông tin bắt buộc",dateISO: "Định dạng ngày không hợp lệ"}
        },
        // thực hiện sau khi kiểm tra đúng
        submitHandler: function() {
        	edit_handbook()
        }
    });
});


//======================================
//===========Thêm nhân viên===================
//======================================
function edit_handbook(){
	var areaDto =$("#areaDto").val();
	var codeDto =$("#codeDto").val();
    var nameDto =$("#nameDto").val();
    var dateCreateDto =$("#dateCreateDto").val();
    var tourImageDataDto =$("#tourImageDataDto").val();
    var statuDto =$("#statuDto").val();
    var infoDto =CKEDITOR.instances['infoDto'].getData();
    var idUserAdd =$("#idUserAdd").val();
    var id =$("#id").val();
    
	var mydata = {
		"id": id,
		"codeDto": codeDto,
		"nameDto": nameDto,
		"dateCreateDto": dateCreateDto,
		"areaDto": areaDto,
		"statuDto": statuDto,
		"infoDto": infoDto,
		"imageDto": tourImageDataDto,
		"idUserAdd": idUserAdd
	};
	console.log(mydata);
	
	$.ajax({
		url : "http://103.47.194.91:8080/spr-data/handbook/update",
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
				alert("Không tìm thấy URL.");
			},
			200:function(){
				alert("Cập nhật cẩm nang thành công");
				location.reload();
			},
			500:function(){
				alert("Lỗi server!!!");
				location.reload();
			}
		}
	});
}
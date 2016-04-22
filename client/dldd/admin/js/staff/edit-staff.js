//======================================
//==========kiểm tra form===============
//======================================
$(document).ready(function () {
    $("#formAddEdit").validate({
        rules: {
            staffName: {required: true},
            staffSex: {required: true},
            staffEmail: {required: true,email: true},
            staffPhone: {required: true,number: true,minlength: 10,maxlength:11},
            staffAddress: {required: true},
            staffBirthday: {required: true,dateISO:true},
            staffVietNameId: {required: true,number: true},
            staffLevel: {required: true},
            staffUser: {required: true},
            staffDateStart: {required: true,dateISO:true}
        },
        messages: {
            staffName: {required: "Thông tin bắt buộc"},
            staffSex: {required: "Thông tin bắt buộc"},
            staffEmail: {required: "Thông tin bắt buộc",email: "Email chưa đúng định dạng"},
            staffPhone: {required: "Thông tin bắt buộc",number: "SDT phải là số",
        				minlength: "SDT không hợp lệ",maxlength: "SDT không hợp lệ"},
            staffAddress: {required: "Thông tin bắt buộc"},
            staffBirthday: {required: "Thông tin bắt buộc",dateISO: "Định dạng ngày không hợp lệ"},
            staffVietNameId: {required: "Thông tin bắt buộc",number: "CMND phải là số"},
            staffLevel: {required: "Thông tin bắt buộc"},
            staffUser: {required: "Thông tin bắt buộc"},
            staffDateStart: {required: "Thông tin bắt buộc",dateISO: "Định dạng ngày không hợp lệ"}
        },
        // thực hiện sau khi kiểm tra đúng
        submitHandler: function() {
        	edit_staff()
        }
    });
});


//======================================
//===========câp nhât nhân viên===================
//======================================
function edit_staff(){
	var staffCode =$("#staffCode").val();
    var staffName =$("#staffName").val();
    var staffLevel =$("#staffLevel").val();
    var staffUser =$("#staffUser").val();
    var staffPassword =$("#staffPassword").val();
    var staffEmail =$("#staffEmail").val();
    var staffPhone =$("#staffPhone").val();
    var staffDateStart =$("#staffDateStart").val();
    var staffAddress =$("#staffAddress").val();
    var staffNote =$("#staffNote").val();
    var staffBirthday =$("#staffBirthday").val();
    var staffSex =$("#staffSex").val();
    var staffVietNameId =$("#staffVietNameId").val();
    var idUserAdd =$("#idUserAdd").val();
    var staffId =$("#staffId").val();

	var mydata = {
		"staffIdDto": staffId,
	    "staffCodeDto": staffCode,
	    "staffNameDto": staffName,
	    "staffLevelDto": staffLevel,
	    "staffUserDto": staffUser,
	    "staffPasswordDto": staffPassword,
	    "staffTypeDto": null,
	    "staffLockDto": null,
	    "staffDeleteDateDto": null,
	    "staffEmailDto": staffEmail,
	    "staffPhoneDto": staffPhone,
	    "staffDateStartDto": staffDateStart,
	    "staffAddressDto": staffAddress,
	    "staffNoteDto": staffNote,
	    "staffBirthdayDto": staffBirthday,
	    "staffSexDto": staffSex,
	    "staffVietNameIdDto": staffVietNameId,
	    "staffImageDto": null,
	    "idUserAdd": idUserAdd
	};
	console.log(mydata);
	
	$.ajax({
		url : "http://localhost:8080/spr-data/staff/update",
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
				alert("Cập nhật nhân viên thành công");
				location.reload();
			},
			500:function(){
				alert("Lỗi server!!!");
				location.reload();
			}
		}
	});
}
/*==========Kiểm tra input=========*/
$(document).ready(function () {
    $("#changepasss").validate({
        rules: {
            password: {required: true},
            password_new: {required: true,minlength: 8},
            password_confirm: {required: true, equalTo : "#password_new"}
        },
        messages: {
            password: {required: "Thông tin bắt buộc"},
            password_new: {required: "Thông tin bắt buộc",minlength: "Mật khẩu lơn hơn 8 ký tự"},
            password_confirm: {required: "Thông tin bắt buộc", equalTo: "Mật khẩu chưa đúng" }
        },
        // thực hiện sau khi kiểm tra đúng
        submitHandler: function() {
            var password_new = $("#password_new").val();
            var oldPassword = $("#oldPassword").val();
            var customerId = $("#customerId").val();
            var mydata = {
                customerId: customerId,
                oldPassword: oldPassword,
                newPassword: password_new
            };
            $.ajax({
                url: 'http://103.47.194.91:8080/spr-data/customer/update/createVerify',
                type: 'POST',
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify(mydata),
            })
            .done(function(data) {
                if(data == 1){
                    document.location.href = "index.php?page=thay-doi-mat-khau/xac-thuc";
                }
                else{
                    alert("Mật khẩu cũ không đúng !!!");
                }
            });
        }
    });
});

/*==========Kiểm tra input=========*/
$(document).ready(function () {
    $("#xacthuc").validate({
        rules: {
            xacthuc: {required: true}
        },
        messages: {
            xacthuc: {required: "Thông tin bắt buộc"}
        },
        // thực hiện sau khi kiểm tra đúng
        submitHandler: function() {
            var customerId = $("#customerId").val();
            var verifyCode = $("#verifyCode").val();
            var mydata = {
                customerId: customerId,
                verifyCode: verifyCode
            };
            console.log(mydata);
            $.ajax({
                url: 'http://103.47.194.91:8080/spr-data/customer/update/confirmVerify',
                type: 'POST',
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify(mydata),
            })
            .done(function(data) {
                if(data == 1){
                    $.ajax({
                        url: 'http://103.47.194.91:8080/spr-data/customer/update/deleteVerify/' + customerId,
                        type: 'GET',
                        dataType: 'json',
                    })
                    .done(function() {
                        document.location.href = "index.php?page=thay-doi-mat-khau/thanh-cong";
                    });
                }
                else{
                    alert("Mã xác thực không đúng");
                }
            });
        }
    });
});

/*==========Kiểm tra input=========*/
$(document).ready(function () {
    $("#RegisterBox").validate({
        rules: {
            // birthday: {required: true,dateISO:true},
            sex: {required: true},
            email: {required: true,email: true},
            phone: {required: true,number: true, minlength:10 , maxlength:11},
            address: {required: true}
        },
        messages: {
            // birthday: {required: "Thông tin bắt buộc",dateISO: "Định dạng ngày không hợp lệ" },
            sex: {required: "Thông tin bắt buộc"},
            email: {required: "Thông tin bắt buộc", email: "Định dạng email không hợp lệ"},
            phone: {required: "Thông tin bắt buộc", number: "SDT phải là số",minlength: "SDT không đúng",maxlength: "SDT không đúng" },
            address: {required: "Thông tin bắt buộc"}
        },
        // thực hiện sau khi kiểm tra đúng
        submitHandler: function() {
            var customerPhoneDto =$("#customerPhoneDto").val();
            var customerEmailDto =$("#customerEmailDto").val();
            var customerAddressDto =$("#customerAddressDto").val();
            var customerBirthDto =$("#birthday").val();
            var customerSexDto = document.getElementsByName("sex")[0].value;
            var customerIdDto =$("#customerId").val();
    
            var mydata = {
                "customerIdDto": customerIdDto,
                "customerBirthDto": customerBirthDto,
                "customerSexDto": customerSexDto,
                "customerPhoneDto": customerPhoneDto,
                "customerEmailDto": customerEmailDto,
                "customerAddressDto": customerAddressDto,
                "idUserAdd": 1
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
                        alert("Cập nhật thông tin thành công");
                        document.location.href='index.php?page=khach-hang'
                    }
                }
            }); 
        }
    });
});
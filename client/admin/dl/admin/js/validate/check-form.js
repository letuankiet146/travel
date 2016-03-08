// ---------kiem tra form lien he---------
$().ready(function() {
        $("#signupForm").validate({
            rules: {
                name: {
                    required: true,
                    rangelength: [2, 6]
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    number: true
                },
                message: "required",
                mabaove: "required"
            },
            messages: {
               name: {
                    required: "Thông tin bắt buộc",
                    digits: "Tên phải nhập bằng chữ"
                },
                phone: {
                    number: "Điện thoại phải nhập bằng số"
                },
                email: {
                    required: "Thông tin bắt buộc",
                    email: "Mail chưa đúng cú pháp"
                },
                message: "Thông tin bắt buộc",
                mabaove: "Thông tin bắt buộc"
            }
        });

    });
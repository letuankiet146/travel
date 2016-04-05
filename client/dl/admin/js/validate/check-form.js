$().ready(function() {
    $("#formAddEdit").validate({
            rules: {
                staffName: {
                    required: true
                }
            },
            messages: {
               staffName: {
                    required: "Thông tin bắt buộc"
                }
            }
    });
});
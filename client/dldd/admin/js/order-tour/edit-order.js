//======================================
//=========Cập nhật tour================
//======================================
function click_edit(){

	var formOrderIdDto =$("#formOrderIdDto").val();
	var formOrderIsPayDto =$("#formOrderIsPayDto").val();
	var formOrderQuantityOtherRequireDto =$("#formOrderQuantityOtherRequireDto").val();
    var idUserAdd =$("#idUserAdd").val();

	var mydata = {
		formOrderIdDto: formOrderIdDto,
	    formOrderIsPayDto: formOrderIsPayDto,
	    formOrderQuantityOtherRequireDto: formOrderQuantityOtherRequireDto,
	    idUserAdd: idUserAdd
	};
	console.log(mydata);
	$.ajax({
		url : "http://103.47.194.91:8080/spr-data/updateOrderTour",
		type: "POST",
		dataType: "json",
		contentType: "application/json", 
		data :JSON.stringify(mydata),
		beforeSend: function () {
            $('.add-edit').append('<div class="gif"><img src="images/preloader.GIF" /></div><div class="f_overlay"></div>');
        },
		success: function(data){ 
			alert(data);
		},
		statusCode: {
			404:function(){
				alert("khong tim thay trang");
				document.location.href='index.php';
			},
			200:function(){
				alert("Cập nhật thành công");
				document.location.href='index.php?page=order-tour';
			}
		}
	});
}
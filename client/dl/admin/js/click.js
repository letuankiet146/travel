$(document).ready(function() {
	$('.opener').click(function() {
		$('.profile-menu').slideToggle("700");
	});
});
$(document).ready(function() {
	$('.title-order').click(function() {
		$(this).closest('.menu').find('.menu-child').slideToggle("700");
	});
});
$(document).ready(function() {
	$('.btn-exit').click(function() {
		$(this).closest('.right').find('.add-edit').slideToggle("700");
	});
});
$(document).ready(function() {
	$('.btn-view').click(function() {
		$(this).closest('.right').find('.add-edit').slideToggle("700");
	});
});

//======================================
//=======LOAD PAGE ADD=======
//======================================
$(document).ready(function() {
	$("#btn-add").click(function(event) {
		$(this).closest('.right').find('.add-edit').slideToggle("700");
		var full_url = document.URL;
		var url_array = full_url.split('?page=list-');
		var folder = url_array[url_array.length -1];
		var count = folder.split("#").length;
		if(count == 1){
			folder = folder;
		}
		else{
			var num = folder.lastIndexOf("#");
			folder = folder.slice(0, num);
		}
		$.ajax({
			url: 'views/' + folder + '/add-' + folder + '.php',
			dataType: 'text',
		})
		.done(function(data) {
			$("#loadingAjax").html(data);
		})
	});
});


//======================================
//=======Xóa tour theo mảng ARRAY=======
//======================================
function del_array(){
	var full_url = document.URL;
	var url_array = full_url.split('?page=');
	var paged = url_array[url_array.length - 1];
	var count = paged.split("#").length;
	if(count == 1){
		paged = paged;
	}
	else{
		var num = paged.lastIndexOf("#");
		paged = paged.slice(0, num);
	}

   	var elem = document.getElementsByTagName("input");
	var names = [];
	for (var i = 0; i < elem.length; ++i) {
		if (elem[i].checked){
		    if (typeof elem[i].attributes.class !== "undfined") {
		      	if(elem[i].attributes.class.value === "chk"){
		       		names.push(elem[i].value);
		      	}
		    }
		}
	}
	var chk = names.join(",");
	var idUserAdd =$("#idUserAdd").val();
	if(chk != ""){
		var x = confirm("Bạn có chắc chắn xóa không?");
		if(x){
			$.ajax({
				url: 'controller/' + paged + '.php?type=chk',
				type: 'POST',
				data: {chk: chk},
				beforeSend: function(){
					$('.right').append('<div class="gif"><img src="images/preloader.GIF" /></div><div class="f_overlay"></div>');
				},
			})
			.done(function(data) {
				console.log(data);
			})
			.fail(function(error) {
				console.log(error);
			})
			.always(function() {
				alert("Xóa thành công");
				location.reload();
			});
		}
	}
	else{
		alert("Chưa chọn tour để xóa.")
	}
}


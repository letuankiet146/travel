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

$(document).ready(function() {
	$("#add-tour").click(function(event) {
		$(this).closest('.right').find('.add-edit').slideToggle("1000");
		$.ajax({
			url: 'views/list-tour/add-tour.php',
			dataType: 'text',
		})
		.done(function(data) {
			$("#creatTour").html(data);
		})
	});
});

//======================================
//=======Xóa tour theo mảng ARRAY=======
//======================================
function del_array(){
	var x = confirm("Bạn có chắc chắn xóa không?");
	if(x){
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
		var chk = "[" + names.join(",") + "]";
		alert(names);
		var idUserAdd =$("#idUserAdd").val();
		$.ajax({
			// url: 'controller/list-tour.php?type=chk',
			// type: 'POST',
			// data: {chk: chk},
			url: 'http://project-iuhhappytravel.rhcloud.com/spr-data/history/delete/',
			type: 'POST',
			// dataType: "json",
			// contentType: "application/json",
			data: {names: names},
		})
		.done(function(data) {
			console.log(data);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			// location.reload();
		});
	}
}
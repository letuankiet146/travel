//===================================
//=======load data notification======
//===================================
$(document).ready(function() {
	load_notify();
});

function load_notify(){
	$.ajax({
		url: 'http://103.47.194.91:8080/spr-data/notification/list',
		type: 'GET',
		dataType: 'json',
	})
	.done(function(data) {
		var html='';
		for (var i = data.length-1; i >= 0; i--) {
			var a = data[i]['createDate'];
			//var d = new Date(a);
			var dayPost = $.datepicker.formatDate( "dd-mm-yy", new Date(a) );
			html +='<div class="messages-box">'+
					'<div class="messages">'+
						'<p>' + data[i]['content'] + '</p>'+
						'<div class="user_day">'+
							'<p>' + data[i]['staffEntity']['staffName'] + '</p>'+
							'<p><em>' + dayPost + '</em></p>'+
						'</div>'+
					'</div>'+
				'</div>';
			$('#message_list').html(html);
		}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}
//===================================
//=======add notification======
//===================================
function add_notify(){
	var content=document.getElementById("content").value;
	if(content == "") {
		alert("Bạn chưa nhập nội dung thông báo");
		this.content.focus();
		return false;
	}
	else{
		var content = $("#content").val();
		var idUserAdd = $("#idUserAdd").val();
		var mydata = {
			"user": idUserAdd,
	    	"content": content	
	    };
	    console.log(mydata);
		$.ajax({
			url: 'http://103.47.194.91:8080/spr-data/notification/add',
			type: 'POST',
			dataType:'json',
			contentType: 'application/json',
			data: JSON.stringify(mydata)
		})
		.done(function(data) {
			console.log(a);
		})
		.always(function() {
			load_notify();
		});
	}
}
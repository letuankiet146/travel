//===================================
//=======load data notification======
//===================================
$(document).ready(function() {
	$.ajax({
		url: 'http://project-iuhhappytravel.rhcloud.com/spr-data/notification/list',
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
});
// //===================================
// //============load data history======
// //===================================
// $(document).ready(function() {
// 	$.ajax({
// 		url: 'http://project-iuhhappytravel.rhcloud.com/spr-data/history/list',
// 		type: 'GET',
// 		dataType: 'json',
// 		cache: false,
// 	})
// 	.done(function(data) {
// 		var str ="";
// 		for (var i = data.length-1; i >=0; i--) {
// 			str += 	'<tr>'+
// 							'<td>' + data[i]['staffEntity']['staffName'] +  '</td>'+
// 							'<td>' + data[i]['action'] + '</td>'+
// 							'<td>' + data[i]['createDate'] + '</td>'+
// 						'</tr>';
// 			$('#contents').html(str);
// 		}
// 	});	
// });
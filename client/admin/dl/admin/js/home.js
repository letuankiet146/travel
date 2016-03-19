$(document).ready(function() {
	$.ajax({
		url: ' http://project-iuhhappytravel.rhcloud.com/spr-data/history/list',
		type: 'get',
		dataType: 'json',
		cache: false,
	})
	.done(function(data) {
			$.each(data, function(val) {
			var dayStart= val.tour_day_start; 
			var fdayStart = $.datepicker.formatDate( "dd-mm-yy", new Date(dayStart) );
			var dayEnd = val.tour_day_end; 
			var fdayEnd = $.datepicker.formatDate( "dd-mm-yy", new Date(dayEnd) );
			var str = 	'<tr>'+
							'<td>' +val.user + '</td>'+
							'<td>' +val.content + '</td>'+
							'<td>' +val.create_date + '</td>'+
						'</tr>';
				$('#contents').html(str);
			});
		}
	});	
});
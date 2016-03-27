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

$(document).ready(function() {
	$("#add-customer").click(function(e) {
		$(this).closest('.right').find('.add-edit').slideToggle("1000");
		// $.ajax({
		// 	url: 'views/customer/add-customer.php',
		// 	dataType: 'text',
		// })
		// .done(function(data) {
		// 	$("#add-customer").html(data);
		// })
		
	});
});
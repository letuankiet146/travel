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
	$('#add-tour').click(function() {
		$(this).closest('.right').find('.add-edit').slideToggle("700");
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
// LOAD AJAX
// $(document).ready(function() {
//     $('.btn-add').click(function() {
//         //$(this).closest(".right").find('#add-edit-tour').css("display","none");
//         $(this).closest(".right").find('.add-edit').append('<div class="gif"><img src="images/preloader.GIF" /></div><div class="f_overlay"></div>');
//     });
    
// });
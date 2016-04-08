
$(document).ready(function(){
    tabs();
    function tabs() {
		$('.tab_content').hide();
		$('.tab_content:first').show();
		$('.tab_nav li a:first').addClass('active');
		$('.tab_nav li a').click(function(){
             var $string = $(this).attr("class");
              if($string != "" && String($string) != "undefined" ){
                if( $string.match(/active/gi) != "" ){
                    console.log($string.match(/active/gi));
                    return false;   
                }
             }
			 var  id_content = $(this).attr("href"); 
			 $('.tab_content').hide();
			 $(id_content).fadeIn();
			 $('.tab_nav li a').removeClass('active');
			 $(this).addClass('active');
			 return false;
		});
	}      
});/*

 $(document).ready(function() {
 	//jQuery.validator.addMethod
     jQuery.validator.addMethod("numberphone", function(value, element) {
             intRegex = /^[0-9]{9,11}$/;
             if(intRegex.test(value)){
                 return true;
             }else{
                 return false;
             };
         },"S? di?n tho?i không h?p l?");
 	var validator = $("#formContact").validate({
 		rules: {
              name: {
                 required: true
                    },
              email: {
 				required: true,
 				email: true 
 		         },
             "phone": {
                 required: true
                    },
              "content": {
                 required: true
                    },
              },
              messages: {
                 name: "Vui lòng nh?p h? tên",
                 'phone': "Vui lòng nh?p s? di?n tho?i",
                 'content': "Vui lòng nh?p n?i dung",
                 email: {
     				required: "Vui lòng nh?p email",
     				email: "Email không h?p l?" 
 			     },
              }
 		
 	});
  });
 */
 $(document).ready(function(){
    $(".viewmap").click(function(){
        var $scrollTop = $(".view_map").offset().top;
        console.log($scrollTop);
        $('html,body').animate({scrollTop: $scrollTop},1000);  
    });  
});
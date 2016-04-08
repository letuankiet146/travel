$(function() {
    $( "#from" ).datepicker({
      showOn: "button",
      buttonImage: "js/datepicker/images/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Select date"
    });
    $( "#to" ).datepicker({
      showOn: "button",
      buttonImage: "js/datepicker/images/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Select date"
    });
});
$(document).ready(function(){
    $("#contentComment").focus(function(){
        $(this).css({height:"115px"});   
        $(this).parents(".w_content").find(".content-info").stop().slideDown(700); 
    });  
});
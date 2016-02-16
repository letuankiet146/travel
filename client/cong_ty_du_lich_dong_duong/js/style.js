$(document).ready(function(){
    $("#menu").mmenu({
    	extensions		: ['widescreen', 'theme-white', 'effect-slide-menu'],
    	dividers		: {
    		fixed 	: true
    	},
        slidingSubmenus :false,
        offCanvas: {
           position  : "right",
           //zposition : "front"
           },
    });
});
$(document).ready(function(){
    $(".submenu .title-menu .title").click(function(){
        if(! $(this).parents(".title-menu").hasClass("show")){
            $(this).parents(".title-menu").addClass("show");
        }else{
            $(this).parents(".title-menu").removeClass("show");
        } 
    });
    $(window).bind("click",function(e){
        var $clicked = $(e.target);
        if(! $clicked.parents().hasClass("title-menu")){
            $(".submenu .title-menu").removeClass("show");           
        }
    });
    $(window).resize(function(){
        if( window.innerWidth > 768){
            $(".submenu .title-menu").removeClass("show");
        }
    });
 });
/*
 $(document).ready(function(){
     $(".viewmap").fancybox({
 		fitToView	: false,
 		closeClick	: false,
 		openEffect  : 'elastic',
         closeEffect : 'elastic',
     });    
 });
 $(document).ready(function(){
     $(".video").fancybox({
 		fitToView	: false,
 		closeClick	: false,
 		openEffect  : 'elastic',
         closeEffect : 'elastic',
     });  
 });
 $(document).ready(function(){
     $(".search .icon-search").click(function(){
         if(! $(this).parent().find(".formSearch").hasClass("show")){
             $(this).parent().find(".formSearch").addClass("show");
         }else{
             $(this).parent().find(".formSearch").removeClass("show");
         } 
     });
     $(document).bind('click',function(e){
         var $clicked = $(e.target);
         if(! $clicked.parents().hasClass("search")){
             $(".search .formSearch").removeClass("show");
         }
         console.log($clicked);    
     });
 });
 */
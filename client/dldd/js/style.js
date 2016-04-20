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
/*======================================
*================SLIDER BANNER===============
*========================================*/
 $(document).ready(function(){
    $("#vnt-banner").nivoSlider({ 
        effect:'random',  
        pauseTime:5000, 
        directionNav:false , 
        controlNav: true, 
        pauseOnHover:false,  
        autoPlay: true,
    });
 });

 $(document).ready(function() {
     $(".iconsearch a").click(function() {
        $(this).parent().toggleClass("open");
        $(".open .f_overlay").click(function(){
            $(this).parent().removeClass("open");
        });
     });
 });

//================RADIO BUTTON===============
 $(document).ready(function(){
    $(".input-radio ul li label").click(function(){
        $(".input-radio ul li").removeClass("active");
        $(this).parents("li").addClass("active"); 
        var id = $(this).find('input').val();
        $.ajax({
            url: 'include/tour/function.php?type=listPlace&area_id=' +id,
            type: 'POST',
            dataType: 'text',
        })
        .done(function(data) {
            $("#to").empty();
            $("#to").html(data);
        });
    });
 });

 $(document).ready(function() {
     $("#customer_menu").hover(function() {
        $(".customer_menu").css('display', 'block');
     }, function() {
        $(".customer_menu").css('display', 'none');
     });
 });
 $(document).ready(function() {
     $("body").lazyScrollLoading({
         lazyItemSelector : ".lazyloading , .lazyloading1 , .lazyloading2",
         onLazyItemVisible : function(e, $lazyItems, $visibleLazyItems) {
             $visibleLazyItems.each(function() {
                 $(this).addClass("show");
             });
         }
     });
 });
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
 $(document).ready(function(){
    $(".input-radio ul li label").click(function(){
        $(".input-radio ul li").removeClass("active");
        $(this).parents("li").addClass("active");    
    });
 });
 $(document).ready(function(){
    $(".vnt-tour .title-menu .title").click(function(){
        if(! $(this).parents(".title-menu").hasClass("show")){
            $(this).parents(".title-menu").addClass("show");
        }else{
            $(this).parents(".title-menu").removeClass("show");
        } 
    });
    $(window).bind("click",function(e){
        var $clicked = $(e.target);
        if(! $clicked.parents().hasClass("title-menu")){
            $(".vnt-tour .title-menu").removeClass("show");           
        }
    });
    $(window).resize(function(){
        if( window.innerWidth > 768){
            $(".vnt-tour .title-menu").removeClass("show");
        }
    });
    $(".vnt-tour .title-menu .menu a").click(function(){
        if($(this).parent().hasClass("active")){
            $(".vnt-tour .title-menu").removeClass("show");
            return false;
        }
        $(".vnt-tour .title-menu .title").html($(this).text());
        $(".vnt-tour .title-menu").removeClass("show");
        $(".vnt-tour .title-menu .menu ul li").removeClass("active");
        $(this).parents("li").addClass("active");
        if($(this).attr("data-ajax") == "1"){
            $.ajax({
              beforeSend : function(){
                $("#loadAjaxTour").append("<div class='loadding'><img src='images/main/loading.gif'/></div>")
              }, 
              url: "cong_ty_du_lich_dong_duong_tour1.html",
              dataType: 'text',
              context: document.body
            }).done(function(value) {
                setTimeout(function() {
                    $("#loadAjaxTour").html(value);
                }, 2000);
            });    
        }else{
            if($(this).attr("data-ajax") == "2"){
                $.ajax({
                  beforeSend : function(){
                    $("#loadAjaxTour").append("<div class='loadding'><img src='images/main/loading.gif'/></div>")
                  },
                  dataType: 'text',
                  url: "cong_ty_du_lich_dong_duong_tour2.html",
                  context: document.body
                }).done(function(value) {
                    setTimeout(function() {
                        $("#loadAjaxTour").html(value);
                    }, 2000);
                });    
            }else{
                if($(this).attr("data-ajax") == "3"){
                    $.ajax({
                      url: "cong_ty_du_lich_dong_duong_tour3.html",
                      type: "POST",
                      dataType: 'text',
                      beforeSend : function(){
                        $("#loadAjaxTour").append("<div class='loadding'><img src='images/main/loading.gif'/></div>")
                      },
                      success: function(result){
                        setTimeout(function() {
                            $("#loadAjaxTour").html(result);
                        },2000);
                        }
                    })

                }    
            } 
        }
        return false;
    });
 });
/*
 $(document).ready(function(){
     $("#banner").nivoSlider({ 
         effect:'random',  
         pauseTime:5000, 
         directionNav:false , 
         controlNav: true, 
         pauseOnHover:false,  
         autoPlay: true,
     });
  });
 $(document).ready(function(){
     $(window).scroll(function(){
         var $scrollTop = $(window).scrollTop();
         if($scrollTop > 35){
             $("#header .div-absolute").addClass("div-fixed");
         }else{
             $("#header .div-absolute").removeClass("div-fixed");
         }      
     });
 });
 $(document).ready(function(){
     $('#slider-content').owlCarousel({
      items: 4,
      scrollPerPage:true,
      autoHeight : true,
      loop:true,
      nav:false,
      dots: false,
      autoplay:true,
      autoplayTimeout:3000,
      slideBy:4,
     });
 });
 */

/*==========INPUT RADIO=========*/
 $(document).ready(function(){
    $(".input-radio ul li label").click(function(){
        $(".input-radio ul li").removeClass("active");
        $(this).parents("li").addClass("active");    
    });
 });
 /*==========SLIDER BAR=========*/
 $(document).ready(function(){
    $(".box.showinfo .box-title .fTitle").click(function(){
        if( window.innerWidth <= 768){
            if($(this).parents(".showinfo").hasClass("show")){
                $(this).parents(".showinfo").removeClass("show");
                $(this).parents(".showinfo").find(".box-content").stop().slideToggle("700");
            }else{
                $(".box.showinfo.show .box-content").stop().slideToggle("700");
                $(".box.showinfo.show").removeClass("show");
                $(this).parents(".showinfo").addClass("show");    
                $(this).parents(".showinfo").find(".box-content").stop().slideToggle("700");
            }
        }    
    });

    $(window).resize(function(){
        if( window.innerWidth > 768){
             $(".box.showinfo.show").removeClass("show");
             $(".box.showinfo .box-content").css({display:"block"});
        }
        if( window.innerWidth <= 768){
             $(".box.showinfo .box-content").css({display:"none"});
        }
    });
 });

  /*==========SLIDER PRODUCT TOP=========*/
$(document).ready(function(){
     $(document).ready(function(){
     $('#slider-detail').slick({
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
     });
    });
});

 /*==========SLIDER PRODUCT BOTTOM=========*/
$(document).ready(function(){
    $(document).ready(function(){
        $('#sliderProduct').slick({
            dots: false,
            slidesToShow: 3,
            slidesToScroll: 3,
            autoplay: true,
            autoplaySpeed: 5000,
            responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                  }
                },
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
              ]
        });
    });
});

/*==========TAB INFO=========*/
$(document).ready(function(){
    $(window).load(function(){
        if( window.innerWidth > 768){
            var $heightFirstContent = $(".vnt-tab ul li:first .vnt-content").outerHeight();
            var $heightUl = $(".vnt-tab ul").outerHeight();
            $(".vnt-tab").css({height:(parseInt($heightUl) + parseInt($heightFirstContent)) + 'px'});
            $(".vnt-tab ul li:first").addClass("active");
        }else{
            if( window.innerWidth <= 768){
            
            }    
        }    
    });
    $(".vnt-tab ul li .title").click(function(){
        if( window.innerWidth > 768){
            var $heightCurrent = $(this).parent("li").find(".vnt-content").outerHeight();
            var $heightUl = $(".vnt-tab ul").outerHeight();
            $(".vnt-tab ul li").removeClass("active");
            $(".vnt-tab").css({height:(parseInt($heightUl) + parseInt($heightCurrent)) + 'px'});
            $(this).parent("li").addClass("active");        
        }else{
            if( window.innerWidth <= 768){
                if($(this).parent("li").hasClass("showinfo")){
                    $(this).parent("li").removeClass("showinfo");
                    $(this).removeClass("active");
                    $(this).parent("li").find(".vnt-content").stop().slideToggle("700");
                }else{
                    $(".vnt-tab ul li.showinfo .title").removeClass("active");
                    $(".vnt-tab ul li.showinfo .vnt-content").stop().slideToggle("700");
                    $(".vnt-tab ul li.showinfo").removeClass("showinfo");
                    $(this).parent("li").addClass("showinfo");
                    $(this).addClass("active");
                    $(this).parent("li").find(".vnt-content").stop().slideToggle("700");
                }
            }    
        }    
    });
    $(window).resize(function(){
        if( window.innerWidth > 768){
            if ($(".vnt-tab ul li.active").size() == 0){
                var $heightCurrent = $(".vnt-tab ul li:first .vnt-content").outerHeight();
                $(".vnt-tab ul li:first").addClass("active");
            }else{
                var $heightCurrent = $(".vnt-tab ul li.active .vnt-content").outerHeight();    
            }
            var $heightUl = $(".vnt-tab ul").outerHeight();
            $(".vnt-tab").css({height:(parseInt($heightUl) + parseInt($heightCurrent)) + 'px'});
            $(".vnt-tab ul li .vnt-content").css({display:'block'});
            $(".vnt-tab ul li .title").removeClass("active");
            $(".vnt-tab ul li").removeClass("showinfo");
        }else{
            if( window.innerWidth <= 768){
                $(".vnt-tab").css({height:'auto'});
                $(".vnt-tab ul li .vnt-content").css({display:'none'});
            }
        }
    });
    var $size = parseInt($(".vnt-tab ul li").size());
    $(".vnt-tab ul li").each(function(){
        $(this).find(".title").css({"z-index":$size});
        $size = $size - 1;        
    });
});

/*==========INPUT COMMENT=========*/
$(document).ready(function(){
    $("#contentComment").focus(function(){
        $(this).css({height:"115px"});   
        $(this).parents(".w_content").find(".content-info").stop().slideDown(700); 
    });  
});

// ======paging read more======
$(document).ready(function(){
    $(".item").hover(function() {
        $(this).find(".see_details").css('opacity', '1');
    }, function() {
        $(this).find(".see_details").css('opacity', '0');
    });
    
});
function load_paging(num){
    $(".viewdetail").html("Loading...");
    var lastID = $(".viewdetail").closest('#vnt-main').find('.grid-tour').children(':last').attr("item-id");
    $.ajax({
        url: 'model/paging.php?type=list',
        type: 'POST',
        dataType: 'text',
        data: {
            lastID: lastID,
            num: num
        },
    })
    .done(function(data) {
        console.log(data);
        if(data == 0){
            $(".pagination").remove();
        }  
        else{  
            $(".viewdetail").html("Xem thêm");  
            $('.grid-tour').append(data); 
        }  
    });
}
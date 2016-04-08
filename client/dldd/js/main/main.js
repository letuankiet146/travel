/*======================================
*================Load row===============
*========================================*/
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

/*======================================
*================RADIO BUTTON===============
*========================================*/
 $(document).ready(function(){
    $(".input-radio ul li label").click(function(){
        $(".input-radio ul li").removeClass("active");
        $(this).parents("li").addClass("active");    
    });
 });

/*======================================
*================LOAD AJAX TOUR AND REPONSIVE===============
*========================================*/
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

        var num = $(this).attr("data-ajax");
            $.ajax({
              beforeSend : function(){
                $("#loadAjaxTour").append("<div class='loadding'><img src='images/main/loading.gif'/></div>")
              }, 
              url: 'cong_ty_du_lich_dong_duong_tour' + num + '.html',
              dataType: 'text',
              context: document.body
            }).done(function(value) {
                setTimeout(function() {
                    $("#loadAjaxTour").html(value);
                }, 1000);
            }); 
            if(num == 1){
              $(".viewall").empty();
              $(".viewall").append('<a href="tour-sap-khoi-hanh.php">Xem tất cả các tour</a>');
            } 
            else if(num == 2){
              $(".viewall").empty();
              $(".viewall").append('<a href="tour-di-nhieu.php">Xem tất cả các tour</a>');
            }
            else if(num == 3){
              $(".viewall").empty();
              $(".viewall").append('<a href="tour-giam-gia.php">Xem tất cả các tour</a>');
            }
        return false;
    });
 });

/*======================================
*================LOAD DATA===============
*========================================*/
$(document).ready(function() {
    $.ajax({
      url: 'http://localhost:8080/spr-data/tour/listTour',
      type: 'GET',
      dataType: 'json',
    })
    .done(function(data) {
        console.log(data);
        var html = '';
        var str1 ='';
        var str2 ='';
        var dem = 0;
        for (var i = data.length - 1; i >= 0; i--) {
            if(dem<6){
                Number.prototype.format = function(n, x) {
                  var re = '(\\d)(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
                  return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$1,');
                }
                var giaTour = data[i]['giaTourKMDto'],
                nn = 'abc',
                xx = 3;
                html = '<div class="item">'+
                            '<div class="i-images">'+
                                '<a href="chi-tiet-tour.php?tour_id=' + data[i]['idDto'] + '">'+
                                    '<img src="' + data[i]['tourImageDataDto'] + '" alt="' + data[i]['tenTourDto'] + '" />'+
                                '</a>'+
                            '</div>'+
                            '<div class="i-description">'+
                                '<div class="i-title">'+
                                    '<a href="chi-tiet-tour.php?tour_id=' + data[i]['idDto'] + '">'+ data[i]['tenTourDto'] + '</a>'+
                                '</div>'+
                                '<div class="fl">'+
                                    '<div class="i-content">'+
                                        'Giá 1 khách: <span>' + giaTour.format(nn, xx) + ' VNĐ</span>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="fr">'+
                                    '<a class="viewdetail" href="chi-tiet-tour.php?tour_id=' + data[i]['idDto'] + '">Xem chi tiết</a>'+
                                '</div>'+
                                '<div class="clear"></div>'+
                            '</div>'+
                        '</div>';
                if(dem<3){
                    str1 += html;
                    $('#loadData1').html(str1);
                }
                else if(dem >= 3){
                    str2 += html;
                    $('#loadData2').html(str2);
                }
            }
            dem++;
        }
    });
});
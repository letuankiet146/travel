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
              url: 'tour' + num + '.php',
              dataType: 'text',
              context: document.body
            }).done(function(value) {
                setTimeout(function() {
                    $("#loadAjaxTour").html(value);
                }, 1000);
            }); 
            if(num == 1){
              $(".viewall").empty();
              $(".viewall").append('<a href="index.php?page=tour-giam-gia">Xem tất cả các tour</a>');
            } 
            else if(num == 2){
              $(".viewall").empty();
              $(".viewall").append('<a href="index.php?page=tour-sap-khoi-hanh">Xem tất cả các tour</a>');
            }
            else if(num == 3){
              $(".viewall").empty();
              $(".viewall").append('<a href="index.php?page=tour-di-nhieu">Xem tất cả các tour</a>');
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
        var str1 ='';
        var str2 ='';
        var dem = 0;
        for (var i = data.length - 1; i >= 0; i--) {
            if(dem<6 && data[i]['giaTourDto'] > 0){
              // =====TINH SỐ NGÀY THỰC HIỆN TOUR
                var dateKH = data[i]['ngayKHDto'];
                var dateKT = data[i]['ngayKTDto'];
                dateKH = dateKH.split('/');
                dateKT = dateKT.split('/');
                dateKH = new Date(dateKH[2], dateKH[1], dateKH[0]);
                dateKT = new Date(dateKT[2], dateKT[1], dateKT[0]);
                dateKH_unixtime = parseInt(dateKH.getTime());
                dateKT_unixtime = parseInt(dateKT.getTime());
                var miliSecond = dateKT_unixtime - dateKH_unixtime;
                var ONE_DAY = 1000 * 60 * 60 * 24;
                var Days = miliSecond / ONE_DAY;

                Number.prototype.format = function(n, x) {
                  var re = '(\\d)(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
                  return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$1,');
                }
                nn = 'abc',
                xx = 3;
                var html = '';
                html += '<div class="item">'+
                            '<div class="i-images">'+
                                '<a href="index.php?page=chi-tiet-tour&tour_id=' + data[i]['idDto'] + '">'+
                                    '<img  src="' + data[i]['tourImageDataDto'] + '" alt="' + data[i]['tenTourDto'] + '" />'+
                                    '<div class="see_details">Xem chi tiết</div>'+
                                '</a>'+
                            '</div>'+
                            '<div class="i-description">'+
                                '<div class="i-title">'+
                                    '<a href="index.php?page=chi-tiet-tour&tour_id=' + data[i]['idDto'] + '" title="' + data[i]['tenTourDto'] + '">' + data[i]['tenTourDto'] + '</a>'+
                                '</div>'+
                                '<div class="i-content">'+
                                    '<span><i class="fa fa-calendar" aria-hidden="true"></i> ' + data[i]['ngayKHDto'] + ' </span>';
                                    if(data[i]['giaTourDto'] == 0){
                                        html += '<span></span>';
                                    }
                                    else{
                                        html += '<span>' + data[i]['giaTourDto'].format(nn, xx) + ' VNĐ</span>';
                                    }
                                html +='</div>'+
                                '<div class="i-content">'+
                                    '<div><i class="fa fa-clock-o" aria-hidden="true"></i> ' + Days + ' ngày </div>'+
                                    '<div>' + data[i]['giaTourKMDto'].format(nn, xx) + ' VNĐ</div>'+
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
                dem++;
            }
            
        }
        $(".item").hover(function() {
            $(this).find(".see_details").css('opacity', '1');
        }, function() {
            $(this).find(".see_details").css('opacity', '0');
        });
    });
});

// load
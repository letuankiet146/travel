<script type="text/javascript">
/*======================================
*================LOAD DATA===============
*========================================*/
$(document).ready(function() {
    $.ajax({
      url: 'http://103.47.194.91:8080/spr-data/tour/listTour',
      type: 'GET',
      dataType: 'json',
    })
    .done(function(data) {
        var str1 ='';
        var str2 ='';
        var dem = 0;
        for (var i = data.length - 1; i >= 0; i--) {
            if(dem<6 && data[i]['giaTourKMDto']==0){

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
                                    if(data[i]['giaTourKMDto'] == 0){
                                        html += '<span></span>';
                                    }
                                    else{
                                        html += '<span>' + data[i]['giaTourDto'].format(nn, xx) + ' VNĐ</span>';
                                    }
                                html +='</div>'+
                                '<div class="i-content">'+
                                    '<div><i class="fa fa-clock-o" aria-hidden="true"></i> ' + Days + ' ngày </div>';
                                    if(data[i]['giaTourKMDto'] == 0){
                                        html +='<div>' + data[i]['giaTourDto'].format(nn, xx) + ' VNĐ</div>';
                                    }
                                    else{
                                        html +='<div>' + data[i]['giaTourKMDto'].format(nn, xx) + ' VNĐ</div>';
                                    }
                                 html +='</div>'+
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
</script>
<div class="grid-tour">
    <div class="row-tour" id="loadData1"></div>
    <div class="row-tour" id="loadData2"></div>
    <div class="clear"></div>
</div>
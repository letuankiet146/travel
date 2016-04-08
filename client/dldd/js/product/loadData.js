$(document).ready(function() {
    var full_url = document.URL;
    var array_url = full_url.split('?tour_id=');
    var id = array_url[array_url.length -1];
    $.ajax({
        url: 'http://localhost:8080/spr-data/tour/listTour',
        type: 'GET',
        dataType: 'json',
    })
    .done(function(data) {
        $.each(data, function(i, val) {
            var info ='';
            var title = '';
            if(val.idDto == id){
                // =====load tên tour
                title = '<h1>' + val.tenTourDto + '</h1>';
                $('.titleL').html(title);

                // =====TINH SỐ NGÀY THỰC HIỆN TOUR
                var dateKH = val.ngayKHDto;
                var dateKT = val.ngayKTDto;
                dateKH = dateKH.split('/');
                dateKT = dateKT.split('/');
                dateKH = new Date(dateKH[2], dateKH[1], dateKH[0]);
                dateKT = new Date(dateKT[2], dateKT[1], dateKT[0]);
                dateKH_unixtime = parseInt(dateKH.getTime());
                dateKT_unixtime = parseInt(dateKT.getTime());
                var timeDifference = dateKT_unixtime - dateKH_unixtime;
                var ONE_DAY = 1000 * 60 * 60 * 24;
                var timeDifferenceInDays = timeDifference / ONE_DAY;

                //======== FORMAT MONEY
                Number.prototype.format = function(n, x) {
                  var re = '(\\d)(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
                  return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$1,');
                }
                nn = 'abc';
                xx = 3;

                // =====load info tour
                info = '<div class="detail_row">'+
                            '<div class="label1">Đánh giá</div>'+
                                '<div class="grid_info">'+
                                '<div class="star">'+
                                    '<ul>'+
                                        '<li class="active"></li>'+
                                        '<li class="active"></li>'+
                                        '<li class="active"></li>'+
                                        '<li class="active"></li>'+
                                        '<li></li>'+
                                    '</ul>'+
                                '</div>'+
                            '</div>'+
                            '<div class="clear"></div>'+
                        '</div>'+
                        '<div class="detail_row">'+
                            '<div class="label1">Mã tour</div>'+
                            '<div class="grid_info">' + val.idTourDto + '</div>'+
                            '<div class="clear"></div>'+
                        '</div>'+
                        '<div class="detail_row">'+
                            '<div class="label1">Ngày khởi hành</div>'+
                            '<div class="grid_info">' + val.ngayKHDto + '</div>'+
                            '<div class="clear"></div>'+
                        '</div>'+
                        '<div class="detail_row">'+
                            '<div class="label1">Thời gian</div>'+
                            '<div class="grid_info">' + timeDifferenceInDays + ' ngày/' + (timeDifferenceInDays-1) + ' đêm</div>'+
                            '<div class="clear"></div>'+
                        '</div>'+
                        '<div class="detail_row">'+
                            '<div class="label1">Khởi hành từ</div>'+
                            '<div class="grid_info">' + val.fromPlaceDto.fromPlaceName + '</div>'+
                            '<div class="clear"></div>'+
                        '</div>'+
                        '<div class="detail_row">'+
                            '<div class="label1">Số chỗ còn nhận</div>'+
                            '<div class="grid_info">' + val.soChoDto + '</div>'+
                            '<div class="clear"></div>'+
                        '</div>'+
                        '<div class="detail_row">'+
                            '<div class="label1">Giá</div>'+
                            '<div class="grid_info price">' + val.giaTourDto.format(nn, xx) + ' VNĐ</div>'+
                            '<div class="clear"></div>'+
                        '</div>'+
                        '<div class="detail_row">'+
                            '<div class="label1">Giá khuyến mãi</div>'+
                            '<div class="grid_info price-sale">' + val.giaTourKMDto.format(nn, xx) + ' VNĐ</div>'+
                            '<div class="clear"></div>'+
                        '</div>'+
                        '<div class="button-cart">'+
                            '<a href="cong_ty_du_lich_dong_duong_dat_tour_1170_02.html">Đặt tour ngay</a>'+
                        '</div>';
                $('.detail_grid').html(info);

                // =====load thông tin chi tiết tour
                $('#infoDto').html(val.infoDto);
            }
        });
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
});
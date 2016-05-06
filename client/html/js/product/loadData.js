 /*==========SLIDER PRODUCT BOTTOM=========*/
$(document).ready(function() {
    var full_url = document.URL;
    var array_url = full_url.split('&tour_id=');
    var id = array_url[array_url.length -1];
    var count = id.split("#").length;
    if(count == 1){
        id = id;
    }
    else{
        var num = id.lastIndexOf("#");
        id = id.slice(0, num);
    }

    $.ajax({
        url: 'http://103.47.194.91:8080/spr-data/tour/listTour',
        type: 'GET',
        dataType: 'json',
    })
    .done(function(data) {
        $.each(data, function(i, val) {
            var info ='';
            var title = '';
            var schedule = '';
            var arrivePlaceId = '';
            var info_booking = '';
            var check = '';
            if(val.idDto == id){
                // =====load tên tour
                title = '<h1>' + val.tenTourDto + '</h1>';
                $('.n-transform').html(title);

                // =====TINH SỐ NGÀY THỰC HIỆN TOUR
                var dateKH = val.ngayKHDto;
                var dateKT = val.ngayKTDto;
                dateKH = dateKH.split('/');
                dateKT = dateKT.split('/');
                dateKH = new Date(dateKH[2], dateKH[1], dateKH[0]);
                dateKT = new Date(dateKT[2], dateKT[1], dateKT[0]);
                dateKH_unixtime = parseInt(dateKH.getTime());
                dateKT_unixtime = parseInt(dateKT.getTime());
                var miliSecond = dateKT_unixtime - dateKH_unixtime;
                var ONE_DAY = 1000 * 60 * 60 * 24;
                var Days = miliSecond / ONE_DAY;

                //======== FORMAT MONEY
                Number.prototype.format = function(n, x) {
                  var re = '(\\d)(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
                  return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$1,');
                }
                nn = 'abc';
                xx = 3;

                // =====load info tour
                info =  '<div class="detail_row">'+
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
                            '<div class="grid_info">' + Days + ' ngày</div>'+
                            '<div class="clear"></div>'+
                        '</div>'+
                        '<div class="detail_row">'+
                            '<div class="label1">Khởi hành từ</div>'+
                            '<div class="grid_info">' + val.fromPlaceDto.fromPlaceName + '</div>'+
                            '<div class="clear"></div>'+
                        '</div>'+
                        '<div class="detail_row">'+
                            '<div class="label1">Số chỗ còn nhận</div>'+
                            '<div class="grid_info">' + (val.soChoDto - val.tourBookedDto) + '</div>'+
                            '<div class="clear"></div>'+
                        '</div>'+
                        '<div class="detail_row">'+
                            '<div class="label1">Giá</div>';
                            if(val.giaTourKMDto > 0){
                                info +='<div class="grid_info price">' + val.giaTourDto.format(nn, xx) + ' VNĐ</div>';
                            }
                            else{
                                info +='<div class="grid_info price"></div>';
                            }
                            info +='<div class="clear"></div>'+
                        '</div>'+
                        '<div class="detail_row">'+
                            '<div class="label1">Giá khuyến mãi</div>';
                            if(val.giaTourKMDto > 0){
                                info +='<div class="grid_info price-sale">' + val.giaTourKMDto.format(nn, xx) + ' VNĐ</div>';
                            }
                            else{
                                info +='<div class="grid_info price-sale">' + val.giaTourDto.format(nn, xx) + ' VNĐ</div>';
                            }
                            info +='<div class="clear"></div>'+
                        '</div>'+
                        '<div class="button-cart">'+
                            '<a href="index.php?page=dat-tour&tour_id=' + val.idDto + '">Đặt tour ngay</a>'+
                        '</div>';
                $('.detail_grid').html(info);

                // =====load thông tin chuong trinh tour
                $('#infoDto').html(val.infoDto);

                // =====load thông tin lịch trính
                schedule = '<div class="row_tr">'+
                                '<strong>Thông tin vận chuyển</strong>'+
                            '</div>'+
                            '<div class="row_tr">'+
                                '<div class="col_td">'+
                                    '<strong>Loại phương tiện</strong>'+
                                    '<p>Máy bay</p>'+
                                '</div>'+
                                '<div class="col_td">'+
                                    '<strong>Số xe (mã chuyến bay)</strong>'+
                                    '<p>VJ122</p>'+
                                '</div>'+
                                '<div class="col_td">'+
                                    '<strong>Người vận chuyển</strong>'+
                                    '<p>VietJec</p>'+
                                '</div>'+
                                '<div class="clear"></div>'+
                            '</div>'+
                            '<div class="row_tr">'+
                                '<strong>Thông tin lịch trình</strong>'+
                            '</div>'+
                            '<div class="row_tr">'+
                                '<div class="col_td">'+
                                    '<span><strong>Ngày đi:</strong> &nbsp;16/04/2016 06:30</span>'+
                                '</div>'+
                                '<div class="col_td">'+
                                    '<span>đến 16/04/2016 08:30</span>'+
                                '</div>'+
                                '<div class="col_td">'+
                                    '<span>Chuyến bay: VJ122</span>'+
                                '</div>'+
                                '<div class="col_td">'+
                                    '<span><strong>Ngày về:</strong> 19/04/2016 19:30</span>'+
                                '</div>'+
                                '<div class="col_td">'+
                                    '<span>đến 19/04/2016 21:30</span>'+
                                '</div>'+
                                '<div class="col_td">'+
                                    '<span>Chuyến bay: VJ122</span>'+
                                '</div>'+
                                '<div class="clear"></div>'+
                            '</div>'+
                            '<div class="row_tr">'+
                                '<strong>Thông tin khách sạn</strong>'+
                            '</div>'+
                            '<div class="row_tr">'+
                                '<p>Đang cập nhật</p>'+
                            '</div>'+
                            '<div class="row_tr">'+
                                '<strong>Thông tin hướng dẫn viên</strong>'+
                            '</div>'+
                            '<div class="row_tr">'+
                                '<div class="col_td">'+
                                    '<p><strong>Họ tên</strong></p>'+
                                    '<p>CHỜ BÁO SAU</p>'+
                                '</div>'+
                                '<div class="col_td">'+
                                    '<p><strong>Địa chỉ</strong></p>'+
                                    '<p> 107 Nguyễn Thái Sơn,Q.Gò Vấp</p>'+
                                '</div>'+
                                '<div class="col_td">'+
                                    '<strong>Điện thoại</strong>'+
                                '</div>'+
                                '<div class="clear"></div>'+
                            '</div>'+
                            '<div class="row_tr">'+
                                '<strong>Bảng giá tour theo độ tuổi</strong>'+
                            '</div>'+
                            '<div class="row_tr">'+
                                '<div class="col_tr">'+
                                    '<strong>Người lớn (Từ 12 tuổi trở lên)</strong>'+
                                    '<strong>6,900,000<sup>đ</sup></strong>'+
                                    '<div class="clear"></div>'+
                                '</div>'+
                                '<div class="col_tr">'+
                                    '<strong>Trẻ nhỏ (Từ 2 tuổi đến 11 tuổi)</strong>'+
                                    '<strong>6,900,000<sup>đ</sup></strong>'+
                                    '<div class="clear"></div>'+
                                '</div>'+
                                '<div class="col_tr">'+
                                    '<strong>Em bé (Dưới 2 tuổi)</strong>'+
                                    '<strong>6,900,000<sup>đ</sup></strong>'+
                                    '<div class="clear"></div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="clear"></div>';
                $("#schedule").html(schedule);

                // =====load title lien quan 
                arrivePlaceId = val.arrivePlaceDto.arrivePlaceId;
                $('#tl_orther').html('Các tour du lịch ' + val.arrivePlaceDto.arrivePlaceName +' khác');

                info_booking =  '<div class="title">Thông tin tour</div>'+
                                '<div class="row-input">'+
                                    '<strong style=" color:#F00;">' + val.tenTourDto + '</strong>'+
                                '</div>'+
                                '<div class="row-input"><span>Mã tour</span><strong>' + val.idTourDto + '</strong></div>';
                                if(val.giaTourKMDto == 0){
                                    info_booking +='<div class="row-input"><span>Giá tour</span><strong>' + val.giaTourDto.format(nn, xx) + '<sup>đ</sup></strong></div>';
                                }else{
                                    info_booking +='<div class="row-input"><span>Giá tour</span><strong>' + val.giaTourKMDto.format(nn, xx) + '<sup>đ</sup></strong></div>'; 
                                }
                                info_booking +='<div class="row-input"><span>Nơi khỏi hành</span><strong>' + val.fromPlaceDto.fromPlaceName + '</strong></div>'+
                                '<div class="row-input"><span>Ngày khỏi hành</span><strong>' + val.ngayKHDto + '</strong></div>'+
                                '<div class="row-input"><span>Thời gian</span><strong>' + Days + ' ngày</strong></div>'+
                                '<div class="row-input"><span>Số chỗ nhận</span><strong>' + (val.soChoDto - val.tourBookedDto) + '</strong></div>'+
                                '<div class="title">Điều kiện bắt buộc khi đăng ký online</div>'+
                                        '<div class="row-input">'+
                                            '<div class="note">'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="row-input">'+
                                            '<input type="checkbox" name="checkbox" id="checkbox" value="" /> Tôi đồng ý với các điều kiện trên'+
                                        '</div>';
                $("#oder_left").html(info_booking);
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
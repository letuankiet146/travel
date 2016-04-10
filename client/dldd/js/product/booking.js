/*==========Kiểm tra input=========*/
$(document).ready(function () {
    $("#vnt-order").validate({
        rules: {
            name: {required: true},
            email: {required: true,email: true},
            phone: {required: true,number: true, minlength:10,maxlength:11},
            address: {required: true}
        },
        messages: {
            name: {required: "Thông tin bắt buộc"},
            email: {required: "Thông tin bắt buộc", email: "Giá trị email không đúng"},
            phone: {required: "Thông tin bắt buộc", number: "SDT phải là số",minlength: "SDT không đúng",maxlength: "SDT không đúng" },
            address: {required: "Thông tin bắt buộc"}
        },
        // thực hiện sau khi kiểm tra đúng
        submitHandler: function() {
            if($("#checkbox").is(':checked')){
                if($("#thanhtoan input").is(':checked')){
                    load_check();
                    $("#vnt-order").append('<div class="gif"><img src="admin/images/preloader.GIF" /></div><div class="f_overlay"></div>');
                    setTimeout(function() {
                        $("#vnt-order").fadeOut('slow');
                        $("#check").fadeIn('slow');
                        $("div").remove('.gif, .f_overlay');
                    }, 2000);
                }
                else{
                    alert("Bạn chưa chọn hình thức thanh toán");
                    document.getElementById("thanhtoan").focus();
                }
            }
            else{
                alert("Bạn chưa đồng ý điều kiện đăng đặt tour online!!!");
                document.getElementById("checkbox").focus();
            }
        }
    });
});

function load_check(){
    var code = $("#code").val();
    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var address = $("#address").val();
    var total = $("#total").val();
    var nguoilon = $("#nguoilon").val();
    var duoi12 = $("#duoi12").val();
    var duoi2 = $("#duoi2").val();
    var content = $("#t-content").val();

    var full_url = document.URL;
    var array_url = full_url.split('?tour_id=');
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
        url: 'http://localhost:8080/spr-data/tour/listTour',
        type: 'GET',
        dataType: 'json',
    })
    .done(function(data) {
        $.each(data, function(i, val) {
            var check = '';
            if(val.idDto == id){

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

                var total_money = val.giaTourKMDto;
                total_money = (total_money + total_money*0.5);

                //======== FORMAT MONEY
                Number.prototype.format = function(n, x) {
                  var re = '(\\d)(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
                  return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$1,');
                }
                nn = 'abc';
                xx = 3;

                check = '<div class="oder-left">'+
                            '<div class="title">Thông tin đơn đặt tour</div>'+
                            '<div class="row-input"> Mã đơn hàng : <span>' + code + '</span></div>'+
                            '<div class="row-input">Tên tour : <span>' + val.tenTourDto + '</span></div>'+
                            '<div class="row-input">Mã tour : <span>' + val.idTourDto + '</span></div>'+
                            '<div class="row-input">Số chỗ đặt : <span>' + total + ' ( Ngươi lớn: ' + nguoilon + ',  Trẻ nhỏ: ' + duoi12 + ',  Em bé: ' + duoi2 + ')</span></div>'+
                            '<div class="row-input">Nơi khỏi hành : <span>' + val.fromPlaceDto.fromPlaceName + '</span></div>'+
                            '<div class="row-input">Ngày khỏi hành : <span>' + val.ngayKHDto + '</span></div>'+
                            '<div class="row-input">Thời gian : <span>' + Days + ' ngày</span></div>'+
                            '<div class="row-input">Tổng giá trị : <span>' + total_money.format(nn, xx) + '<sup>đ</sup></span></div>'+
                        '</div>'+
                        '<div class="oder-left">'+
                            '<div class="title">Thông tin liên lạc</div>'+
                            '<div class="row-input">Họ và tên : <span>' + name + '</span></div>'+
                            '<div class="row-input">Email : <span>' + email + '</span></div>'+
                            '<div class="row-input">Điện thoại : <span>' + phone + '</span></div>'+
                            '<div class="row-input">Địa chỉ : <span>' + address + '</span></div>'+
                            '<div class="row-input">Yêu cầu thêm : <span>' + content + '</span></div>'+
                        '</div>'+
                        '<div class="clear"></div>'+
                        '<div class="row-input">'+
                            '<div class="div-input">'+
                                '<a href="https://www.nganluong.vn/button_payment.php?receiver=ptthao13@gmail.com&product_name=' + code + '&price=2000&return_url=index.php&comments=' + content + '">'+
                                    '<button type="submit" name="" id="" class="btn reset" value=""><span>Thanh toán</span></button>'+
                                '</a>'+
                                '<button type="submit" name="do_edit" id="do_edit" onclick="do_edit()" class="btn submit" value=""><span>Chỉnh sửa</span></button>'+
                            '</div>'+
                            '<div class="clear"></div>'+
                       '</div>';
                $("#check").html(check);
            }
        });
    });
}
/*==========COUNT quantity=========*/
function count_number(){
    
    var nguoilon = parseInt($("#nguoilon").val());
    var duoi12 = parseInt($("#duoi12").val()); 
    var duoi2 = parseInt($("#duoi2").val());
    
    if(isNaN(nguoilon) || nguoilon < 1){
        alert("Dữ liệu nhập vào không hợp lệ");
        $("#nguoilon").val(1);
        nguoilon = parseInt($("#nguoilon").val());
    }
    else if(isNaN(duoi12)){
        alert("Dữ liệu nhập vào không hợp lệ");
        $("#duoi12").val(1);
        duoi12 = parseInt($("#duoi12").val()); 
    }
    else if(isNaN(duoi2)){
        alert("Dữ liệu nhập vào không hợp lệ");
        $("#duoi2").val(1);
        nguoilon = parseInt($("#nguoilon").val());
    }
    var total = (nguoilon + duoi12 + duoi2);
    $("#total").val(total);
}
/*==========INPUT RADIO thanh toán show/hide=========*/
$(document).ready(function() {
    $("#thanhtoan input").click(function(event) {
    
        if($('#tructuyen').is(':checked')) {
            $('.row-input ul').css('display', 'none');
            $("#tructuyen").closest('.row-input').find('ul').css('display', 'block');
        }
        else if($('#tructiep').is(':checked')) {
            $('.row-input ul').css('display', 'none');
            $("#tructiep").closest('.row-input').find('ul').css('display', 'block');
        }
        else if($('#chuyenkhoan').is(':checked')) {
            $('.row-input ul').css('display', 'none');
        }
    });
});
// ===========do_edit=====
function do_edit(){
    $("#check").append('<div class="gif"><img src="admin/images/preloader.GIF" /></div><div class="f_overlay"></div>');
    setTimeout(function() {
        $("#vnt-order").fadeIn('slow');
        $("#check").fadeOut('slow');
    }, 2000);
}
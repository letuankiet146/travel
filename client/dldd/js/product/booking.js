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
                        $("#h1").html("Xác nhận đơn đặt tour");
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
    var codekh = $("#codekh").val();
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
        url: 'http://localhost:8080/spr-data/tour/listTour',
        type: 'GET',
        dataType: 'json',
    })
    .done(function(data) {
        $.each(data, function(i, val) {
            var check = '';
            var h1 = '';
            if(val.idDto == id){
                // Tính ngày thực hiện tour
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

                // Tong giá trị đơn hàng
                var total_money = val.giaTourKMDto;
                total_money = (total_money + total_money*0.5);

                // Dinh dạnh datetime và tính dateline
                var t = new Date();
                var d = (t.getDate() < 10) ?  '0'+t.getDate() : t.getDate();
                var m = ((t.getMonth() + 1) < 10 ) ? '0'+(t.getMonth()+1) : (t.getMonth()+1);
                var y = t.getFullYear();
                var h = (t.getHours() < 10) ? '0'+t.getHours() : t.getHours();
                var p = (t.getMinutes() < 10) ? '0'+t.getMinutes() : t.getMinutes();
                var s = (t.getSeconds() < 10) ? '0'+t.getSeconds() : t.getSeconds();
                today = d +'/'+m+'/'+y+' '+h+':'+p+':'+s;

                var dd = d+1;
                var mm = m+1;
                var dateline = '';
                if(dd > 30){
                    if(mm > 12){
                        d=01; m=01; y=y+1;
                        dateline = d +'/'+m+'/'+y+' '+h+':'+p+':'+s;
                    }
                    else{
                        d=01; m=m+1;
                        dateline = d +'/'+m+'/'+y+' '+h+':'+p+':'+s;
                    }
                }
                else{
                    d=d+1;
                    dateline = d +'/'+m+'/'+y+' '+h+':'+p+':'+s; 
                }
                

                //======== FORMAT MONEY
                Number.prototype.format = function(n, x) {
                    var re = '(\\d)(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
                    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$1,');
                }
                nn = 'abc';
                xx = 3;
                
                check = '<div class="oder-left">'+
                            '<div class="title">Phiếu xác nhân đơn đặt tour</div>'+
                            '<div class="row-input"><strong style=" color:#F00;">' + val.tenTourDto + '</strong></div>'+
                            '<div class="row-input"><span>Mã tour</span><strong>' + val.idTourDto + '</strong></div>'+
                            '<div class="row-input"><span>Nơi khỏi hành </span><strong>' + val.fromPlaceDto.fromPlaceName + '</strong></div>'+
                            '<div class="row-input"><span>Ngày đi </span><strong>' + val.ngayKHDto + '</strong></div>'+
                            '<div class="row-input"><span>Ngày về </span><strong>' + val.ngayKTDto + '</strong></div>'+
                        '</div>'+
                        '<div class="oder-left">'+
                            '<div class="title">Thông tin liên lạc</div>'+
                            '<div class="row-input"><span>Họ và tên </span><strong>' + name + '</strong></div>'+
                            '<div class="row-input"><span>Email </span><strong>' + email + '</strong></div>'+
                            '<div class="row-input"><span>Điện thoại </span><strong>' + phone + '</strong></div>'+
                            '<div class="row-input"><span>Địa chỉ </span><strong>' + address + '</strong></div>'+
                            '<div class="row-input"><span>Ghi chú </span><strong>' + content + '</strong></div>'+
                            '<div class="row-input"><span>Tổng số khách </span><strong>' + total + ' (Người lớn: ' + nguoilon + ', Trẻ em: ' + duoi12 + ', Trẻ nhỏ: ' + duoi2 + ')</strong></div>'+
                        '</div>'+
                        '<div class="clear"></div>'+
                        '<div class="title">Chi tiết đơn đặt tour</div>'+
                        '<div class="row-input"><span>Mã đơn đặt tour </span><strong>' + code + '</strong></div>'+
                        '<div class="row-input"><em style="margin-left: 165px">Quý khách vui lòng nhớ mã đơn hàng để thuận tiện cho giao dịch sau này</em></div>'+
                        '<div class="row-input"><span>Trị giá đơn đặt tour </span><strong>' + total_money.format(nn,xx) + '<sup>đ</sup></strong></div>'+
                        '<div class="row-input"><span>Ngày đăng ký </span><strong>' + today + ' (Theo giờ Việt Nam)</strong></div>'+
                        '<div class="row-input"><span>Hình thức thanh toán </span><strong>Thanh toán online-Thanh toán đảm bảo qua Ngân Lượng</strong></div>'+
                        '<div class="row-input"><span>Thời hạn thanh toán </span><strong>' + dateline + ' (Theo giờ Việt Nam)</strong></div>'+
                        '<div class="row-input"><em style="margin-left: 165px">Nếu quá thời gian trên mà quý khách chưa thanh toán, DLDD sẽ hủy đơn đặt tour này</em></div>'+
                        '<div class="clear"></div>'+
                        '<div class="row-input">'+
                            '<div class="div-input">'+
                                '<button type="submit" name="" id="btn_thanhtoan" class="btn reset" value=""><span>Thanh toán</span></button>'+
                                '<button type="submit" name="do_edit" id="do_edit" onclick="do_edit()" class="btn submit" value=""><span>Chỉnh sửa</span></button>'+
                            '</div>'+
                            '<div class="clear"></div>'+
                        '</div>';
                 $("#check").html(check);
                 $(document).ready(function() {
                     $("#btn_thanhtoan").click(function(event) {
                        $(".vnt-order").append('<div class="gif"><img src="admin/images/preloader.GIF" /></div><div class="f_overlay"></div>');
                        var mydata = {
                            "formOrderTourCodeDto": code,
                            "formOrderTourIdDto": val.idDto,
                            "formOrderCustomerDto": {
                              "customerCode": codekh,
                              "customerNameDto": name,
                              "customerPhoneDto": phone,
                              "customerEmailDto": email,
                              "customerAddressDto": address,
                              "customerDeleteDateDto": null,
                              "customerGroupDto": 7
                            },
                            "formOrderQuantityAdultsDto": nguoilon,
                            "formOrderQuantityJuvenileDto": duoi12,
                            "formOrderQuantityChildDto": duoi2,
                            "formOrderIsPayDto": 4,
                            "formOrderQuantityOtherRequireDto": content 
                        };
                        console.log(mydata);
                          $.ajax({
                                url: 'http://localhost:8080/spr-data/orderTour',
                                type: 'POST',
                                dataType: 'json',
                                contentType: 'application/json',
                                data: JSON.stringify(mydata),
                            })
                            .done(function(data) {
                               console.log("dddd");
                            })
                            .fail(function() {
                                
                            })
                            .always(function() {
                                window.location.href = "https://www.nganluong.vn/button_payment.php?receiver=ptthao13@gmail.com&product_name=" + code + "&price=2000&return_url=http://localhost/dldd/index.php?page=thanh-toan&comments=" + content + "";
                            });
                              
                     });
                 });
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
        $("#h1").html("Nhập thông tin");
        $("#check").fadeOut('slow');
    }, 2000);
}

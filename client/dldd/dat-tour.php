<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Trang chủ</title>
    <!-- DÙNG CHUNG CHO TÒAN SITE -->    
    <link href="style/font/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="js/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />  
    <link href="js/mmenu/css/jquery.mmenu.all.css" rel="stylesheet" type="text/css" />     
    <link href="style/screen.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-migrate.min.js"></script>
    <script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mmenu/js/jquery.mmenu.min.all.js"></script>
    <script type="text/javascript" src="js/core.js"></script>
    <script type="text/javascript" src="js/style.js"></script>
    <link rel="stylesheet" href="js/nivo-slider/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="js/nivo-slider/themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="js/nivo-slider/themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="js/nivo-slider/themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="js/nivo-slider/nivo-slider.css" type="text/css" media="screen" />
    <script type="text/javascript" src="js/nivo-slider/jquery.nivo.slider.js"></script>
    <!--===MODULE MAIN==-->
    <!--===DatePicker==-->
    <link rel="stylesheet" href="js/datepicker/datepicker.css"/>
    <script src="js/datepicker/datepicker.js"></script>
    <!--===DatePicker==-->

    <link href="style/product.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/product/loadData.js"></script>
    <script type="text/javascript" src="js/product/booking.js"></script>
    <script type="text/javascript">
        $(function() {
            $( "#dateFrom" ).datepicker({
              showOn: "button",
              buttonImage: "js/datepicker/images/icon-picker.png",
              buttonImageOnly: true,
              buttonText: "Select date"
            });
            $( "#dateTo" ).datepicker({
              showOn: "button",
              buttonImage: "js/datepicker/images/icon-picker.png",
              buttonImageOnly: true,
              buttonText: "Select date"
            });
        });
    </script>

    <!--===MODULE MAIN==-->
</head>

<body>
<?php
    include('admin/connectDB.php');
    include('include/tour/function.php');
?>
<div id="vnt-wrapper">
	<div id="vnt-container">
        <!--=== BEGIN: HEADER ===-->
    	<div id="vnt-header">
            <div class="header-top">
                <div class="wrapper">
                    <div class="logo">
                        <h1>
                            <a href="index.php">
                                <img src="images/logo.png" alt="Du lịch giải trí Đông Dương" />
                            </a>
                        </h1>
                    </div>
                    <div class="banner">
                        <div class="sologan">
                            <img src="images/slogan.png" alt="Du lịch giải trí Đông Dương" />
                        </div>
                    </div>    
                    <div class="header-tool">
                        <div class="social">
                            <ul>
                                <li><a href="#"><img src="images/weblink/facebook.png" /></a></li>
                                <li><a href="#"><img src="images/weblink/google.png" /></a></li>
                                <li><a href="#"><img src="images/weblink/twitter.png" /></a></li>
                                <li><a href="#"><img src="images/weblink/youtube.png" /></a></li>
                                <li><a href="#"><img src="images/weblink/instargam.png" /></a></li>
                            </ul>
                        </div>
                        <div class="hotline">
                            <span>(08) 6291 2468</span>
                        </div>
                    </div>   
                    <div class="clear"></div>
                </div>
            </div>
            <!--=== BEGIN: MENUTOP ===-->
            <div id="vnt-menutop">
                <div class="wrapper">
                    <div class="menutop">
                      	<ul>
                            <li>
                                <a class="hover_effect_menu" href="index.php"><span class="hover_text">Trang chủ</span></a>
                            </li><li>
                                <a class="hover_effect_menu" href="cong_ty_du_lich_dong_duong_gioi_thieu_1170_02.html"><span class="hover_text">Giới thiệu</span></a>
                            </li><li>
                                <a class="hover_effect_menu" href="tour-noi-dia.php"><span class="hover_text">Tour nội địa</span></a>
                            </li><li>
                                <a class="hover_effect_menu" href="tour-quoc-te.php"><span class="hover_text">Tour quốc tế</span></a>
                            </li><li>
                                <a class="hover_effect_menu" href="cong_ty_du_lich_dong_duong_cam_nang_du_lich_1170_02.html"><span class="hover_text">Cẩm nang du lịch</span></a>
                            </li><li>
                                <a class="hover_effect_menu" href="cong_ty_du_lich_dong_duong_lien_he_1170_02.html"><span class="hover_text">Liên hệ</span></a>
                            </li>   
                        </ul>
                    </div>
                    <div class="menu-tool">
                        <!--===FORMSEARCH==-->
                        <div class="formSearch">
                            <form id="formSearch" name="formSearch" method="POST" action="#" class="box_search">
                                <div class="input-group">
                                    <input name="keyword" id="keyword" type="text" class="text_search form-control" placeholder="Tìm kiếm" value="" />
                                    <span class="input-group-btn">
                                        <button id="btn-search" name="btn-search" type="submit" class="btn" value="" ><span >Search</span></button>
                                    </span>
                                <input name="do_search" value="1" type="hidden"/>
                                </div>
                            </form>
                        </div>
                        <!--===FORMSEARCH==-->
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <!--=== END: MENUTOP ===-->
            <!--=== BEGIN: MMENU ===-->
            <div class="vnt-mmenu">
                <div class="wrapper">
                    <div class="mmenu"><a href="#menu">Tour nội địa</a></div>
                </div>
            </div>
            <!--=== END: MMENU ===-->
        </div>
        <!--=== END: HEADER ===-->
        <!--=== BEGIN: CONTENT ===-->
      	<div id="vnt-content">
            <!--=== BEGIN: BANNER ===-->
            <div class="vnt-banner">
                <div id="vnt-banner">
                    <img src="images/news/banner.jpg" alt="#" />
                    <img src="images/news/banner.jpg" alt="#" />
                    <img src="images/news/banner.jpg" alt="#" />
                </div>
            </div>
            <!--=== END: BANNER ===-->
            <div class="wrapper">
                <!--=== BEGIN: BREADCRUMB ===-->
                <div id="vnt-navation" class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                    <div class="navation">
                        <ul>
                            <li class="home"><a href="index.php">Trang chủ</a></li>
                            <li><a href="tour-noi-dia.php">Tour nội địa</a></li>
                            <li>Đặt tour</li>
                        </ul>
                    </div>
                </div>
                <!--=== END: BREADCRUMB ===-->
                <div class="box_mid">
                    <div class="mid-title">
                        <div class="titleL">
                            <h1>Tour nội địa</h1>
                        </div>
                        <div class="titleR"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="mid-content">
                        <div class="vnt-order">
                            <form id="vnt-order" action="#" method="POST">
                                <div class="wrapper">
                                    <input type="hidden" name="code" id="code" value="MADDT<?php madonhang(); ?>" placeholder="">
                                    <div class="oder-left" id="oder_left"></div>
                                    <div class="oder-left">
                                        <div class="title">Thông tin liên hệ</div>
                                        <div class="row-input">
                                            <label for="name">Họ và tên <span>(*)</span></label>
                                            <div class="div-input">
                                                <input type="text" name="name" id="name" class="form-control" />
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="row-input">
                                            <label for="email">Email <span>(*)</span></label>
                                            <div class="div-input">
                                                <input type="text" name="email" id="email" class="form-control" />
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="row-input">
                                            <label for="phone">Điện thoại <span>(*)</span></label>
                                            <div class="div-input">
                                                <input type="text" name="phone" id="phone" class="form-control" />
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="row-input">
                                            <label for="address">Địa chỉ <span>(*)</span></label>
                                            <div class="div-input">
                                                <input type="text" name="address" id="address" class="form-control" />
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="row-input">
                                            <label>Số lượng người</label>
                                            <div class="div-input">
                                                <table>
                                                    <tr>
                                                        <td><label for="total">Tổng số khách</label>
                                                        <input type="text" name="total" id="total" class="form-control" value="1" disabled  /></td>
                                                        <td><label for="nguoilon">Người lớn <span>(*)</span></label>
                                                        <input type="text" name="nguoilon" id="nguoilon" class="form-control" value="1" onchange="count_number();" /></td>
                                                        <td><label for="duoi12">Dưới 12 tuổi</label>
                                                        <input type="text" name="duoi12" id="duoi12" class="form-control" value="0" onchange="count_number();" /></td>
                                                        <td><label for="duoi2">Dưới 2 tuổi</label>
                                                        <input type="text" name="duoi2" id="duoi2" class="form-control" value="0" onchange="count_number();" /></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="row-input">
                                            <label for="t-content">Yêu cầu thêm</label>
                                            <div class="div-input">
                                                <textarea id="t-content" name="content" class="form-control" rows="2">
                                                </textarea>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="oder-left" id="thanhtoan">
                                        <div class="title">Hình thức thanh toán</div>
                                        <div class="row-input">
                                            <label style="cursor: pointer;"><input type="radio" name="thanhtoan" id="tructiep" onclick="" value="1" /> Thanh toán trực tiếp</label>
                                            <ul>
                                                <li>Vui lòng đến chi nhánh gần nhất và thanh toán trong vòng 3 ngày từ ngày đặt tour</li>
                                            </ul>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="row-input">
                                            <label style="cursor: pointer;"><input type="radio" name="thanhtoan" id="tructuyen" onclick="" /> Thanh toán trực tuyến</label>
                                            <ul>
                                                <li><label style="cursor: pointer;"><input type="radio" name="thanhtoan" id="nganluong" value="2" /> Bằng tài khoản Ngân Lượng</label></li>
                                                <li><label style="cursor: pointer;"><input type="radio" name="thanhtoan" id="baokim" value="3" /> Bằng tài khoản Bảo Kim</label></li>
                                            </ul>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="row-input">
                                            <label style="cursor: pointer;"><input type="radio" name="thanhtoan" id="chuyenkhoan" onclick="" value="4" /> Thanh toán chuyển khoản</label>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="row-input">
                                            <div class="div-input">
                                                <button type="submit" name="do_submit" id="do_submit" class="btn submit" value=""><span>Đặt tour</span></button>
                                                <button type="reset" name="reset" id="reset" class="btn reset" value=""><span>Nhập lại</span></button>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </form>
                            <div id="check">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=== END: CONTENT ===-->
        <!--=== BEGIN: FOOTER ===-->
        <div id="vnt-footer">
        	<div class="top-footer">
                <div class="wrapper">
                    <div class="vnt-wrapper">
                        <div class="fl sendMail">
                            <div class="title">Đăng ký nhận tin</div>
                            <form id="sendMail" method="POST" action="#">
                                <div class="input-group">
                                    <input type="text" id="i_sendmail" name="i_sendmail" class="form-control" placeholder="Email của bạn" />
                                    <span class="input-group-btn">
                                        <button type="submit" name="do_submit" id="do_submit" class="btn" value=""><span>Đăng ký</span></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div class="fr">
                            <div class="social">
                                <ul>
                                    <li><a href="#"><img src="images/weblink/icon_share.png" /></a></li>
                                    <li><a href="#"><img src="images/weblink/icon-like.png" /></a></li>
                                    <li><a href="#"><img src="images/weblink/icon-gplug.png" /></a></li>
                                </ul>
                            </div>
                            <div class="social rotate">
                                <ul>
                                    <li><a href="#"><img src="images/weblink/f_facebook.png" /></a></li>
                                    <li><a href="#"><img src="images/weblink/f_google.png" /></a></li>
                                    <li><a href="#"><img src="images/weblink/f_twitter.png" /></a></li>
                                    <li><a href="#"><img src="images/weblink/f_youtube.png" /></a></li>
                                    <li><a href="#"><img src="images/weblink/f_instargam.png" /></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="wrapper">
                    <div class="fl">
                        <p class="DongDuong">Copyright © 2015 <span>CÔNG TY TNHH DỊCH VỤ DU LỊCH GIẢI TRÍ ĐÔNG DƯƠNG</span></p>
                        <p>
                           <a href="http://www.thietkeweb.com" target="_blank" title="thiet ke web" rel="dofollow" class="thietkeweb">Thiết kế web :</a> 
                           <a href="http://www.trust.vn" target="_blank" rel="dofollow"><span>TRUST.vn</span></a>
                        </p>
                    </div>
                    <div class="fr algin-right">
                        <p>Đang online :   80</p>
                        <p>Lượt truy cập : 563.214</p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <!--=== END: FOOTER ===-->
    </div> 
</div>
<!--===MENU MOBILE==-->
   <nav id="menu">
        <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="cong_ty_du_lich_dong_duong_gioi_thieu_1170_02.html">Giới thiệu</a></li>
            <li><a href="tour-noi-dia.php">Tour nội địa</a></li>
            <li><a href="tour-quoc-te.php">Tour quốc tế</a></li>
            <li><a href="cong_ty_du_lich_dong_duong_cam_nang_du_lich_1170_02.html">Cẩm nang du lịch</a></li>
            <li><a href="cong_ty_du_lich_dong_duong_lien_he_1170_02.html">Liên hệ</a></li>
        </ul>
   </nav> 
<!--===MENU MOBILE==-->
</body>
</html>
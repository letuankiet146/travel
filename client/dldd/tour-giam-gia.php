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
    <link href="js/slideSlick/css/slick.css" type="text/css" rel="stylesheet" />
    <link href="js/slideSlick/css/slick-theme.css" type="text/css" rel="stylesheet" />
    <link href="style/product.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/slideSlick/js/slick.js"></script>
    <script type="text/javascript" src="js/product/product.js"></script>
    <!--===MODULE MAIN==-->
</head>

<body>
<?php 
    include("include/tour/function.php"); 
    include("admin/connectDB.php");
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
                <img src="images/news/banner.jpg" alt="#" />
            </div>
            <!--=== END: BANNER ===-->
            <div class="wrapper">
                <!--=== BEGIN: BREADCRUMB ===-->
                <div id="vnt-navation" class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                    <div class="navation">
                        <ul>
                            <li class="home"><a href="index.php">Trang chủ</a></li>
                            <li>Tour giảm giá</li>
                        </ul>
                    </div>
                </div>
                <!--=== END: BREADCRUMB ===-->
                <div class="box_mid">
                    <div class="mid-title">
                        <div class="titleL">
                            <h1>Tour giảm giá</h1>
                        </div>
                        <div class="titleR"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="mid-content">
                        <div id="vnt-sidebar">
                            <!--===BEGIN: BOX===-->
                            <div class="box search-tour showinfo">
                            	<div class="box-title">
                            		<div class="fTitle">
                                        Tìm tour du lịch
                            		</div>
                            	</div>
                            	<div class="box-content">
                                    <div class="w-searchTour">
                                        <form id="searchTour" method="POST" action="#">
                                            <div class="input-radio">
                                                <ul>
                                                    <li class="active">
                                                        <label>
                                                            <input type="radio" name="checkTour" value="1" checked="checked" />
                                                            <span>Trong nước</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label>
                                                            <input type="radio" name="checkTour" value="2"/>
                                                            <span>Nước ngoài</span>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="input-wrapper">
                                                <select name="form" class="form-control">
                                                    <option value="1">Khởi hành</option>
                                                </select>
                                                <select name="to" class="form-control">
                                                    <option value="1">Nơi đến</option>
                                                </select>
                                                <select name="time" class="form-control">
                                                    <option value="1">Thời gian</option>
                                                </select>
                                                <select name="price" class="form-control">
                                                    <option value="1">Giá (VNĐ)</option>
                                                </select>
                                                <input name="keyword" id="t-keyword" class="form-control full768" placeholder="từ khóa..." />
                                            
                                                <button type="submit" id="do_submit" name="do_submit" class="btn" value=""><span>Tìm tour</span></button>
                                                
                                            </div>
                                        </form>
                                    </div>
                            	</div>
                            </div>
                            <!--===END: BOX===-->
                            <!--===BEGIN: BOX===-->
                            <div class="box diadiem showinfo">
                            	<div class="box-title">
                            		<div class="fTitle">Điểm du lịch nội địa</div>
                            	</div>
                            	<div class="box-content">
                                    <div class="list-diadiem">
                                        <ul><?php dsDiaDiem(1); ?></ul>
                                    </div>
                            	</div>
                            </div>
                            <!--===END: BOX===-->
                            <!--===BEGIN: BOX===-->
                            <div class="box global showinfo">
                            	<div class="box-title"><div class="fTitle">Điểm du lịch quốc tế</div></div>
                            	<div class="box-content">
                                    <div class="list-diadiem"><ul><?php dsDiaDiem(2); ?></ul></div>
                            	</div>
                            </div>
                            <!--===END: BOX===-->
                        </div>
                        <div id="vnt-main" > <?php dsTourGiamGia(); ?> </div>
                        <div class="clear"></div>
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
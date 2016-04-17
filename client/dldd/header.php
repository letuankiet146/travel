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

    <link rel="stylesheet" href="js/datepicker/datepicker.css"/>
    <script src="js/datepicker/datepicker.js"></script>
    <script type="text/javascript">
        $(function() {
            $( "#time" ).datepicker({
                showOn: "focus",
                numberOfMonths: 2,
                minDate: 0
            })
        });
    </script>
    <!--===MODULE MAIN==-->
<?php $paged = $_GET['page']; ?>
<?php if($paged == "trang-chu" || $paged ==''){ ?>
    <link href="style/main.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/lazingloading/jquery.lazyscrollloading.js"></script>
    <script type="text/javascript" src="js/main/main.js"></script>
<?php } ?>
<?php if($paged == "gioi-thieu"){ ?>
    <link href="style/about.css" rel="stylesheet" type="text/css" />
<?php } ?>
<?php if($paged == "tour-noi-dia" || $paged == "tour-quoc-te" || $paged == "tour-giam-gia" || $paged == "tour-sap-khoi-hanh" || $paged == "tour-di-nhieu"){ ?>
    <link href="js/slideSlick/css/slick.css" type="text/css" rel="stylesheet" />
    <link href="js/slideSlick/css/slick-theme.css" type="text/css" rel="stylesheet" />
    <link href="style/product.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/slideSlick/js/slick.js"></script>
    <script type="text/javascript" src="js/product/product.js"></script>
<?php } ?>
<?php if($paged == "cam-nang-du-lich"){ ?>
    <link rel="stylesheet" href="js/datepicker/datepicker.css"/>
    <script src="js/datepicker/datepicker.js"></script>
    <!--===DatePicker==-->
    <link href="style/news.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/news/news.js"></script>
<?php } ?>
<?php if($paged == "lien-he"){ ?>
    <link href="style/contact.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/contact/contact.js"></script>
<?php } ?>
<?php if($paged == "chi-tiet-tour"){ ?>
    <link href="js/slideSlick/css/slick.css" type="text/css" rel="stylesheet" />
    <link href="js/slideSlick/css/slick-theme.css" type="text/css" rel="stylesheet" />
    <link href="style/product.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/product/loadData.js"></script>
    <script type="text/javascript" src="js/slideSlick/js/slick.js"></script>
    <script type="text/javascript" src="js/product/product.js"></script>
<?php } ?>
<?php if($paged == "dat-tour"){ ?>
    <link href="style/product.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/product/loadData.js"></script>
    <script type="text/javascript" src="js/product/booking.js"></script>
<?php } ?>
<?php if($paged == "thanh-toan"){ ?>
    <link href="style/product.css" rel="stylesheet" type="text/css" />
<?php } ?>
<?php if($paged == "ket-qua-tim-kiem"){ ?>
    <link href="style/search.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/lazingloading/jquery.lazyscrollloading.js"></script>
    <script type="text/javascript" src="js/search/search.js"></script>
<?php } ?>
<?php if($paged == "khach-hang" || $paged == "cap-nhat-thong-tin" || $paged == "thay-doi-mat-khau" || $paged == "thay-doi-mat-khau/xac-thuc" || $paged == "thay-doi-mat-khau/thanh-cong" || $paged == "lich-su-dat-tour" || $paged == "lich-su-dat-tour/chi-tiet" || $paged == "lich-su-dat-tour/yeu-cau-huy-don-dat-tour" || $paged == "lich-su-dat-tour/xac-thuc" || $paged == "lich-su-dat-tour/thanh-cong"){ ?>
    <link href="style/customer.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/product/product.js"></script>
<?php } ?>
<?php if($paged == "dang-nhap"){ ?>
    <link href="style/customer.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/product/product.js"></script>
<?php } ?>
    <!--===MODULE MAIN==-->
</head>
<body>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
          fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<div id="vnt-wrapper">
	<div id="vnt-container">
        <!--=== BEGIN: HEADER ===-->
    	<div id="vnt-header">
            <div class="header-top">
                <div class="wrapper">
                    <div class="logo">
                        <h1>
                            <a href="index.php?page=trang-chu">
                                <img src="images/logo.png" alt="Du lịch giải trí Đông Dương" />
                            </a>
                        </h1>
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
                            <?php if($paged == "trang-chu"){ echo '<li class="current">';} 
                                  else{echo '<li>';}
                            ?>
                                <a class="hover_effect_menu" href="index.php?page=trang-chu"><span class="hover_text">Trang chủ</span></a>
                            </li>
                            <?php if($paged == "gioi-thieu"){ echo '<li class="current">';} 
                                  else{echo '<li>';}
                            ?>
                                <a class="hover_effect_menu" href="index.php?page=gioi-thieu"><span class="hover_text">Giới thiệu</span></a>
                            </li>
                            <?php if($paged == "tour-noi-dia"){ echo '<li class="current">';} 
                                  else{echo '<li>';}
                            ?>
                                <a class="hover_effect_menu" href="index.php?page=tour-noi-dia"><span class="hover_text">Tour nội địa</span></a>
                            </li>
                            <?php if($paged == "tour-quoc-te"){ echo '<li class="current">';} 
                                  else{echo '<li>';}
                            ?>
                                <a class="hover_effect_menu" href="index.php?page=tour-quoc-te"><span class="hover_text">Tour quốc tế</span></a>
                            </li>
                            <?php if($paged == "cam-nang-du-lich"){ echo '<li class="current">';} 
                                  else{echo '<li>';}
                            ?>
                                <a class="hover_effect_menu" href="index.php?page=cam-nang-du-lich"><span class="hover_text">Cẩm nang du lịch</span></a>
                            </li>
                            <?php if($paged == "lien-he"){ echo '<li class="current">';} 
                                  else{echo '<li>';}
                            ?>
                                <a class="hover_effect_menu" href="index.php?page=lien-he"><span class="hover_text">Liên hệ</span></a>
                            </li>
                            </li>
                            <?php if($paged == "khach-hang"){ echo '<li class="current">';} 
                                  else{echo '<li>';}
                            ?>
                                <a class="hover_effect_menu" href="index.php?page=dang-nhap"><span class="hover_text">Đăng nhập</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="menu-tool">
                        <!--===FORMSEARCH==-->
                        <!-- <div class="formSearch">
                            <form id="formSearch" name="formSearch" method="POST" action="index.php?page=ket-qua-tim-kiem" class="box_search">
                                <div class="input-group">
                                    <input name="keyword" id="keyword" type="text" class="text_search form-control" placeholder="Tìm kiếm" value="" />
                                    <span class="input-group-btn">
                                        <button id="btn-search" name="btn-search" type="submit" class="btn" value="" ><span >Search</span></button>
                                    </span>
                                <input name="do_search" value="1" type="hidden"/>
                                </div>
                            </form>
                        </div> -->
                        <!--===FORMSEARCH==-->
                    </div> 
                    <div class="clear"></div>
                </div>
            </div>
            <!--=== END: MENUTOP ===-->
            <!--=== BEGIN: MMENU ===-->
            <div class="vnt-mmenu">
                <div class="wrapper">
                    <div class="mmenu"><a href="#menu">
                        <?php 
                            if($paged == "trang-chu" || $paged == ''){echo "Trang chủ";}
                            else if($paged == "gioi-thieu"){echo "Giới thiệu";}
                            else if($paged == "tour-noi-dia"){echo "Tour nội địa";}
                            else if($paged == "tour-quoc-te"){echo "Tour quốc tế";}
                            else if($paged == "cam-nang-du-lich"){echo "Cẩm nang du lịch";}
                            else if($paged == "lien-he"){echo "Liên hệ";}
                            else if($paged == "khach-hang"){echo "Khách hàng";}
                            else if($paged == "dat-tour"){echo "Đặt tour";}
                        ?>
                        
                    </a></div>
                </div>
            </div>
            <!--=== END: MMENU ===-->
        </div>
        <!--=== END: HEADER ===-->
        <!--=== BEGIN: CONTENT ===-->
      	<div id="vnt-content">
            <!--=== BEGIN: BANNER ===-->
            <?php if($paged == "trang-chu" || $paged ==''){ ?>
                <div class="vnt-banner">
                    <div id="vnt-banner">
                        <a href="#"><img src="images/main/slider1.jpg" /></a>
                        <a href="#"><img src="images/main/slider2.jpg" /></a>
                        <a href="#"><img src="images/main/slider3.jpg" /></a>
                    </div>
                </div>
            <?php }
            else{ ?>
                <div class="vnt-banner">
                    <div id="vnt-banner">
                        <img src="images/news/banner.jpg" alt="#" />
                        <img src="images/news/banner.jpg" alt="#" />
                        <img src="images/news/banner.jpg" alt="#" />
                    </div>
                </div>
            <?php } ?>
            <!--=== END: BANNER ===-->
            <?php if($paged == "trang-chu" || $paged == "ket-qua-tim-kiem" || $paged == ""){ ?>
                <!--=== BEGIN: SEARCH TOUR ===-->
                <div class="vnt-searchTour">
                    <div class="wrapper">
                        <div class="w-searchTour">
                            <form id="searchTour" method="POST" action="index.php?page=ket-qua-tim-kiem">
                                <div class="title">Tìm tour du lịch</div>
                                <div class="input-radio" id="area_id">
                                    <ul>
                                        <li class="active">
                                            <label>
                                                <input type="radio" name="area" value="1" checked="checked" />
                                                <span>Trong nước</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="area" value="2" />
                                                <span>Nước ngoài</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="input-wrapper">
                                    <div class="input-wrapper-content">
                                        <select name="from" id="from" class="form-control">
                                            <?php 
                                                $listFrom = listFromPlace();
                                                foreach ($listFrom as $rows){
                                                    echo '<option value="'.$rows['from_place_id'].'">'.$rows['from_place_name'].'</option>';
                                                } 
                                            ?>
                                        </select>
                                        <select name="to" id="to" class="form-control">
                                            <?php echo listArrivePlace(1); ?>
                                        </select>
                                        <select name="price" id="price" class="form-control">
                                            <option value="">Giá (VNĐ)</option>
                                            <option value="1">Dưới 1 triệu</option>
                                            <option value="2">1 - 2 triệu</option>
                                            <option value="3">2 - 4 triệu</option>
                                            <option value="4">4 - 6 triệu</option>
                                            <option value="5">6 - 10 triệu</option>
                                            <option value="6">Trên 10 triệu</option>
                                        </select>
                                        <input type="text" name="time" id="time" class="form-control" placeholder="Ngày khỏi hành" />
                                        <input type="text" name="keyword" id="t-keyword" class="form-control full768" placeholder="từ khóa..." />
                                    </div>
                                    <span class="input-wrapper-btn">
                                        <button type="submit" id="do_submit" name="do_submit" class="btn" value=""><span>Tìm tour</span></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--=== END: SEARCH TOUR ===-->
            <?php } ?>
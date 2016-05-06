<?php
    include('model/handbook.php');
?>
            <div class="wrapper">
                <!--=== BEGIN: BREADCRUMB ===-->
                <div id="vnt-navation" class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                    <div class="navation">
                        <ul>
                            <li class="home"><a href="index.php">Trang chủ</a></li>
                            <li>Cẩm nang du lịch</li>
                        </ul>
                    </div>
                </div>
                <!--=== END: BREADCRUMB ===-->
                <div class="box_mid">
                    <div class="mid-title">
                        <div class="titleL n-transform">
                        <?php
                            foreach (listHandBock($_GET['handbook_id']) as $rows) {
                                echo '<h1>'. $rows['name'] .'</h1>';
                            }
                        ?>
                            
                        </div>
                        <div class="titleR"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="mid-content">
                        <div id="vnt-sidebar">
                            <!--===BEGIN: BOX===-->
                            <div class="box">
                            	<div class="box-title">
                            		<div class="fTitle">
                            		</div>
                            	</div>
                            	<div class="box-content">
                                    <img src="images/news/img-news.jpg" alt="#" />
                            	</div>
                            </div>
                            <!--===END: BOX===-->
                            <!--===BEGIN: BOX===-->
                            <div class="box box-news">
                            	<div class="box-title">
                            		<div class="fTitle">
                                        TIN TỨC XEM NHIỀU
                            		</div>
                            	</div>
                            	<div class="box-content">
                                    <div class="item">
                                        <div class="i-thumbnail">
                                            <a href="">
                                                <img src="images/news/news9.jpg" alt="#" />
                                            </a>
                                        </div>
                                        <div class="i-description">
                                            <a href="">Phát triển ngành chăn nuôi: Đòi hỏi sự chủ động</a>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="item">
                                        <div class="i-thumbnail">
                                            <a href="">
                                                <img src="images/news/news10.jpg" alt="#" />
                                            </a>
                                        </div>
                                        <div class="i-description">
                                            <a href="">Gỡ vướng thuế GTGT đối với thức ăn chăn nuôi</a>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="item">
                                        <div class="i-thumbnail">
                                            <a href="">
                                                <img src="images/news/news11.jpg" alt="#" />
                                            </a>
                                        </div>
                                        <div class="i-description">
                                            <a href="">Bán bã điều cho nhà máy sản xuất thức ăn chăn nuôi</a>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="item">
                                        <div class="i-thumbnail">
                                            <a href="">
                                                <img src="images/news/news12.jpg" alt="#" />
                                            </a>
                                        </div>
                                        <div class="i-description">
                                            <a href="">Bán bã điều cho nhà máy sản xuất thức ăn chăn nuôi</a>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="item">
                                        <div class="i-thumbnail">
                                            <a href="">
                                                <img src="images/news/news13.jpg" alt="#" />
                                            </a>
                                        </div>
                                        <div class="i-description">
                                            <a href="">Bán bã điều cho nhà máy sản xuất thức ăn chăn nuôi</a>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="item">
                                        <div class="i-thumbnail">
                                            <a href="">
                                                <img src="images/news/news14.jpg" alt="#" />
                                            </a>
                                        </div>
                                        <div class="i-description">
                                            <a href="">Giá nhập khẩu thức ăn gia súc và nguyên liệu</a>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="item">
                                        <div class="i-thumbnail">
                                            <a href="">
                                                <img src="images/news/news15.jpg" alt="#" />
                                            </a>
                                        </div>
                                        <div class="i-description">
                                            <a href="">Thức Ăn Chăn Nuôi trang 9</a>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                            	</div>
                            </div>
                            <!--===END: BOX===-->
                            <!--===BEGIN: BOX===-->
                            <div class="box">
                            	<div class="box-title">
                            		<div class="fTitle">
                            		</div>
                            	</div>
                            	<div class="box-content">
                                    <img src="images/news/adv1.jpg" alt="#" />
                            	</div>
                            </div>
                            <!--===END: BOX===-->
                            <!--===BEGIN: BOX===-->
                            <div class="box">
                            	<div class="box-title">
                            		<div class="fTitle">
                            		</div>
                            	</div>
                            	<div class="box-content">
                                    <img src="images/news/adv2.jpg" alt="#" />
                            	</div>
                            </div>
                            <!--===END: BOX===-->
                            <!--===BEGIN: BOX===-->
                            <div class="box">
                            	<div class="box-title">
                            		<div class="fTitle">
                            		</div>
                            	</div>
                            	<div class="box-content">
                                    <img src="images/news/adv3.jpg" alt="#" />
                            	</div>
                            </div>
                            <!--===END: BOX===-->
                        </div>
                        <div id="vnt-main" >
                            <div class="the-content">
                                <div class="date">Thứ sáu, 22/03/2016, 18:31 GMT+7</div>
                                <div>
                                    <?php
                                        foreach (listHandBock($_GET['handbook_id']) as $rows) {
                                            echo $rows['info'];
                                        }
                                    ?>
                                </div>  
                            </div>
                            <!--===BEGIN: COMMENT==-->
                            <!-- <div class="comment">
                                <div class="title">Ý kiến của bạn</div>
                                <div class="formComment">
                                    <form id="formCommnet" action="" method="POST">
                                        <div class="input-group">
                                            <div class="w_content">
                                                <textarea id="contentComment" name="contentComment" class="form-control" placeholder="Mời nhập thắc mắc hoặc ý kiến của bạn"></textarea>
                                                <div class="content-info">
                                                    <div class="info-title">Nhập thông tin của bạn</div>
                                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" />
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên của bạn" />
                                                </div>
                                            </div>
                                            <span class="input-group-btn"><button id="btn-search" name="btn-search" class="btn" type="submit">Gửi</button></span>
                                        </div>
                                    </form>
                                </div>
                                <div class="grid-comment">
                                    <div class="node-commnet">
                                        <div class="avatar">
                                            <img src="images/news/avatar.jpg" />
                                        </div>
                                        <div class="info-comment">
                                            <div class="info-preson">
                                                <span class="name">Trần Anh tuấn </span><span class="email">(tuananh2101@yahoo.com)</span>  -  <span class="time">Gửi vào:15/03/2011 10:55:08</span>
                                            </div>
                                            <div class="ccomment">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="node-commnet">
                                        <div class="avatar">
                                            <img src="images/news/avatar.jpg" />
                                        </div>
                                        <div class="info-comment">
                                            <div class="info-preson">
                                                <span class="name">Trần Anh tuấn </span><span class="email">(tuananh2101@yahoo.com)</span>  -  <span class="time">Gửi vào:15/03/2011 10:55:08</span>
                                            </div>
                                            <div class="ccomment">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div> -->
                            <!--===BEGIN: COMMENT==-->
                            <!--=======NAV-PAG======-->
                            <!-- <div class="pagination">
                                <ul>
                                    <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                                    <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                </ul>
                            </div> -->
                            <!--=======NAV-PAG======-->
                            <!-- <div class="comment-facebook">
                                <img src="images/news/img-facebook.jpg" />
                            </div> -->
                            <!--===BEGIN: SOCIAL==-->
                           <!--  <div class="like_share">
                                <div class="like_facebook">
                                    <a href="#"><img src="images/weblink/icon_share.png"/></a>
                                    <a href="#"><img src="images/weblink/icon-like.png"/></a>
                                    <a href="#"><img src="images/weblink/icon-pin.png"/></a>
                                    <a href="#"><img src="images/weblink/icon-gplug.png"/></a>
                                </div>
                                <div class="feedback">
                                    <a class="link-feedback" href="#">Gởi phản hồi</a>
                                    <a class="link-print" href="#">In trang này</a>
                                    <a class="link-comeback" href="#">Quay lại trang trước</a>
                                </div>
                                <div class="clear"></div>
                            </div> -->
                            <!--===END: SOCIAL==-->
                            <!--===BEGIN: TIN LIÊN QUAN==-->
                            <div class="news_related">
                                <h4>Các tin liên quan</h4>
                                <ul>
                                    <?php
                                        $id = '';
                                        $limit = 10;
                                        foreach (listHandBock($id,$limit) as $rows) {
                                            $date = date("d/m/Y", strtotime($rows['date_create']));
                                            echo '<li><a href="index.php?page=chi-tiet-cam-nang&handbook_id='. $rows['id'] . '">'. $rows['name'] . '<span>('. $date . ')</span></a></li>';
                                        }
                                    ?>
                                </ul>
                            </div>
                            <!--===END: TIN LIÊN QUAN==-->
                            <!--=======FORM-SEARCH=======-->
                          <!--   <div class="search_news">
                                <p>Các tin đã đưa ngày</p>
                                <form id="search_news" action="#" method="POST">
                                    <div class="table_cell">
                                        <p>từ </p>
                                        <input type="text" name="from" id="from" />
                                    </div>
                                    <div class="table_cell">
                                        <p>đến </p>
                                        <input type="text" name="to" id="to" />
                                    </div>
                                    <div class="table_cell">
                                        <input type="submit" id="submit_new" name="submit_new" value="Xem" />
                                    </div>
                                </form>
                                <div class="clear"></div>
                            </div> -->
                            <!--=======FORM-SEARCH=======-->

                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
    
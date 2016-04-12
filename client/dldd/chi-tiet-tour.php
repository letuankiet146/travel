    <div class="wrapper">
        <!--=== BEGIN: BREADCRUMB ===-->
        <div id="vnt-navation" class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
            <div class="navation">
                <ul>
                    <li class="home"><a href="index.php">Trang chủ</a></li>
                    <li><a href="tour-noi-dia.php">Tour nội địa</a></li>
                    <li>Tour du lịch Đồng Sen Tháp Mười</li>
                </ul>
            </div>
        </div>
        <!--=== END: BREADCRUMB ===-->
        <div class="box_mid">
            <div class="mid-title">
                <div class="titleL n-transform"></div>
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
                                <ul> <?php dsDiaDiem(1); ?> </ul>
                            </div>
                        </div>
                    </div>
                    <!--===END: BOX===-->
                    <!--===BEGIN: BOX===-->
                    <div class="box global showinfo">
                        <div class="box-title">
                            <div class="fTitle"> Điểm du lịch quốc tế </div>
                        </div>
                        <div class="box-content">
                            <div class="list-diadiem">
                                <ul><?php dsDiaDiem(2); ?></ul>
                            </div>
                        </div>
                    </div>
                    <!--===END: BOX===-->
                </div>
                <div id="vnt-main" >
                    <!--===BEGIN: THÔNG TIN TOUR==-->
                    <div class="info-tour">
                        <div class="tour-left">
                            <div class="slider-detail">
                                <div id="slider-detail">
                                    <div><img src="images/product/slider-detail.jpg" alt="#" /></div>
                                    <div><img src="images/product/slider-detail.jpg" alt="#" /></div>
                                    <div><img src="images/product/slider-detail.jpg" alt="#" /></div>
                                </div>
                            </div>
                            <!--===BEGIN: SOCIAL==-->
                            <div class="div-social">
                                <div class="fl">
                                    <a href="#"><img src="images/weblink/s-facebook.jpg"/></a>
                                    <a href="#"><img src="images/weblink/s-twitter.jpg"/></a>
                                    <a href="#"><img src="images/weblink/s-share.jpg"/></a>
                                </div>
                                <div class="fr">
                                    <a href="#"><img src="images/weblink/icon-like.png"/></a>
                                    <a href="#"><img src="images/weblink/icon-gplug.png"/></a>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <!--===END: SOCIAL==-->
                        </div>
                        <div class="tour-right">
                            <div class="detail_grid"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <!--===END: THÔNG TIN TOUR==-->
                    <!--===BEGIN: TAB==-->
                    <div class="vnt-tab">
                        <ul>
                            <li>
                                <div class="title">Chương trình tour</div>
                                <div class="vnt-content" id="infoDto"></div>
                            </li>
                            <li>
                                <div class="title">Chi tiết tour</div>
                                <div class="vnt-content" id="schedule"></div>
                            </li>
                            <li>
                                <div class="title">Ngày khác</div>
                                <div class="vnt-content">
                                    <p>Tháng 8 là tháng của hoa sen. Mùa sen của vùng Đồng Tháp Mười đang bắt đầu rồi. Hãy cùng gia đình, bạn bè tận hưởng tháng cuối cùng của mùa hè với những khoảnh khắc thật đẹp tại Đồng Sen Tháp Mười – Nơi Sen Thật Sự Là Sen.</p>
                                    <p>Công ty du lịch Giải trí Đông Dương trân trọng giới thiệu chương trình du lịch</p>
                                    <p>Đồng Sen Tháp Mười – Chùa Sen Vua</p>
                                    <p>Thời gian : 1 ngày (chủ nhật hàng tuần)</p>
                                    <p>CHƯƠNG TRÌNH CHI TIẾT</p>
                                    <p>05h00 : Xe và Hdv Du lịch giải trí Đông Dương (ITE Service) đón khách tại điểm hẹn (Vp công ty 171 Nguyễn Văn Trỗi, Q.Phú Nhuận), khởi hành đi Cao Lãnh, Đồng Tháp.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--===END: TAB==-->
                    <!--===BEGIN: TAG==-->
                    <div class="tag1">
                        <p><span class="title">TAG: </span><a href="#" title="chất lượng cao">chất lượng cao</a>
                        <a href="#" title="hàng việt nam"> hàng Việt Nam</a></p>
                    </div>
                    <!--===END: TAG==-->
                    <!--===BEGIN: SOCIAL==-->
                    <div class="like_share">
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
                    </div>
                    <!--===END: SOCIAL==-->
                        <!--===BEGIN: COMMENT==-->
                        <div class="comment">
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
                        </div>
                        <!--===BEGIN: COMMENT==-->
                    <!--=======NAV-PAG======-->
                    <div class="pagination">
                        <ul>
                            <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                    <!--=======NAV-PAG======-->
                    <div class="comment-facebook">
                        <img src="images/news/img-facebook.jpg" />
                    </div>
                    <!--===BEGIN: CÁC TOUR DU LỊCH KHÁC==-->
                    <div class="related-product">
                        <div class="title" id=tl_orther>Các tour du lịch đồng tháp khác</div>
                        <div class="sliderProduct">
                            <div id="sliderProduct">
                                <?php 
                                    dsTour_involve();
                                ?>
                            </div>
                        </div>
                    </div>
                    <!--===END: CÁC TOUR DU LỊCH KHÁC==-->
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
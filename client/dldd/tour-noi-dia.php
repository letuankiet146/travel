
            <div class="wrapper">
                <!--=== BEGIN: BREADCRUMB ===-->
                <div id="vnt-navation" class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                    <div class="navation">
                        <ul>
                            <li class="home"><a href="index.php">Trang chủ</a></li>
                            <li>Tour nội địa</li>
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
                        <div id="vnt-main" > <?php dsTour("AND a.arrive_place_area_id = 1",4); ?> </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        
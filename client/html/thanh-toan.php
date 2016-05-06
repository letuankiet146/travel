
            <div class="wrapper">
                <!--=== BEGIN: BREADCRUMB ===-->
                <div id="vnt-navation" class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                    <div class="navation">
                        <ul>
                            <li class="home"><a href="index.php">Trang chủ</a></li>
                            <li>Thanh toán</li>
                        </ul>
                    </div>
                </div>
                <!--=== END: BREADCRUMB ===-->
                <div class="box_mid">
                    <div class="mid-title">
                        <div class="titleL">
                            <h1 id="h1">Thanh toán</h1>
                        </div>
                        <div class="titleR"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="mid-content">
                        <div class="vnt-order">
                            <div id="thanhtoanok">
                                <input type="hidden" name="order_id" id="order_id" value="<?php madonhang(); ?>" />
                                <div class="thongbao"> 
                                    <?php 
                                        include 'model/customer.php';
                                        $id='';
                                        $customer = listCustomersOne($id); 
                                    ?>
                                    <p><strong>Thanh toán thành công.</strong> Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi.</p>
                                    <p>Hệ thống đã gửi tài khoản quý khách vào email <strong>
                                        <?php 
                                            foreach ($customer as $row) {
                                                echo $row['customer_email'];
                                            }
                                        ?>
                                    </strong></p></br>
                                    <span>Hệ thống tự động chuyển trang đăng nhập.</span></br></br>
                                    <span>Quý khách vui lòng không thoát trang này.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="js/product/thanhtoan.js"></script>
        
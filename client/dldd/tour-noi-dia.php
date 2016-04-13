
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
                        <?php include('sidebar.php') ?>
                        <div id="vnt-main" > <?php dsTour("AND a.arrive_place_area_id = 1",4); ?> </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        
<?php
    $paged = $_GET['page'];
    $num = '';
    $lastID = '';
    if($paged == 'tour-noi-dia'){$num = 1;}
    if($paged == 'tour-quoc-te'){$num = 2;}
    if($paged == 'tour-di-nhieu'){$num = 3;}
    if($paged == 'tour-giam-gia'){$num = 4;}
    if($paged == 'tour-sap-khoi-hanh'){$num = 5;}    
?>
            <div class="wrapper">
                <!--=== BEGIN: BREADCRUMB ===-->
                <div id="vnt-navation" class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                    <div class="navation">
                        <ul>
                            <li class="home"><a href="index.php">Trang chủ</a></li>
                            <?php
                                if($num == 1){echo '<li>Tour nội địa</li>';}
                                else if($num == 2){echo '<li>Tour quốc tế</li>';}
                                else if($num == 3){echo '<li>Tour đi nhiều</li>';}
                                else if($num == 4){echo '<li>Tour giảm giá</li>';}
                                else if($num == 5){echo '<li>Tour sắp khởi hành</li>';}
                            ?>
                            
                        </ul>
                    </div>
                </div>
                <!--=== END: BREADCRUMB ===-->
                <div class="box_mid">
                    <div class="mid-title">
                        <div class="titleL">
                            
                            <?php
                                if($num == 1){echo '<h1>Tour nội địa</h1>';}
                                else if($num == 2){echo '<h1>Tour quốc tế</h1>';}
                                else if($num == 3){echo '<h1>Tour đi nhiều</h1>';}
                                else if($num == 4){echo '<h1>Tour giảm giá</h1>';}
                                else if($num == 5){echo '<h1>Tour sắp khởi hành</h1>';}
                            ?>
                        </div>
                        <div class="titleR"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="mid-content">
                        <?php include('sidebar.php') ?>
                        <div id="vnt-main" >
                            <div class="grid-tour">
                            <?php
                                $listTour = dsTour($num, $lastID);
                                foreach ($listTour as $rows) {
                                    $fday_start = date("d/m/Y", strtotime($rows['tour_day_start']));
                                    $day_end = strtotime($rows['tour_day_end']);
                                    $day_start = strtotime($rows['tour_day_start']);
                                    $Days =($day_end - $day_start)/(60*60*24);
                                    $sale_off = number_format($rows['tour_sale_off'],0,"",",");
                                    $tour_charge = number_format($rows['tour_charge'],0,"",",");
                                    echo'<div class="item" item-id="' .$rows['tour_id']. '">
                                            <div class="i_item">
                                                <div class="i-images">
                                                    <a href="index.php?page=chi-tiet-tour&tour_id=' .$rows['tour_id']. '">
                                                        <img  src="' .$rows['tour_image_data']. '" alt="' .$rows['tour_name']. '" />
                                                        <div class="see_details">Xem chi tiết</div>
                                                    </a>
                                                </div>
                                                <div class="i-description">
                                                    <div class="i-title">
                                                        <a href="index.php?page=chi-tiet-tour&tour_id=' .$rows['tour_id']. '" title="' .$rows['tour_name']. '">' .$rows['tour_name']. '</a>
                                                    </div>
                                                    <div class="i-content">
                                                        <span><i class="fa fa-calendar" aria-hidden="true"></i> ' .$fday_start. ' </span>';
                                                        if($rows['tour_sale_off'] == 0){
                                                            echo '<span></span>';
                                                        }
                                                        else{
                                                            echo '<span>' .$tour_charge. ' VNĐ</span>';
                                                        }
                                                    echo'   
                                                    </div>
                                                    <div class="i-content">
                                                        <div><i class="fa fa-clock-o" aria-hidden="true"></i> ' .$Days. ' ngày </div>';
                                                        if($rows['tour_sale_off'] == 0){
                                                            echo '<div>' .$tour_charge. ' VNĐ</div>';
                                                        }
                                                        else{
                                                            echo '<div>' .$sale_off. ' VNĐ</div>';
                                                        }
                                                    echo '</div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>';
                                }
                            ?>
                            </div>
                            <!--=======NAV-PAG======-->
                            <div class="pagination" onclick="load_paging(<?php echo $num; ?>);"><span class="viewdetail">Xem thêm</span></div>
                            <!--=======NAV-PAG======-->
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        
<?php 
    $area = $_POST['area'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $time = date("Y-m-d", strtotime($_POST['time']));
    if($time == '1970-01-01'){$time='';}
    else{$time = date("Y-m-d", strtotime($_POST['time']));}
    $price = $_POST['price'];
    $keyword = $_POST['keyword'];
?>
<!--=== BEGIN: GIỚI THIỆU TOUR ===-->
<div class="vnt-tour">
    <div class="wrapper">
        <div class="title-menu">
            <div class="title">Kết quả tìm kiếm</div>
        </div>
        <div id="loadAjaxTour">
            <div class="grid-tour">
                <div class="row-tour">
                    <?php 
                        $listTour = selectSearch($area, $from, $to, $time, $price, $keyword);
                        if($listTour != 0){
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
                                                        if($sale_off == 0){
                                                            echo '<span></span>';
                                                        }
                                                        else{
                                                            echo '<span>' .$tour_charge. ' VNĐ</span>';
                                                        }
                                                    echo'   
                                                    </div>
                                                    <div class="i-content">
                                                        <div><i class="fa fa-clock-o" aria-hidden="true"></i> ' .$Days. ' ngày </div>';
                                                        if($sale_off == 0){
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
                        }
                        else {
                            echo 'Không tìm thấy tour';
                        }
                    ?>
                </div>
                <div class="clear"></div>
                <?php
                    if($listTour != ''){
                        echo '<div class="pagination" onclick="load_paging();"><span class="viewdetail">Xem thêm</span></div>';
                    }
                    else{
                        echo '<div class="pagination"><span class="viewdetail"><a href="index.php?trang-chu">Trở về trang chủ</a></span></div>';
                    }
                ?>
            </div>
        </div>
        
    </div>
</div>
<!--=== END: GIỚI THIỆU TOUR ===-->

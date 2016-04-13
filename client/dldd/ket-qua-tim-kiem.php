<?php 
    $from = $_POST['from'];
    $area = $_POST['area'];
    $to = $_POST['to'];
?>
<!--=== BEGIN: GIỚI THIỆU TOUR ===-->
<div class="vnt-tour">
    <div class="wrapper">
        <div class="title-menu">
            <div class="title">Chùm tour nội địa khởi hành từ Hồ Chí Minh</div>
        </div>
        <div id="loadAjaxTour">
            <div class="grid-tour">
                <div class="row-tour">
                    <?php 
                        $listTour = selectSearch($area, $from, $to);
                        if($listTour != ''){
                            foreach ($listTour as $rows) {
                                $fday_start = date("d/m/Y", strtotime($rows['tour_day_start']));
                                $day_end = strtotime($rows['tour_day_end']);
                                $day_start = strtotime($rows['tour_day_start']);
                                $Days =($day_end - $day_start)/(60*60*24);
                                $sale_off = number_format($rows['tour_sale_off'],0,"",",");
                                $tour_charge = number_format($rows['tour_charge'],0,"",",");
                                echo'<div class="item">
                                        <div class="i-images">
                                            <a href="index.php?page=chi-tiet-tour&tour_id=' .$rows['tour_id']. '">
                                                <img  src="' .$rows['tour_image_data']. '" alt="' .$rows['tour_name']. '" />
                                                <div class="see_details">Xem chi tiết</div>
                                            </a>
                                        </div>
                                        <div class="i-description">
                                            <div class="i-title">
                                                <a href="index.php?page=chi-tiet-tour&tour_id=' .$rows['tour_id']. '">' .$rows['tour_name']. '</a>
                                            </div>
                                            <div class="i-content">
                                                <span><i class="fa fa-calendar" aria-hidden="true"></i> ' .$fday_start. ' </span>';
                                                if($tour_charge == 0){
                                                    echo '<span></span>';
                                                }
                                                else{
                                                    echo '<span>' .$tour_charge. ' VNĐ</span>';
                                                }
                                            echo'   
                                            </div>
                                            <div class="i-content">
                                                <div><i class="fa fa-clock-o" aria-hidden="true"></i> ' .$Days. ' ngày </div>
                                                <div>' .$sale_off. ' VNĐ</div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>';
                            }
                        }
                        else {
                            echo 'Không tìm thấy kết quả';
                        }
                    ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="viewall">
            <a href="index.php?page=tour-giam-gia">Xem thêm</a>
        </div>
    </div>
</div>
<!--=== END: GIỚI THIỆU TOUR ===-->

<?php
    include("function.php");
    $type = (string)$_GET['type'];
    if($type == 'list'){
        $num = $_POST['num'];
        $lastID = $_POST['lastID'];

        $area = $_POST['area'];
        $ffrom = $_POST['ffrom'];
        $to = $_POST['to'];
        $time = $_POST['time'];
        $price = $_POST['price'];
        $keyword = $_POST['keyword'];

        if($num != ''){
            $listTour = dsTour($num, $lastID);
        }
        if($area != ''){
            $listTour = selectSearch($area, $ffrom, $to, $time, $price, $keyword, $lastID);
        }
        if($listTour != ''){
            foreach ($listTour as $rows) {
                $fday_start = date("d/m/Y", strtotime($rows['tour_day_start']));
                $day_end = strtotime($rows['tour_day_end']);
                $day_start = strtotime($rows['tour_day_start']);
                $Days =($day_end - $day_start)/(60*60*24);
                $sale_off = number_format($rows['tour_sale_off'],0,"",",");
                $tour_charge = number_format($rows['tour_charge'],0,"",",");
                echo'<div class="item" item-id="' .$rows['tour_id']. '">
                        <script class="product" type="text/javascript" src="js/product/product.js"></script>
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
        }
        else{
            echo $listTour;
        }
    }
?>
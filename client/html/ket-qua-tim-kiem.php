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
<!--=== BEGIN: SEARCH TOUR ===-->
                <div class="vnt-searchTour">
                    <div class="wrapper">
                        <div class="w-searchTour">
                            <form id="searchTour" method="POST" action="index.php?page=ket-qua-tim-kiem">
                                <div class="title">Tìm tour du lịch</div>
                                <div class="input-radio" id="area_id">
                                    <ul>
                                        <li <?php if($area == 1){ echo 'class="active"'; } ?> >
                                            <label>
                                                <input type="radio" name="area" value="1" <?php if($area == 1){ echo 'checked="checked"'; } ?> />
                                                <span>Trong nước</span>
                                            </label>
                                        </li>
                                        <li <?php if($area == 2){ echo 'class="active"'; }?> >
                                            <label>
                                                <input type="radio" name="area" value="2" <?php if($area == 2){ echo 'checked="checked"'; } ?> />
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
                                                if($rows['from_place_id'] == $from){
                                                    echo '<option value="'.$rows['from_place_id'].'">'.$rows['from_place_name'].'</option>';
                                                }
                                            }
                                            foreach ($listFrom as $rows){
                                                echo '<option value="'.$rows['from_place_id'].'">'.$rows['from_place_name'].'</option>';
                                                } 
                                            ?>
                                        </select>
                                        <select name="to" id="to" class="form-control">
                                            <?php
                                                $listFrom = json_decode(listArrivePlace($area), true);
                                                foreach ($listFrom as $rows){
                                                    if($rows['arrive_place_id'] == $to){
                                                        echo '<option value="'.$rows['arrive_place_id'].'">'.$rows['arrive_place_name'].'</option>';
                                                    }
                                                }
                                                echo '<option value="">-Nơi đến-</option>';
                                                foreach ($listFrom as $rows){
                                                    echo '<option value="'.$rows['arrive_place_id'].'">'.$rows['arrive_place_name'].'</option>';
                                                }
                                            ?>
                                        </select>
                                        <select name="price" id="price" class="form-control">
                                            <?php
                                                if($price == 1){
                                                    echo'<option value="1">Dưới 1 triệu</option>';
                                                }
                                                if($price == 2){
                                                    echo'<option value="2">1 - 2 triệu</option>';
                                                }
                                                if($price == 3){
                                                    echo'<option value="3">2 - 4 triệu</option>';
                                                }
                                                if($price == 4){
                                                    echo'<option value="4">4 - 6 triệu</option>';
                                                }
                                                if($price == 5){
                                                    echo'<option value="5">6 - 10 triệu</option>';
                                                }
                                                if($price == 6){
                                                    echo'<option value="6">Trên 10 triệu</option>';
                                                }
                                            ?>
                                            <option value="">Giá (VNĐ)</option>
                                            <option value="1">Dưới 1 triệu</option>
                                            <option value="2">1 - 2 triệu</option>
                                            <option value="3">2 - 4 triệu</option>
                                            <option value="4">4 - 6 triệu</option>
                                            <option value="5">6 - 10 triệu</option>
                                            <option value="6">Trên 10 triệu</option>
                                        </select>
                                        <input type="text" name="time" id="time" class="form-control" value="<?php if($time != ''){ echo date("d/m/Y", strtotime($_POST['time'])); }?>" placeholder="Ngày khỏi hành" />
                                        <input type="text" name="keyword" id="t-keyword" class="form-control full768" value="<?php $keyword; ?>" placeholder="Từ khóa..." />
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

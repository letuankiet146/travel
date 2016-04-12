<?php
    include("../../admin/connectDB.php");
    $type = (string)$_GET['type'];
    if($type == 'list'){
        $id = $_POST['last_tour_id'];
        $output = '';  
        $tour_id = '';  
        sleep(1);
        $sql = "SELECT * FROM tour WHERE tour_delete_date is null AND tour_active=1 AND tour_charge > 0 AND  tour_id < $id  ORDER BY tour_id DESC LIMIT 2";
        $query = mysql_query($sql);
        if(mysql_num_rows($query) > 0){
            while($rows = mysql_fetch_array($query)){
            $tour_id = $rows['tour_id'];
            $output .='<div class="item">
                            <div class="i_item">
                                <div class="i-images">
                                    <a href="chi-tiet-tour.php?tour_id=' .$rows["tour_id"]. '">
                                        <img src="' .$rows["tour_image_data"]. '" alt="#" />
                                        <div class="see_details">Xem chi tiết</div>
                                    </a>
                                </div>
                                <div class="i-description">
                                    <div class="i-title">
                                        <a href="chi-tiet-tour.php?tour_id=' .$rows["tour_id"]. '">' .$rows["tour_name"]. '</a>
                                    </div>
                                    <div class="fl">
                                        <div class="i-content">
                                            <div><i class="fa fa-clock-o" aria-hidden="true"></i> 5 ngày </div>
                                            <div><i class="fa fa-calendar" aria-hidden="true"></i> ' .$rows["tour_day_start"]. '</div>
                                        </div>
                                    </div>
                                    <div class="fr">
                                        <div class="i-content"> 
                                            <span>' .$rows["tour_charge"]. ' VNĐ</span>
                                            <span>' .$rows["tour_sale_off"]. ' VNĐ</span>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>';
            }
         $output .='<div class="pagination" onclick="abc(' .$tour_id. ')"><span class="viewdetail">Xem thêm</span></div>';
        echo $output; 
        }
        
    }
?>
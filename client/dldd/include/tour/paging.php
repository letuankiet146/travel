<?php
    include("../../admin/connectDB.php");
    $type = (string)$_GET['type'];
    if($type == 'list1'){
        paging("AND tour_charge > 0",1);
    }
    if($type == 'list2'){
        paging("AND tour_charge = 0",2);
    }
    if($type == 'list3'){
        paging("AND tour_booked >= 10",3);
    }
    if($type == 'list4'){
        paging("AND a.arrive_place_area_id = 1",4);
    }

function paging($dieukien,$str){
    $id = $_POST['last_tour_id'];
        $output = '';  
        $tour_id = '';  
        sleep(1);
        $sql = "SELECT * FROM tour t join arrive_place a on t.tour_arrive_place_id=a.arrive_place_id WHERE tour_delete_date is null AND tour_active=1 $dieukien  AND  tour_id < $id  ORDER BY tour_id DESC LIMIT 2";
        $query = mysql_query($sql);
        if(mysql_num_rows($query) > 0){
            while($rows = mysql_fetch_array($query)){
            $tour_sale = number_format($rows["tour_sale_off"]);
            $tour_charge = number_format($rows["tour_charge"]);
            $day_start = $rows['tour_day_start'];
            $fday_start = date("d/m/Y", strtotime($day_start));
            $day_end = strtotime($rows['tour_day_end']);
            $day_start = strtotime($rows['tour_day_start']);
            $diff=($day_end - $day_start)/(60*60*24);
            $tour_id = $rows['tour_id'];
            $output .='<div class="item">
                            <div class="i_item">
                                <div class="i-images">
                                    <a href="index.php?page=chi-tiet-tour&tour_id=' .$rows["tour_id"]. '">
                                        <img src="' .$rows["tour_image_data"]. '" alt="#" />
                                        <div class="see_details">Xem chi tiết</div>
                                    </a>
                                </div>
                                <div class="i-description">
                                    <div class="i-title">
                                        <a href="index.php?page=chi-tiet-tour&tour_id=' .$rows["tour_id"]. '">' .$rows["tour_name"]. '</a>
                                    </div>
                                    <div class="fl">
                                        <div class="i-content">
                                            <div><i class="fa fa-clock-o" aria-hidden="true"></i> ' .$diff. ' ngày </div>
                                            <div><i class="fa fa-calendar" aria-hidden="true"></i> ' .$fday_start. '</div>
                                        </div>
                                    </div>
                                    <div class="fr">
                                        <div class="i-content">
                                        <span>';
                                        if($rows["tour_charge"] != 0){
                                            $output .= $tour_charge. ' VNĐ';
                                        }
                                            $output .='</span><span>' .$tour_sale. ' VNĐ</span>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>';
            }
         $output .="<div class='pagination' onclick='load_paging(" .$tour_id. "," .$str. ")'><span class='viewdetail'>Xem thêm</span></div>";
        echo $output; 
    }
}
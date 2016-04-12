
<?php
    // ========== lấy danh sách tour liên quan
	function dsTour_involve(){
		$id = $_GET['tour_id'];
		$sql = "SELECT tour_arrive_place_id FROM tour WHERE tour_id = " . $id;
		$query = mysql_query($sql);
		$row = mysql_fetch_array($query);
		$arrive_id = $row['tour_arrive_place_id'];

		$sql = "SELECT * FROM tour WHERE tour_delete_date is null AND tour_arrive_place_id = " . $arrive_id . " ORDER BY tour_id DESC";
		$query = mysql_query($sql);
		while($rows = mysql_fetch_array($query)){ ?>
			<div class="item" id="item0">
				<div class="i-images">
                    <a href="index.php?page=chi-tiet-tour&tour_id=<?php echo $rows['tour_id']; ?>">
                    	<img src="<?php echo $rows['tour_image_data']; ?>" alt="<?php echo $rows['tour_name']; ?>" />
                    </a>
                </div>
                <div class="i-description">
                    <div class="i-title">
                       <a href="index.php?page=chi-tiet-tour&tour_id=<?php echo $rows['tour_id']; ?>"><?php echo $rows['tour_name']; ?></a>
                    </div>
                    <div class="fl">
                        <div class="i-content">
                            Giá 1 khách: <span><?php echo $rows['tour_sale_off']; ?></span>
                        </div>
                    </div>
                    <div class="fr">
                        <a class="viewdetail" href="chi-tiet-tour.php?tour_id=<?php echo $rows['tour_id']; ?>">Xem chi tiết</a>
                    </div>
                    <div class="clear"></div>
                </div>
			</div>
        <?php }
	}

    // ========== lấy danh sách tour liên quan
	function dsDiaDiem($area){
		$sql="SELECT * FROM arrive_place WHERE arrive_place_delete_date is null AND arrive_place_area_id= " . $area;
        $query = mysql_query($sql);
        while($rows_arrive = mysql_fetch_array($query)){
            echo '<li><a href="#">Tour du lịch '.$rows_arrive["arrive_place_name"].'</a></li>';
        }
	}

    // ========== lấy ma don hang random
    function madonhang(){
        $sql="SELECT form_order_id FROM form_order ORDER BY form_order_id DESC";
        $query = mysql_query($sql);
        $rows_arrive = mysql_fetch_array($query);
        $maDH = $rows_arrive['form_order_id']+1;
        echo $maDH;
    }

    // ========== lấy ma khách hang random
    function makhachhang(){
        $sql="SELECT customer_id FROM customer ORDER BY customer_id DESC";
        $query = mysql_query($sql);
        $rows = mysql_fetch_array($query);
        $maKH = $rows['customer_id']+1;
        echo $maKH;
    }

    // ========== lấy danh sách tour liên quan
    function dsTour($dieukien,$str){
        $sql = "SELECT * FROM tour t join arrive_place a on t.tour_arrive_place_id=a.arrive_place_id WHERE tour_delete_date is null AND tour_active=1 $dieukien ORDER BY tour_id DESC LIMIT 2";
        $query = mysql_query($sql);
        $tour_id = '';
        ?>
        <div class="grid-tour">
            <?php while($rows = mysql_fetch_array($query)){ 
                $day_start = $rows['tour_day_start'];
                $fday_start = date("d/m/Y", strtotime($day_start));
                $day_end = strtotime($rows['tour_day_end']);
                $day_start = strtotime($rows['tour_day_start']);
                $diff=($day_end - $day_start)/(60*60*24);
            ?>
            <div class="item">
                <div class="i_item">
                    <div class="i-images">
                        <a href="index.php?page=chi-tiet-tour&tour_id=<?php echo $rows['tour_id']; ?>">
                            <img src="<?php echo $rows['tour_image_data'] ?>" alt="#" />
                            <div class="see_details">Xem chi tiết</div>
                        </a>
                    </div>
                    <div class="i-description">
                        <div class="i-title">
                            <a href="index.php?page=chi-tiet-tour&tour_id=<?php echo $rows['tour_id']; ?>"><?php echo $rows['tour_name'] ?></a>
                        </div>
                        <div class="fl">
                            <div class="i-content">
                                <div><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $diff ?> ngày </div>
                                <div><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $fday_start ?></div>
                            </div>
                        </div>
                        <div class="fr">
                            <div class="i-content"> 
                                <span><?php if($rows['tour_charge'] > 0){ echo number_format ($rows['tour_charge'],0,'',',');echo ' VNĐ';} ?></span>
                                <span><?php  echo number_format ($rows['tour_sale_off'],0,'',','); ?> VNĐ</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <?php
                $tour_id = $rows['tour_id'];
            } ?>
            <!--=======NAV-PAG======-->
            <div class="pagination" onclick="load_paging(<?php echo $tour_id; ?>,<?php echo $str; ?>)"><span class="viewdetail">Xem thêm</span></div>
            <!--=======NAV-PAG======-->
        </div>
    <?php }
?>
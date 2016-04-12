
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
                    <a href="chi-tiet-tour.php?tour_id=<?php echo $rows['tour_id']; ?>">
                    	<img src="<?php echo $rows['tour_image_data']; ?>" alt="<?php echo $rows['tour_name']; ?>" />
                    </a>
                </div>
                <div class="i-description">
                    <div class="i-title">
                       <a href="chi-tiet-tour.php?tour_id=<?php echo $rows['tour_id']; ?>"><?php echo $rows['tour_name']; ?></a>
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

    // ========== lấy danh sách tour liên quan
    function dsTourGiamGia(){
        $sql = "SELECT * FROM tour WHERE tour_delete_date is null AND tour_active=1 AND tour_charge > 0 ORDER BY tour_id DESC LIMIT 2";
        $query = mysql_query($sql);
        $tour_id = '';
        ?>
        <div class="grid-tour">
            <?php while($rows = mysql_fetch_array($query)){ 
                $day_start = $rows['tour_day_start'];
                $fday_start = date("d/m/Y", strtotime($day_start));
            ?>
            <div class="item">
                <div class="i_item">
                    <div class="i-images">
                        <a href="chi-tiet-tour.php?tour_id=<?php echo $rows['tour_id']; ?>">
                            <img src="<?php echo $rows['tour_image_data'] ?>" alt="#" />
                            <div class="see_details">Xem chi tiết</div>
                        </a>
                    </div>
                    <div class="i-description">
                        <div class="i-title">
                            <a href="chi-tiet-tour.php?tour_id=<?php echo $rows['tour_id']; ?>"><?php echo $rows['tour_name'] ?></a>
                        </div>
                        <div class="fl">
                            <div class="i-content">
                                <div><i class="fa fa-clock-o" aria-hidden="true"></i> 5 ngày </div>
                                <div><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $fday_start ?></div>
                            </div>
                        </div>
                        <div class="fr">
                            <div class="i-content"> 
                                <span><?php echo number_format ($rows['tour_charge'],0,'',','); ?> VNĐ</span>
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
            <div class="pagination" onclick="abc(<?php echo $tour_id; ?>)"><span class="viewdetail">Xem thêm</span></div>
        </div>
        <!--=======NAV-PAG======-->
        
        <!--=======NAV-PAG======-->
    <?php }
?>
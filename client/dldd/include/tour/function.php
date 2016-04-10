
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
?>
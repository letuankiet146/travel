<?php 
	include("../models/list-tour.php");
	$type = (string)$_GET["type"];
	//=================================================
	//Hàm xử lý khi nhấn nut btnPrevious
	//=================================================
	if($type == "count"){
		$items = (int)$_GET["items"];
		$sql= "SELECT COUNT(tour_id) FROM tour WHERE tour_delete_date is null";
		$result = mysql_query($sql,$con);
		$totalItem = mysql_result($result, 0);
		$total = array("total" => 0);
		$pages = $totalItem/$items;
		$tmp = explode(".", $pages);
		if(count($tmp)>1){
			$pages = $tmp[0] + 1;
		}else{
			$pages = $tmp[0];
		}
		$total["total"] = $pages;
		echo json_encode($total);
	}
 
	//=================================================
	// lấy các phần tử trang hiện thời
	//=================================================
	if($type == "list"){
		$items = (int)$_POST["items"];
		$currentPage = (int)$_POST["currentPage"];
		$offset = ($currentPage - 1) * $items;
		$sql = "SELECT * FROM tour t join status s on t.tour_active=s.status_id WHERE t.tour_delete_date is null ORDER BY tour_id DESC LIMIT " . $offset . "," . $items ."";
		$result = mysql_query($sql,$con);
		$tours = array();
		while($row = mysql_fetch_assoc($result)){
			$tours[] = $row;
		}
		print_r($tour);
		echo json_encode($tours);
	}

	//=================================================
	// lấy 1 phan tu id cuối cùng
	//=================================================
	if($type == "one"){
		$lastID = (int)$_GET["id"];
		$sql = "SELECT * FROM tour t join status s on t.tour_active=s.status_id where tour_id < " . $lastID . " AND tour_delete_date is null ORDER BY tour_id DESC LIMIT 1";
		$result = mysql_query($sql,$con);
		$tour = array();
		$tour = mysql_fetch_assoc($result);
		echo json_encode($tour);
	}

	//=================================================
	// Xóa dữ liệu theo mảng (ARRAY)
	//=================================================
	if($type == "chk"){
		$chk=$_POST['chk'];
		$array = explode(",", $chk);
		$count = count($array);
		$today = Date("Y-m-d");
	    foreach($array as $vl)
	    {
	        $sql = "UPDATE tour SET tour_delete_date = '$today' where tour_id=$vl";
	        mysql_query($sql,$con);
	    }
	}

	//=================================================
	// select địa điểm đến
	//=================================================
	if($type == "arrive"){
		$area_id = (int)$_POST["areaIdDto"];
		$sql = "SELECT * FROM arrive_place where arrive_place_area_id = " . $area_id;
		$result = mysql_query($sql,$con);
		$arrives = array();
		while($row = mysql_fetch_assoc($result)){
			$arrives[] = $row;
		}
		echo json_encode($arrives);
	}
?>
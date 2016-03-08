<?php 
	include("../models/list-tour.php");
	$type = (string)$_GET["type"];
	//=================================================
	//Hàm xử lý khi nhấn nut btnPrevious
	//=================================================
	if($type == "count"){
		$items = (int)$_GET["items"];
		$sql= "SELECT COUNT(tour_id) FROM tour";
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
		$sql = "SELECT * FROM tour t join status s on t.tour_active=s.status_id ORDER BY tour_id DESC LIMIT " . $offset . "," . $items ."";
		$result = mysql_query($sql,$con);
		$tours = array();
		while($row = mysql_fetch_assoc($result)){
			$tours[] = $row;
		}
		echo json_encode($tours);
	}

	//=================================================
	// lấy 1 phan tu id cuối cùng
	//=================================================
	if($type == "one"){
		$lastID = (int)$_GET["id"];
		$sql = "SELECT * FROM tour where tour_id < " . $lastID . " ORDER BY tour_id DESC LIMIT 1";
		$result = mysql_query($sql,$con);
		$tour = array();
		$tour = mysql_fetch_assoc($result);
		echo json_encode($tour);
	}

	//=================================================
	// Xóa dữ liệu
	//=================================================
	if($type == "delete"){
		$tour_id = (int)$_GET["id"];
		$sql = "DELETE FROM tour where tour_id = " . $tour_id;
		$result = mysql_query($sql,$con);
	}

	//=================================================
	// Update thông tin
	//=================================================
	if($type == "update"){
		$lastID = (int)$_GET["id"];
		$sql = "SELECT * FROM tour t join from_place f on t.tour_from_place_id=f.from_place_id join guider g on t.tour_guider_id=g.guider_id join arrive_place a on t.tour_arrive_place_id=a.arrive_place_id where tour_id = " . $lastID;
		$result = mysql_query($sql,$con);
		$tour = array();
		$tour = mysql_fetch_assoc($result);
		echo json_encode($tour);
	}

	//=================================================
	// Update status
	//=================================================
	if($type == "updateStatus"){
		$tour_id = (int)$_POST["tour_id"];
		$status = (int)$_POST['status'];
		$sql = "UPDATE tour SET tour_active=" . $status . " WHERE tour_id=" . $tour_id;
		$result = mysql_query($sql,$con);
		$tour = mysql_fetch_assoc($result);
		echo json_encode($tour);
	}
?>
<?php 
	include("../models/list-tour.php");
	$type = (string)$_GET["type"];
	//=================================================
	//Hàm xử lý khi nhấn nut btnPrevious
	//=================================================
	if($type == "count"){
		$items = (int)$_GET["items"];
		$sql= "SELECT COUNT(form_order_id) FROM form_order WHERE form_order_delete_date is null";
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
		$sql = "SELECT * FROM form_order f join customer c on f.form_order_customer_id=c.customer_id join tour t on f.form_order_tour_id=t.tour_id join status st on f.form_order_isPay=st.status_id join group_users g on c.customer_group=g.group_users_id WHERE f.form_order_delete_date is null ORDER BY f.form_order_id DESC LIMIT " . $offset . "," . $items ."";
		$result = mysql_query($sql,$con);
		$orders = array();
		while($row = mysql_fetch_assoc($result)){
			$orders[] = $row;
		}
		echo json_encode($orders);
	}

	//=================================================
	// lấy 1 phan tu id cuối cùng
	//=================================================
	if($type == "one"){
		$lastID = (int)$_GET["id"];
		$sql = "SELECT * FROM tour where tour_id < " . $lastID . " AND tour_delete_date is null ORDER BY tour_id DESC LIMIT 1";
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
	// Xóa dữ liệu theo mảng (ARRAY)
	//=================================================
	if($type == "chk"){
		$chk=$_POST['chk'];//dem so phan tu
		$array = explode(",", $chk);
		$count = count($array);
	    foreach($array as $vl)
	    {
	        $sql="DELETE FROM tour where tour_id=$vl";
	        mysql_query($sql);
	    }
	}

	//=================================================
	// lấy 1 phần tử theo form_order_id
	//=================================================
	if($type == "updateOrder"){
		$itemID = (int)$_POST["itemID"];
		$sql = "SELECT * FROM form_order f join customer c on f.form_order_customer_id=c.customer_id join tour t on f.form_order_tour_id=t.tour_id join status st on f.form_order_isPay=st.status_id WHERE f.form_order_id = " . $itemID;
		$result = mysql_query($sql,$con);
		$orders = array();
		$orders = mysql_fetch_assoc($result);
		echo json_encode($orders);
	}

?>
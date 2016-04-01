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
		$sql = "SELECT * FROM form_order f join customer c on f.form_order_customer_id=c.customer_id join tour t on f.form_order_tour_id=t.tour_id join status st on f.form_order_is_pay=st.status_id join group_users g on c.customer_group=g.group_users_id WHERE f.form_order_delete_date is null ORDER BY f.form_order_id DESC LIMIT " . $offset . "," . $items ."";
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
		$sql = "SELECT * FROM form_order f join customer c on f.form_order_customer_id=c.customer_id join tour t on f.form_order_tour_id=t.tour_id join status st on f.form_order_is_pay=st.status_id join group_users g on c.customer_group=g.group_users_id where f.form_order_id < " . $lastID . " ORDER BY form_order_id DESC LIMIT 1";
		$result = mysql_query($sql,$con);
		$order = array();
		$order = mysql_fetch_assoc($result);
		echo json_encode($order);
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
	        $sql = "UPDATE form_order SET form_order_delete_date = '$today' where form_order_id=$vl";
	        mysql_query($sql,$con);
	    }
	}

?>
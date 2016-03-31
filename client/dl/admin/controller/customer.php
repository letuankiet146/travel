<?php  
	include("../models/list-tour.php");
	$type = (string)$_GET["type"];
	//=================================================
	//Hàm xử lý khi nhấn nut btnPrevious
	//=================================================
	if($type == "count"){
		$items = (int)$_GET["items"];
		$sql= "SELECT COUNT(customer_id) FROM customer WHERE customer_delete_date is null";
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
		$sql = "SELECT * FROM customer c join group_users g on c.customer_group=g.group_users_id WHERE c.customer_delete_date is null ORDER BY c.customer_id DESC LIMIT " . $offset . "," . $items ."";
		$result = mysql_query($sql,$con);
		$customers = array();
		while($row = mysql_fetch_assoc($result)){
			$customers[] = $row;
		}
		echo json_encode($customers);
	}
?>
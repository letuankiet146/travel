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

	//=================================================
	// lấy 1 phan tu id cuối cùng
	//=================================================
	if($type == "one"){
		$lastID = (int)$_GET["id"];
		$sql = "SELECT * FROM customer c join group_users g on c.customer_group=g.group_users_id where customer_id < " . $lastID . " AND customer_delete_date is null ORDER BY customer_id DESC LIMIT 1";
		$result = mysql_query($sql,$con);
		$customer = array();
		$customer = mysql_fetch_assoc($result);
		echo json_encode($customer);
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
	        $sql = "UPDATE customer SET customer_delete_date = '$today' where customer_id=$vl";
	        mysql_query($sql,$con);
	    }
	}
?>
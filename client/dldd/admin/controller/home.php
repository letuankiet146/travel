<?php 
	include("../models/list-tour.php");
	$type = (string)$_GET["type"];
	//=================================================
	//Hàm xử lý khi nhấn nut btnPrevious
	//=================================================
	if($type == "count"){
		$items = (int)$_GET["items"];
		$sql= "SELECT COUNT(id) FROM history WHERE delete_date is null";
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
		$sql = "SELECT * FROM history h join staff s on h.user=s.staff_id WHERE h.delete_date is null ORDER BY id DESC LIMIT " . $offset . "," . $items ."";
		$result = mysql_query($sql,$con);
		$historys = array();
		while($row = mysql_fetch_assoc($result)){
			$historys[] = $row;
		}
		echo json_encode($historys);
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
	        $sql = "UPDATE history SET delete_date = '$today' where id=$vl";
	        mysql_query($sql,$con);
	    }
	}

?>
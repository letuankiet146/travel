<?php
    include('../admin/connectDB.php');
    // ========== lấy danh sách tour liên quan
	function getOneTour($id){
		$sql = "SELECT * FROM tour t join arrive_place a on t.tour_arrive_place_id=a.arrive_place_id WHERE tour_id = " . $id;
		$query = mysql_query($sql);
		$row = mysql_fetch_array($query);
		return $row;
	}

    // ========== lấy danh sách tour liên quan
	function dsDiaDiem($area){
		$sql="SELECT * FROM arrive_place WHERE arrive_place_delete_date is null AND arrive_place_area_id= " . $area;
        $query = mysql_query($sql);
        $output = array();
        while($rows = mysql_fetch_array($query)){
            $output[] = $rows;
        }
        return $output;
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
    function dsTour($num, $lastID, $arrive){
        $sql = "SELECT * FROM tour t join arrive_place a on t.tour_arrive_place_id=a.arrive_place_id WHERE t.tour_delete_date is null AND t.tour_active=1";
        if(!empty($lastID)){
            $sql .=" AND t.tour_id < '$lastID'";
        }
        if(!empty($num)){
            switch ($num) {
                case '1':
                    $sql .=" AND a.arrive_place_area_id = 1";break;
                case '2':
                    $sql .=" AND a.arrive_place_area_id = 2";break;
                case '3':
                    $sql .="";break;
                case '4':
                    $sql .=" AND t.tour_charge > 0";break;
                case '5':
                    $sql .=" AND t.tour_charge = 0";break;
                default: break;
            }
        }
        if(!empty($arrive)){
            $sql .= " AND t.tour_arrive_place_id = '$arrive'";
        }
        $sql .= " ORDER BY tour_id DESC LIMIT 2";
        $query = mysql_query($sql);
        $count = mysql_num_rows($query);
        if($count > 0){
            $output = array();
            while($rows = mysql_fetch_array($query)){
                $output[] = $rows;
            }
            return $output;
        }
        return 0;
    }


    // ========== lấy danh sách đia điểm xuất phát
    function listFromPlace(){
        $sql = "SELECT * FROM from_place WHERE from_place_delete_date is null";
        $query = mysql_query($sql);
        $output = array();
        while($rows=mysql_fetch_array($query)){
            $output[]=$rows;
        }
        return $output;
    }

    // ========== lấy danh sách đia điểm đến
    function listArrivePlace($area_id){
        $sql = "SELECT * FROM arrive_place WHERE arrive_place_delete_date is null AND arrive_place_area_id = ".$area_id."";
        $query = mysql_query($sql);
        $output ='';
        $output .= '<option value="">-Nơi đến-</option>';
        while($rows=mysql_fetch_array($query)){
            $output .= '<option value="'.$rows['arrive_place_id'].'">'.$rows['arrive_place_name'].'</option>';
        }
        return $output;
    }

    // ========tìm kiếm theo chọn lọc
    function selectSearch($area, $from, $to, $time, $price, $keyword, $lastID){
        if(empty($keyword)){
            $sql = "SELECT * FROM tour t join arrive_place a on t.tour_arrive_place_id=a.arrive_place_id WHERE t.tour_delete_date is null AND t.tour_active=1 AND a.arrive_place_area_id = '$area' AND t.tour_from_place_id ='$from' ";
            if(!empty($to)){$sql .= "AND t.tour_arrive_place_id = '$to'";}
            if(!empty($time)){$sql .= "AND t.tour_day_start like '%$time%'";}
            if(!empty($price)){
                switch ($price) {
                    case '1':
                        $sql .= "AND t.tour_sale_off < 1000000";break;
                    case '2':
                        $sql .= "AND t.tour_sale_off BETWEEN  1000000 AND 2000000";break;
                    case '3':
                        $sql .= "AND t.tour_sale_off BETWEEN  2000000 AND 4000000";break;
                    case '4':
                        $sql .= "AND t.tour_sale_off BETWEEN  4000000 AND 6000000";break;
                    case '5':
                        $sql .= "AND t.tour_sale_off BETWEEN  6000000 AND 10000000";break;
                    case '6':
                        $sql .= "AND t.tour_sale_off > 10000000";break;
                }
            }
        }
        if(!empty($keyword)){
            $sql = "SELECT t.*, a.arrive_place_name FROM tour t, arrive_place a WHERE (match(t.tour_name) against('$keyword') OR match(t.tour_infor) against('$keyword') OR match(a.arrive_place_name) against('$keyword')) AND t.tour_delete_date is null AND t.tour_active=1 AND t.tour_arrive_place_id=a.arrive_place_id";
        }
        if(!empty($lastID)){
            $sql .= " AND t.tour_id < '$lastID'";
        }
        $sql .= " ORDER BY t.tour_id DESC LIMIT 4";
        $query = mysql_query($sql);
        $count = mysql_num_rows($query);
        if($count > 0){
            $tours = array();
            while ($rows = mysql_fetch_array($query)) {
                $tours[] = $rows;
            }
            return $tours;
        }
        return 0; 
    }

    $type = (string)$_GET['type'];
    if($type == 'listPlace'){
        $id = (int)$_GET["area_id"];
        echo listArrivePlace($id);
    }
?>
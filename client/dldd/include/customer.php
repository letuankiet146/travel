<?php
    include('../admin/connectDB.php');
    function listOrdersMore($id,$limit){
    	$sql = "SELECT * FROM form_order f join tour t on f.form_order_tour_id=t.tour_id join status s on f.form_order_is_pay=s.status_id WHERE f.form_order_customer_id = " . $id . " ORDER BY f.form_order_id DESC";
        if(!empty($limit)){
            $sql .= " LIMIT $limit";
        }
    	$query = mysql_query($sql);
        $count = mysql_num_rows($query);
        if($count > 0){
        	$orders = array();
        	while ($rows = mysql_fetch_array($query)) {
        		$orders[]=$rows;
        	}
        	return $orders;
        }
        return "";
    }

    function listOrdersOne($id){
        $sql = "SELECT * FROM form_order f join tour t on f.form_order_tour_id=t.tour_id join status s on f.form_order_is_pay=s.status_id join from_place fp on t.tour_from_place_id=fp.from_place_id WHERE f.form_order_id = " .$id. "";
        $query = mysql_query($sql);
        $orders = array();
        $rows = mysql_fetch_array($query);
            $orders[]=$rows;
        return $orders;
    }

    function listCustomersOne($id){
        $sql = "SELECT * FROM customer c join group_users g on c.customer_group=g.group_users_id WHERE c.customer_id = " .$id. "";
        $query = mysql_query($sql);
        $customer = array();
        $rows = mysql_fetch_array($query);
            $customer[]=$rows;
        return $customer;
    }
?>
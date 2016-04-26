<?php
    include('../admin/connectDB.php');
    function listHandBock($id,$limit){
    	$sql = "SELECT * FROM hand_book where status = 7 ";
        if(!empty($id)){
            $sql .="AND id = '$id'";
        }
        if(!empty($limit)){
            $sql .="ORDER BY id DESC LIMIT $limit";
        }
        if(empty($id) && empty($limit)){
            $sql .="ORDER BY id DESC";
        }
    	$query = mysql_query($sql);
    	$handbook = array();
    	while($rows = mysql_fetch_assoc($query)){
    		$handbook[]=$rows;
    	}
    	return $handbook;
    }
?>
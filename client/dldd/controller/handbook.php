<?php 
	include('../model/handbook.php');
	$type = (string)$_GET['type'];

	if($type == "list"){
		echo json_encode(listHandBock());
	}
?>
<?php 
			$con=mysql_connect("localhost","root","");
			if(!$con)
			{
			die('could not connect'. mysql_error());
			}
			mysql_select_db("sql61036294",$con);
			mysql_set_charset("utf8",$con);	
            error_reporting(0);
?>
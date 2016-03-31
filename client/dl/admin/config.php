<?php 
			$con=mysql_connect("sql6.freemysqlhosting.net","sql6103629","pC9FKdykpj");
			if(!$con)
			{
			die('Lỗi kết nối cơ sở dữ liệu'. mysql_error());
			}
			mysql_select_db("sql6103629",$con) or die("Lỗi kết nối database");
			mysql_set_charset("utf8",$con);	
            error_reporting(0);
?>
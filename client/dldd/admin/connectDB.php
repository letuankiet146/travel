<?php 
			$con=mysql_connect("localhost:3307","root","root");
			if(!$con)
			{
			die('Lỗi kết nối cơ sở dữ liệu'. mysql_error());
			}
			mysql_select_db("sql61036294",$con) or die("Lỗi kết nối database");
			mysql_set_charset("utf8",$con);	
            error_reporting(0);
?>
<?php 
			// $con=mysql_connect("phongbv.ddns.net:3306","root","123789");
			// if(!$con)
			// {
			// die('Lỗi kết nối cơ sở dữ liệu'. mysql_error());
			// }
			// mysql_select_db("sql61036294",$con) or die("Lỗi kết nối database");
			// mysql_set_charset("utf8",$con);	
   //          error_reporting(0);
?>
<meta charset="utf-8">
<?php 
	include("../models/login.php");
	/*===============================
	*------Xử lý đăng nhập
	*=================================*/
	if(isset($_POST['login'])){
		$sql="SELECT * FROM staff where staff_user = '".$_POST['username']."' and staff_password = '".$_POST['password']."'";
		$query = mysql_query($sql);
		$result = mysql_fetch_array($query);
		if($result < 1){
			echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu!');</script>";
	 		echo"<script>document.location.href='../index.php' </script>";
		}
		else{
			session_start();
			$_SESSION['id'] = $result['staff_id'];
			$_SESSION['username'] = $result['staff_name'];
			$_SESSION['level'] = $result['staff_level'];
			echo "<script>document.location.href='../index.php'</script>";
		}
	}
	if(isset($_GET['thoat']))
	{
		session_start();
		unset($_SESSION['username']);	
		unset($_SESSION['level']);
		echo "<script>alert('Đã thoát khỏi hệ thống!!!');</script>";
		echo"<script>document.location.href='../index.php' </script>";
	}
	include("../views/login.php");

?>
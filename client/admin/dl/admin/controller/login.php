<meta charset="utf-8">
<?php 
	include("../models/login.php");
	/*===============================
	*------Xử lý đăng nhập
	*=================================*/
	if(isset($_POST['login'])){
		$sql="SELECT * FROM account where account_user = '".$_POST['username']."' and account_password = '".$_POST['password']."'";
		$query = mysql_query($sql);
		$result = mysql_fetch_array($query);
		if($result < 1){
			echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu!');</script>";
	 		echo"<script>document.location.href='../index.php' </script>";
		}
		else{
			session_start();
			$sql="SELECT * FROM account a join staff s on a.account_id = s.staff_account_id";
			$query = mysql_query($sql);
			$rows = mysql_fetch_array($query);
			$_SESSION['username'] = $rows['staff_name'];
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
	include("../views/login.phtml");

?>
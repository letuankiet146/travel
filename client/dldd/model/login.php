<meta charset="utf-8">
<?php 
	include('../admin/connectDB.php');
	/*===============================
	*------Xử lý đăng nhập
	*=================================*/
	if(isset($_POST['login'])){
		$password = md5($_POST['password']);
		$sql="SELECT * FROM customer c join group_users g on c.customer_group=g.group_users_id where customer_email = '".$_POST['email']."' and customer_password = '".$password."' AND c.customer_delete_date is null";
		$query = mysql_query($sql);
		$result = mysql_fetch_array($query);
		if($result < 1){
			echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu!');</script>";
	 		echo "<script>window.location.href='http://localhost/dldd/index.php?page=dang-nhap'</script>";
		}
		else{
			session_start();
			$_SESSION['id'] = $result['customer_id'];
			$_SESSION['name'] = $result['customer_name'];
			$_SESSION['group'] = $result['customer_group'];
			echo "<script>window.location.href='http://localhost/dldd/index.php?page=khach-hang' </script>";
		}
	}
	if(isset($_GET['thoat']))
	{
		session_start();
		unset($_SESSION['name']);	
		unset($_SESSION['group']);
		echo"<script>document.location.href='../index.php?page=trang-chu' </script>";
	}
	echo "<script>window.location.href='http://localhost/dldd/index.php?page=dang-nhap' </script>";
?>
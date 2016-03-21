<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
session_start();
if(isset($_SESSION['username']))
{
	include 'config.php';
	$sql="SELECT * FROM staff where staff_name = '".$_SESSION['username']."'";
	$query = mysql_query($sql);
	$user = mysql_fetch_array($query);
	$id = $user['staff_id'];
	function admin(){
		if($_SESSION['level'] == 1){
			return true;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Trang quản trị</title>
	<!-- MODULE TOAN TRANG -->
	<link rel="stylesheet" type="text/css" href="style/font/fontawesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="style/screen.css" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/click.js"></script>
	<!-- DATEPICKER -->
	<link rel="stylesheet" type="text/css" href="js/datepicker/datepicker.css" />
	<script type="text/javascript" src="js/datepicker/datepicker.js"></script>
	<!-- MODULE MAIN -->
	<!-- ORDER_TOUR -->
<?php 
	$paged = $_GET['page'];
	if($paged == "order-tour"){ ?>
	<link rel="stylesheet" type="text/css" href="style/order/order.css" />
	<script type="text/javascript" src="js/order-tour/paging.js"></script>
<?php } ?>
<!-- LIST_TOUR -->
<?php if($paged == "list-tour"){ ?>
	<script type="text/javascript" src="js/list-tour/paging.js"></script>
	<!-- MODULE MAIN -->
	<link rel="stylesheet" type="text/css" href="style/tour/tour.css" />
	<!--<script type="text/javascript" > var sodong = 8;</script>-->
	<script type="text/javascript" src="js/list-tour/add-tour.js"></script>
<?php } ?>
</head>
<body>
<div class="ad-wrapper">
	<!-- HEADER -->
	<div id="header">
		<div class="header-inner">
			<div class="header-title"><a href="index.php?page=home">Website Admin</a></div>
			<div class="header-section">
				<div class="section-inner">
					<div class="box-count">
						<ul>
							<li><a href=""><i class="fa fa-file-text"></i>Đơn đặt tour ( <span class="black">532</span> ) <span class="num">26</span></a></li>
							<li><a href=""><i class="fa fa-file-text"></i>Khách hàng ( <span class="black">532</span> ) <span class="num">26</span></a></li>
							<li><a href=""><i class="fa fa-file-text"></i>Tour thực hiện ( <span class="black">532</span> ) <span class="num">26</span></a></li>
						</ul>
					</div>
					<div class="profile-box">
						<span class="profile">
							<a href="" class="section">
								<img class="img" src="images/img1.png" alt="" />
								<span class="text-box">
									Xin chào
									<strong class="name"><?php echo $_SESSION['username']; ?></strong>
									<input type="hidden" id="idUserAdd" name="idUserAdd" value="<?php echo $id; ?>" />
							</a>
							<a class="opener" href="#"><i class="fa fa-caret-down"></i></a>
							<ul class="profile-menu">
								<li><a href="">Thông tin tài khoản</a></li>
								<li><a href="controller/login.php?thoat">Đăng xuât</a></li>
							</ul>
						</span>
						<div class="clear"></div>
					</div>
				</div>
			<div class="clear"></div>
		</div>
		</div>
	</div>
	<!-- HEADER -->
	<!-- CONTENT -->
	<div class="main">
		<!-- MAIN-LEFT -->
		<div class="main-left">
			<div class="box-menu">
				<ul>
					<li class="menu">
						<a href="#" class="title-order">Đơn đặt tour <i class="fa fa-caret-square-o-down"></i></a>
						<ul class="menu-child">
							<li><a href="index.php?page=order-tour"><i class="fa fa-list-alt"></i>Danh sách đơn đặt tour</a></li>
							<li><a href=""> <i class="fa fa-envelope-o"></i> Tin nhắn từ khách hàng</a></li>
							<li><a href=""><i class="fa fa-print"></i></i> Xuất báo cáo</a></li>
						</ul>
					</li>
					<li class="menu">
						<a href="#" class="title-order">Quản lý tour <i class="fa fa-caret-square-o-down"></i></a>
						<ul class="menu-child">
							<li><a href="index.php?page=list-tour"><i class="fa fa-list-alt"></i>Danh sách tour</a></li>
							<li><a href=""><i class="fa fa-list-alt"></i>Danh sách địa điểm</a></li>
							<li><a href=""><i class="fa fa-list-alt"></i>Danh sách khách sạn</a></li>
						</ul>
					</li>
					<?php if(admin()){ ?>
					<li class="menu">
						<a href="#" class="title-order">Quản lý nhân sự<i class="fa fa-caret-square-o-down"></i></a>
						<ul class="menu-child">
							<li><a href=""><i class="fa fa-list-alt"></i>Danh sách nhân viên</a></li>
							<li><a href=""><i class="fa fa-bell"></i>Thông báo đến nhân viên</a></li>
							<li><a href=""><i class="fa fa-lock"></i>Phân quyền nhân viên</a></li>
						</ul>
					</li>
					<?php } ?>
					<li class="menu">
						<a href="#" class="title-order">Khách hàng<i class="fa fa-caret-square-o-down"></i></a>
						<ul class="menu-child">
							<li><a href="index.php?page=customer"><i class="fa fa-usd"></i>Danh sách khách hàng</a></li>
							<li><a href="index.php?page=contact"><i class="fa fa-compress"></i>Liên hệ từ khách hàng</a></li>
							<li><a href=""><i class="fa fa-users"></i>Nhóm khách hàng</a></li>
						</ul>
					</li>
					<li class="menu">
						<a href="#" class="title-order">Hệ thống<i class="fa fa-caret-square-o-down"></i></a>
						<ul class="menu-child">
							<li><a href=""><i class="fa fa-sliders"></i>Quản lý sideshow ảnh</a></li>
							<li><a href=""><i class="fa fa-link"></i>Link liên kết</a></li>
							<li><a href=""><i class="fa fa-support"></i>Hỗ trợ trực tuyến</a></li>
						</ul>
					</li>
					<li class="menu">
						<a href="#" class="title-order">Tin tức<i class="fa fa-caret-square-o-down"></i></a>
						<ul class="menu-child">
							<li><a href=""><i class="fa fa-credit-card"></i> Tin tức - sự kiện</a></li>
							<li><a href=""><i class="fa fa-info-circle"></i>Ý kiến khách hàng</a></li>
							<li><a href=""><i class="fa fa-external-link"></i></i>Câm nang du lịch</a></li>
						</ul>
					</li>
					<li class="menu">
						<p><em>Copyright &copy; 2015: </em><strong> CT DL ĐÔNG DƯƠNG</strong></p>
						<p><em>Thiết kế web: </em><strong>Nhóm đồ án Thảo &#38; Kiệt</strong></p>
					</li>
				</ul>
			</div>
		</div> 
		<!-- MAIN-LEFT -->
		<!-- MAIN-RIGHT -->
		<div class="main-right">
			<div class="right">
				<?php 
					$page="";
					if(isset($_GET['page'])){
						$page = $_GET['page'];
						switch ($page) {
							case 'home':include("views/home.php");break;
							case 'order-tour':include("views/order-tour/order-tour.php");break;
							case 'list-tour':include("views/list-tour/list-tour.php");break;
							case 'edit-tour':include("views/list-tour/edit-tour.php");break;
							case 'customer':include("views/customer/customer.php");break;
							case 'edit-customer':include("views/customer/edit-customer.php");break;
							case 'contact':include("views/customer/contact.php");break;
							default:include("views/trangchu.php");break;
						}
					}
					else{
						include("views/home.php");
					}
				?>
			</div>
		</div>
		<!-- MAIN-RIGHT -->
		<div class="clear"></div>
	</div>
	<!-- CONTENT -->
	<!-- FOOTER -->
	<div class="footer">
		
	</div>
	<!-- FOOTER -->
	<div class="clear"></div>
</div>
</body>
</html>
<?php 
}
else{
	include("views/login.php");
}
?>
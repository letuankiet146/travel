<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
session_start();
if(isset($_SESSION['username']))
{
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
	<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
	<script type="text/javascript" src="js/click.js"></script>
	<!-- MODULE MAIN -->
	<link rel="stylesheet" type="text/css" href="style/main/main.css" />
</head>
<body>
<div class="ad-wrapper">
	<!-- HEADER -->
	<div id="header">
		<div class="header-inner">
			<div class="header-title"><a href="index.php">Website Admin</a></div>
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
								</span>
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
							<li><a href="views/order-tour.php"><i class="fa fa-list-alt"></i>Danh sách đơn đặt tour</a></li>
							<li><a href=""> <i class="fa fa-envelope-o"></i> Tin nhắn từ khách hàng</a></li>
							<li><a href=""><i class="fa fa-print"></i></i> Xuất báo cáo</a></li>
						</ul>
					</li>
					<li class="menu">
						<a href="#" class="title-order">Quản lý tour <i class="fa fa-caret-square-o-down"></i></a>
						<ul class="menu-child">
							<li><a href="views/list-tour.php"><i class="fa fa-list-alt"></i>Danh sách tour</a></li>
							<li><a href=""><i class="fa fa-list-alt"></i>Danh sách địa điểm</a></li>
							<li><a href=""><i class="fa fa-list-alt"></i>Danh sách khách sạn</a></li>
						</ul>
					</li>
					<li class="menu">
						<a href="#" class="title-order">Quản lý nhân sự<i class="fa fa-caret-square-o-down"></i></a>
						<ul class="menu-child">
							<li><a href=""><i class="fa fa-list-alt"></i>Danh sách nhân viên</a></li>
							<li><a href=""><i class="fa fa-bell"></i>Thông báo đến nhân viên</a></li>
							<li><a href=""><i class="fa fa-lock"></i>Phân quyền nhân viên</a></li>
						</ul>
					</li>
					<li class="menu">
						<a href="#" class="title-order">Khách hàng<i class="fa fa-caret-square-o-down"></i></a>
						<ul class="menu-child">
							<li><a href=""><i class="fa fa-usd"></i>Danh sách khách hàng</a></li>
							<li><a href=""><i class="fa fa-compress"></i>Liên hệ từ khách hàng</a></li>
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
				<div class="breadcrumb">
					<ul>
						<li><a href="#">Trang chủ</a></li>
					</ul>
				</div>
				<div class="news">
					<div class="news-left">
						<div class="diary">
							<div class="title-inner"><h3>Nhật ký hoạt động</h3></div>
							<div class="content-inner">
							<div class="content">
								<table cellspacing="0">
									<thead>
										<tr>
											<th>STT</th>
											<th>Nhân viên</th>
											<th>Công việc thực hiện</th>
											<th>Thời gian thực hiên</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Phạm Thành Thảo</td>
											<td>Xác nhận thanh toán thành công</td>
											<td>21/07/2015 14:40</td>
										</tr>
										<tr>
											<td>1</td>
											<td>Nguyễn Trường Cao Tuấn Khoa</td>
											<td>Xác nhận thanh toán thành công</td>
											<td>21/07/2015 14:40</td>
										</tr>
										<tr>
											<td>10</td>
											<td>Phạm Huỳnh Vũ Kiên</td>
											<td>Xác nhận thanh toán thành công</td>
											<td>21/07/2015 14:40</td>
										</tr>
										<tr>
											<td>1</td>
											<td>Phạm Thành Thảo</td>
											<td>Xác nhận thanh toán thành công</td>
											<td>21/07/2015 14:40</td>
										</tr>
										<tr>
											<td>1</td>
											<td>Nguyễn Trường Cao Tuấn Khoa</td>
											<td>Xác nhận thanh toán thành công</td>
											<td>21/07/2015 14:40</td>
										</tr>
										<tr>
											<td>10</td>
											<td>Phạm Huỳnh Vũ Kiên</td>
											<td>Xác nhận thanh toán thành công</td>
											<td>21/07/2015 14:40</td>
										</tr>
										<tr>
											<td>1</td>
											<td>Phạm Thành Thảo</td>
											<td>Xác nhận thanh toán thành công</td>
											<td>21/07/2015 14:40</td>
										</tr>
										<tr>
											<td>1</td>
											<td>Nguyễn Trường Cao Tuấn Khoa</td>
											<td>Xác nhận thanh toán thành công</td>
											<td>21/07/2015 14:40</td>
										</tr>
										<tr>
											<td>10</td>
											<td>Phạm Huỳnh Vũ Kiên</td>
											<td>Xác nhận thanh toán thành công</td>
											<td>21/07/2015 14:40</td>
										</tr>
										<tr>
											<td>1</td>
											<td>Phạm Thành Thảo</td>
											<td>Xác nhận thanh toán thành công</td>
											<td>21/07/2015 14:40</td>
										</tr>
									</tbody>
								</table>
							</div>
							</div>
						</div>
						<div class="paging">
							<p>page 1 of 10</p>
							<ul>
								<li class="goprev">&laquo; Trang sau</li>
								<li class="current">
									<input type="text" name="1" value="1" placeholder="" />
								</li>
								<li class="gonext">Trang Tiếp &raquo;</li>
							</ul>
							<div class="clear"></div>
						</div>
					</div>
					<div class="news-right">
						<div class="notification">
							<div class="title-inner"><h3>Chi tiết đơn hàng</h3></div>
							<div class="order_list">
							<div class="messages-box">
								<div class="orders">
									<a href=""><span>Đơn hàng mới</span><span>20</span></a>
									<div class="clear"></div>
								</div>
							</div>
							<div class="messages-box">
								<div class="orders">
									<a href=""><span>Đơn hàng chưa thanh toán</span><span>5</span></a>
									<div class="clear"></div>
								</div>
							</div>
							<div class="messages-box">
								<div class="orders">
									<a href=""><span>Đơn hàng bị trả lại</span><span>7</span></a>
									<div class="clear"></div>
								</div>
							</div>
							<div class="messages-box">
								<div class="orders">
									<a href=""><span>Đơn hàng bị hủy</span><span>8</span></a>
									<div class="clear"></div>
								</div>
							</div>
							</div>
						</div>
						<div class="notification">
							<div class="title-inner"><h3>Thông báo chung</h3></div>
							<div class="message_list">
								<div class="messages-box">
									<div class="messages">
										<p>Yêu cầu nhân viên báo cáo doanh thu tháng 10.</p>
										<p>Thành Thảo</p>
									</div>
								</div>
								<div class="messages-box">
									<div class="messages">
										<p>Yêu cầu nhân viên báo cáo doanh thu tháng 10.</p>
										<p>Thành Thảo</p>
									</div>
								</div>
								<div class="messages-box">
									<div class="messages">
										<p>Yêu cầu nhân viên báo cáo doanh thu tháng 10.</p>
										<p>Thành Thảo</p>
									</div>
								</div>
								<div class="messages-box">
									<div class="messages">
										<p>Yêu cầu nhân viên báo cáo doanh thu tháng 10.</p>
										<p>Thành Thảo</p>
									</div>
								</div>
							</div>
							<div class="search-notifi">
								<form action="" method="get" accept-charset="utf-8">
									<input type="text" name="" value="" placeholder="Tin nhắn" />
									<input type="button" name="" value="" />
								</form>
							</div>
						</div>
					</div>
					
				</div>
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
	include("views/login.phtml");
}
?>
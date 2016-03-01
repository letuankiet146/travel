<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Danh sách tour</title>
	<!-- MODULE TOAN TRANG -->
	<link rel="stylesheet" type="text/css" href="../style/font/fontawesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="../style/screen.css" />
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/jquery.tablesorter.min.js"></script>
	<script type="text/javascript" src="../js/click.js"></script>
	<!-- MODULE MAIN -->
	<link rel="stylesheet" type="text/css" href="../style/tour/tour.css" />
	<!--<script type="text/javascript" > var sodong = 8;</script>-->
	<script type="text/javascript" src="../js/paging.js"></script>

</head>
<body>
<div class="ad-wrapper">
	<!-- HEADER -->
	<div id="header">
		<div class="header-inner">
			<div class="header-title"><a href="../index.php">Website Admin</a></div>
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
								<img class="img" src="../images/img1.png" alt="" />
								<span class="text-box">
									Xin chào
									<strong class="name">Thành Thảo</strong>
								</span>
							</a>
							<a class="opener" href="#"><i class="fa fa-caret-down"></i></a>
							<ul class="profile-menu">
								<li><a href="">Thông tin tài khoản</a></li>
								<li><a href="">Đăng xuât</a></li>
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
							<li><a href="order-tour.php"><i class="fa fa-list-alt"></i>Danh sách đơn đặt tour</a></li>
							<li><a href=""> <i class="fa fa-envelope-o"></i> Tin nhắn từ khách hàng</a></li>
							<li><a href=""><i class="fa fa-print"></i></i> Xuất báo cáo</a></li>
						</ul>
					</li>
					<li class="menu">
						<a href="#" class="title-order">Quản lý tour <i class="fa fa-caret-square-o-down"></i></a>
						<ul class="menu-child">
							<li><a href="list-tour.php"><i class="fa fa-list-alt"></i>Danh sách tour</a></li>
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
						<li><a href="#">Quản lý tour</a></li>
					</ul>
				</div>
				<div class="add-edit">
					<div class="title-inner">
						<h3 class="title-inner-l">Tạo Tour</h3>
						<div class="title-inner-r">
							<ul>
								<li id="btn-exit">Thoát</li>
							</ul>
						</div>
						<div class="clear"></div>
					</div>
					<div class="content">
						<form action="" method="get" accept-charset="utf-8">
							<div class="info-title"><span>Những mục có dấu (*) là bắt buộc phải nhập</span></div>
							<div class="warpper">
								<div class="info">
									<div class="info-l">
										<div class="row">
											<label for="">Loại tour<span class="red"> ( * )</span>
											</label>
											<select>
												<option value="0">---------------------</option>
												<option value="1">Tour trong nước</option>
												<option value="2">Tour nước ngoài</option>
											</select>
										</div>
										<div class="row">
											<label for="">Mã tour<span class="red"> ( * )</span></label>
											<label><input type="text" name="" value="" /></label>
										</div>
										<div class="row">
											<label for="">Nơi khởi hành <span class="red"> ( * )</span></label>
											<select>
												<option value="0">---------------------</option>
												<option value="1">Chi nhánh 1</option>
												<option value="2">Chi nhánh 2</option>
											</select>
										</div>
										<div class="row">
											<label for="">Ngày khởi hành <span class="red"> ( * )</span></label>
											<label><input type="date" name="" value="" /></label>
										</div>
										<div class="row">
											<label for="">Giá khuyến mãi <span class="red"> ( * )</span></label>
											<label><input type="text" name="" value="" /></label>
										</div>
										<div class="row">
											<label for="">Số lượng <span class="red"> ( * )</span></label>
											<label><input type="text" name="" value="" /></label>
										</div>
									</div>
									<div class="info-r">
										<div class="row">
											<label for="">Hướng dẫn viên <span class="red"> ( * )</span></label>
											<select>
												<option value="0">---------------------</option>
												<option value="1">Hướng dẫn viên 1</option>
												<option value="2">Hướng dẫn viên 2</option>
											</select>
										</div>
										<div class="row">
											<label for="">Tên tour <span class="red"> ( * )</span></label>
											<label><input type="text" name="" value="" /></label>
										</div>
										<div class="row">
											<label for="">Địa điểm đến <span class="red"> ( * )</span></label>
											<select>
												<option value="0">---------------------</option>
												<option value="1">Nha Trang</option>
												<option value="2">Hà Nội</option>
											</select>
										</div>
										<div class="row">
											<label for="">Ngày kết thúc <span class="red"> ( * )</span></label>
											<label><input type="date" name="" value="" /></label>
										</div>
										<div class="row">
											<label for="">Giá tour</label>
											<label><input type="text" name="" value="" /></label>
										</div>
										<div class="row">
											<label for="">Dịch vụ <span class="red"> ( * )</span></label>
											<select>
												<option value="0">---------------------</option>
												<option value="1">Dịch vụ 1</option>
												<option value="2">Dịch vụ 2</option>
											</select>
										</div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="thumb">
									<label>Ảnh minh họa Ảnh minh họa <span>(chỉ cho phép .JPG, .PNG, .GIF và dung lượng tối đa là 500Kb)</span></label>
									<input type="file" name="" value="" />
								</div>
								<div class="details">
									<label>Thông tin chi tiết tour</label>
									<textarea name="thongtin" id="txt_intro" rows="2" style="width:100%" ></textarea>
								</div>
							</div>
							<div class="btn">
								<input class="btn-add" type="submit" name="" value="Tạo tour" />
								<input class="btn-reset" type="reset" name="" value="Nhập lại" />
								<!-- <div class="btn-edit"></div> -->
							</div>
						</form>
						<div class="clear"></div>
					</div>
				</div>
				<div class="news">
					<div class="diary">
						<div class="title-inner">
							<h3 class="title-inner-l">Danh sách tour</h3>
							<div class="search-group">
								<div class="select-box">
									<select name="">
										<option value="1"> Tour đang thực hiện </option>
										<option value=""> Tour chưa thực hiện </option>
										<option value=""> Tour đã thực hiện </option>
									</select>
								</div>
								<div class="search-box">
									<form action="" method="get" accept-charset="utf-8">
										<input type="text" name="" value="" placeholder="Từ khóa tìm kiếm" />
										<button type=""><i class="fa fa-search"></i></button>
									</form>
								</div>
							</div>
							<div class="title-inner-r">
								<ul>
									<li id="add-tour">Tạo tour</li>
									<li id="del-tour">Xóa tour</li>
								</ul>
							</div>
							<div class="clear"></div>
						</div>
						<div class="content-inner">
						<div class="content" id="paging">
							<table cellspacing="0">
								<thead>
									<tr>
										<th></th>
										<th>Mã tour</th>
										<th>Tên tour</th>
										<th class="text-center">Ngày khỏi hành</th>
										<th class="text-center">Ngày kết thúc</th>
										<th class="text-center">Số lượng</th>
										<th colspan="2" class="text-center">Trạng thái</th>
										<th colspan="2" class="text-center">Chức năng</th>
									</tr>
								</thead>
								<tbody id="rows">
								</tbody>
							</table>
						</div>
						</div>
					</div>
					<div class="paging" id="pages">
						<p id="pageInfo"></p>
						<ul>
							<li class="goprev">&laquo; Trang sau</li>
							<li class="current">
								<input id="CurrentPage" type="text" name="1" value="" placeholder="">
							</li>
							<li class="gonext">Trang Tiếp &raquo;</li>
						</ul>
						<div class="clear"></div>
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
<link rel="stylesheet" type="text/css" href="style/main/main.css" />
<script src="js/home/paging.js" type="text/javascript"></script>
<script src="js/home/home.js" type="text/javascript"></script>
<div class="breadcrumb">
	<ul>
		<li><a href="#">Trang chủ</a></li>
	</ul>
</div>
<div class="news">
	<div class="news-left">
		<div class="diary">
			<div class="title-inner">
				<h3 class="title-inner-l">Nhật ký hoạt động</h3>
				<?php if(admin()) { ?>
					<div class="title-inner-r">
						<ul>
							<li id="del-tour" onclick="del_array()">Xóa nhật ký</li>
						</ul>
					</div>
				<?php }	?>
				<div class="clear"></div>
			</div>
			<div class="content-inner">
			<div class="content" id="paging">
				<table cellspacing="0">
					<thead>
						<tr>
							<th>Nhân viên</th>
							<th>Công việc</th>
							<th>Thông tin chi tiết</th>
							<th>Thời gian</th>
							<th></th>
						</tr>
					</thead>
					<tbody id="rows"></tbody>
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
			<div class="message_list" id="message_list"></div>
			<div class="search-notifi">
				<form action="" method="get" accept-charset="utf-8">
					<input type="text" name="" value="" placeholder="Tin nhắn" />
					<input type="button" name="" value="" />
				</form>
			</div>
		</div>
	</div>
</div>
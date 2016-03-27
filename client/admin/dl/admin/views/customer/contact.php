	<script type="text/javascript" src="js/customer/paging.js"></script>
	<link rel="stylesheet" type="text/css" href="style/customer/customer.css" />
	<script type="text/javascript" src="js/customer/customer.js"></script>
	<script type="text/javascript">
        $(function() {
            $( "#ngayKHDto" ).datepicker({
              showOn: "button",
              buttonImage: "js/datepicker/images/icon-picker.png",
              buttonImageOnly: true,
              buttonText: "Select date"
            });
            $( "#ngayKTDto" ).datepicker({
              showOn: "button",
              buttonImage: "js/datepicker/images/icon-picker.png",
              buttonImageOnly: true,
              buttonText: "Select date"
            });
        });
    </script>
	<div class="breadcrumb">
		<ul>
			<li><a href="#">Trang chủ</a></li>
			<li><a href="#">Ý kiến khách hàng</a></li>
		</ul>
	</div>
	<div class="news">
		<div class="diary">
			<div class="title-inner">
				<h3 class="title-inner-l">Ý kiến khách hàng</h3>
				<div class="search-group">
					<div class="select-box">
						<select name="">
							<option value="1">Ý kiến mới</option>
							<option value="2">Đã phản hồi</option>
							<option value="3">Chưa phản hồi</option>
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
						<li id="del-tour">Xóa</li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<div class="content-inner">
			<div class="content" id="paging">
				<table cellspacing="0">
					<thead>
						<tr>
							<th>Tên khách hàng</th>
							<th>Nội dung ý kiến</th>
							<th>Email</th>
							<th>Số điện thoại</th>
							<th>Trạng thái</th>
							<th colspan="3">Chức năng</th>
						</tr>
					</thead>
					<tbody id="rowsContact">
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


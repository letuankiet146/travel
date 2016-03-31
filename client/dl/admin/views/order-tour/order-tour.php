	<div class="breadcrumb">
		<ul>
			<li><a href="#">Trang chủ</a></li>
			<li><a href="#">Đơn đặt tour</a></li>
		</ul>
	</div>
	<div class="add-edit">
		<div class="title-inner">
			<h3 class="title-inner-l">Chi tiết đơn đặt tour</h3>
			<div class="title-inner-r">
				<ul>
					<li class="btn-exit">Thoát</li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="content">
			<div class="warpper" id="orderDetail"></div>
			<div class="btn">
				<div class="title-inner-r">
					<ul>
						<li class="btn-exit">Thoát</li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="news">
		<div class="diary">
			<div class="title-inner">
				<h3 class="title-inner-l">Danh sách đơn đặt tour</h3>
				<div class="title-inner-r">
					<ul>
						<li id="del-tour">Xóa đớn hàng</li>
					</ul>
				</div>
				<div class="search-group">
					<div class="select-box">
						<select name="">
							<option value="1"> Đơn hàng chưa thanh toán </option>
							<option value="2"> Đơn hàng đã thanh toán </option>
						</select>
					</div>
					<div class="search-box">
						<form action="" method="get" accept-charset="utf-8">
							<input type="text" name="" value="" placeholder="Từ khóa tìm kiếm" />
							<button type=""><i class="fa fa-search"></i></button>
						</form>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="content-inner">
			<div class="content" id="paging">
				<table cellspacing="0">
					<thead>
						<tr>
							<th>Mã đơn đặt tour</th>
							<th>Khách hàng</th>
							<th class="text-center">Ngày đặt tour</th>
							<th class="text-center">Tổng tiền </th>
							<th class="text-center">Tình trạng đơn hàng</th>
							<th class="text-center" colspan="3">Chức năng</th>
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
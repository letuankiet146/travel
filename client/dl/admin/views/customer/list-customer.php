	<div class="breadcrumb">
		<ul>
			<li><a href="#">Trang chủ</a></li>
			<li><a href="#">Quản lý khách hàng</a></li>
		</ul>
	</div>
	<div class="add-edit" id="creatTour">
		<div class="title-inner">
			<h3 class="title-inner-l">Thêm khách hàng</h3>
			<div class="title-inner-r">
				<ul>
					<li class="btn-exit">Thoát</li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="content" id="loadingAjax"></div>
	</div>
	<div class="news">
		<div class="diary">
			<div class="title-inner">
				<h3 class="title-inner-l">Danh sách khách hàng</h3>
				<div class="search-group">
					<div class="select-box">
						<select name="">
							<option value="1">Khách hàng thân thiết</option>
							<option value="2">Khách hàng tiềm năng</option>
							<option value="3">Khách vãng lai</option>
							<option value="4">Khách VIP</option>
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
						<li id="btn-add">Thêm khách hàng</li>
						<li id="del-tour">Xóa khách hàng</li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<div class="content-inner">
			<div class="content" id="paging">
				<table cellspacing="0">
					<thead>
						<tr>
							<th>Mã khách hàng</th>
							<th>Tên khách hàng</th>
							<th>Email</th>
							<th>Số điện thoại</th>
							<th>Đơn hàng</th>
							<th>Nhóm khách hàng</th>
							<th colspan="3">Chức năng</th>
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


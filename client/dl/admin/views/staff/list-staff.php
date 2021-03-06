	<div class="breadcrumb">
		<ul>
			<li><a href="#">Trang chủ</a></li>
			<li><a href="#">Quản lý nhân viên</a></li>
		</ul>
	</div>
	<div class="add-edit" id="creatTour">
		<div class="title-inner">
			<h3 class="title-inner-l" id="title">Tạo nhân viên</h3>
			<div class="title-inner-r">
				<ul>
					<li class="btn-exit">Thoát</li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="content" id="loadingAjax">
			
		</div>
	</div>
	<div class="news">
		<div class="diary">
			<div class="title-inner">
				<h3 class="title-inner-l">Danh sách nhân viên</h3>
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
						<li id="btn-add">Thêm nhân viên</li>
						<li id="del-tour" onclick="del_array()">Xóa nhân viên</li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<div class="content-inner">
			<div class="content" id="paging">
				<table cellspacing="0">
					<thead>
						<tr>
							<th>Mã nhân viên</th>
							<th>Họ và tên</th>
							<th>Số điện thoại</th>
							<th>Email</th>
							<th>Ngày vào làm</th>
							<th>Chức vụ</th>
							<th colspan="3">Chức năng</th>
							<th></th>
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


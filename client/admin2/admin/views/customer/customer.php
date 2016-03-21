	<script type="text/javascript" src="js/customer/paging.js"></script>
	<!-- DATEPICKER -->
	<link rel="stylesheet" type="text/css" href="js/datepicker/datepicker.css" />
	<script type="text/javascript" src="js/datepicker/datepicker.js"></script>
	<!-- MODULE MAIN -->
	<link rel="stylesheet" type="text/css" href="style/tour/tour.css" />
	<!--<script type="text/javascript" > var sodong = 8;</script>-->
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
			<li><a href="#">Quản lý tour</a></li>
		</ul>
	</div>
	<div class="add-edit">
		<div class="title-inner">
			<h3 class="title-inner-l">Thêm khách hàng</h3>
			<div class="title-inner-r">
				<ul>
					<li class="btn-exit">Thoát</li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="content" id="add-edit-tour">
			<?php include ("ckeditor/ckeditor.php"); ?>
			<form action="#" method="post" accept-charset="utf-8" id="formAddEdit">
				<div class="info-title"><span>Những mục có dấu (*) là bắt buộc phải nhập</span></div>
				<div class="warpper">
					<div class="info">
						<div class="info-l">
							<div class="row">
								<?php 
									$sql="SELECT customer_id FROM customer ORDER BY customer_id DESC";
									$query=mysql_query($sql);
									$row=mysql_fetch_array($query);
									$id=$row['customer_id']+1;
								?>
								<label for="">Mã khách hàng<span class="red"> ( * )</span></label>
								<label><input id="idTourDto" type="text" name="idTourDto" value="MAKH<?php echo $id; ?>" disabled /></label>
							</div>
							<div class="row">
								<label for="">Tên khách hàng <span class="red"> ( * )</span></label>
								<label><input id="idTourDto" type="text" name="idTourDto" value="" placeholder="Nhập tên khách hàng" /></label>
							</div>
							<div class="row">
								<label for="">Email <span class="red"> ( * )</span></label>
								<label><input id="ngayKHDto" type="text" name="" value="" placeholder="Nhập email" /></label>
							</div>
							<div class="row">
								<label for="">Số điện thoai <span class="red"> ( * )</span></label>
								<label><input id="giaTourKMDto" type="text" name="" value="" placeholder="Nhập số điện thoai" /></label>
							</div>
							<div class="row">
								<label for="">Địa chỉ <span class="red"> ( * )</span></label>
								<label><input id="giaTourKMDto" type="text" name="" value="" placeholder="Nhập địa chỉ" /></label>
							</div>
						</div>
						<div class="info-r">
							<div class="row">
								<label for="">Công ty</label>
								<label><input id="tenTourDto" type="text" name="" value="" placeholder="Nhập tên công ty" /></label>
							</div>
							<div class="row">
								<label for="">Địa chỉ</label>
								<label><input id="tenTourDto" type="text" name="" value="" placeholder="Nhập địa chỉ công ty" /></label>
							</div>
							<div class="row">
								<label for="">Điện thoại</label>
								<label><input id="tenTourDto" type="text" name="" value="" placeholder="Nhập số điện thoại công ty" /></label>
							</div>
							<div class="row">
								<label for="">Thành phố</label>
								<label><input id="ngayKTDto" type="text" name="" value="" placeholder="Nhập Tỉnh / Thành phố" /></label>
							</div>
							<div class="row">
								<label for="">Mã Quốc gia</label>
								<label><input id="giaTourDto" type="text" name="" value="" placeholder="Nhập mã quốc gia" /></label>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="details">
						<label>Ghi chú</label>
						<textarea name="infoDto" id="infoDto" rows="4" style="width:100%" placeholder="Nhập Ghi chú về khách hàng" ></textarea>
			            <div class="clear"></div>
					</div>
				</div>
				<div class="btn">
					<input class="btn-reset" type="reset" name="" value="Nhập lại" />
					<a class="btn-add" href="#" onclick="click_load()" >Thêm khách hàng</a>
					<!-- <input class="btn-add" type="submit" name="" onclick="click_load()" value="Tạo tour" /> -->
					<div class="row">
						<label for="">Nhóm khách hàng: </label>
						<select name="">
							<option value="1">Khách hàng thân thiết</option>
							<option value="2">Khách hàng tiềm năng</option>
							<option value="3">Khách vãng lai</option>
							<option value="4">Khách VIP</option>
						</select>
					</div>
					<div class="clear"></div>
				</div>
			</form>
			<div class="clear"></div>
		</div>
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
						<li id="add-tour">Thêm khách hàng</li>
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
							<th></th>
							<th>Mã khách hàng</th>
							<th>Tên khách hàng</th>
							<th>Email</th>
							<th class="text-center">Số điện thoại</th>
							<th class="text-center">Đơn hàng</th>
							<th class="text-center">Nhóm khách hàng</th>
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


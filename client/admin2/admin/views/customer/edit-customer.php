	<script type="text/javascript" src="js/list-tour/paging.js"></script>
	<!-- DATEPICKER -->
	<link rel="stylesheet" type="text/css" href="js/datepicker/datepicker.css" />
	<script type="text/javascript" src="js/datepicker/datepicker.js"></script>
	<!-- MODULE MAIN -->
	<link rel="stylesheet" type="text/css" href="style/tour/tour.css" />
	<!--<script type="text/javascript" > var sodong = 8;</script>-->
	<script type="text/javascript" src="js/list-tour/edit-tour.js"></script>	
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
    <?php 
    	$id=$_GET["Id"]; 
    	$sql = "SELECT * FROM tour t join from_place f on t.tour_from_place_id=f.from_place_id join guider g on t.tour_guider_id=g.guider_id join arrive_place a on t.tour_arrive_place_id=a.arrive_place_id join services s on t.tour_service_id=s.services_id join area ar on a.arrive_place_area_id=ar.area_id where tour_id = " . $id;
    	$query=mysql_query($sql);
    	$row=mysql_fetch_array($query);
    	$dayStart = $row['tour_day_start'];
		$fdayStart = date("d/m/Y", strtotime($dayStart));
		$dayEnd = $row['tour_day_end'];
		$fdayEnd = date("d/m/Y", strtotime($dayEnd));
    	{
    ?>
	<div class="breadcrumb">
		<ul>
			<li><a href="#">Trang chủ</a></li>
			<li><a href="#">Quản lý tour</a></li>
		</ul>
	</div>
	<div class="add-edit" id="editTour" >
		<div class="title-inner">
			<h3 class="title-inner-l">Thông tin chi tiết</h3>
			<div class="title-inner-r">
				<ul>
					<li class="btn-exit"><a href="index.php?page=list-tour">Thoát</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="content">
			<?php include ("ckeditor/ckeditor.php"); ?>
			<form action="" method="post" accept-charset="utf-8">
				<div class="info-title"><span>Những mục có dấu (*) là bắt buộc phải nhập</span></div>
				<div class="warpper">
					<div class="info">
						<div class="info-l">
							<div class="row">
								<label for="">Mã khách hàng<span class="red"> ( * )</span></label>
								<label><input id="idTourDto" type="text" name="idTourDto" value="" disabled /></label>
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
	
	<?php } ?>	


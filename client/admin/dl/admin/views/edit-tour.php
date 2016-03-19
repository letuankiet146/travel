	<!-- <script type="text/javascript" src="js/list-tour/paging.js"></script> -->
	<!-- DATEPICKER -->
	<link rel="stylesheet" type="text/css" href="js/datepicker/datepicker.css" />
	<script type="text/javascript" src="js/datepicker/datepicker.js"></script>
	<!-- MODULE MAIN -->
	<link rel="stylesheet" type="text/css" href="style/tour/tour.css" />
	<!--<script type="text/javascript" > var sodong = 8;</script>-->
	<script type="text/javascript" src="js/list-tour/add-update.js"></script>	
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
		$area_id = $row['arrive_place_area_id'];
		$today = date("d/m/Y");
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
								<label for="">Loại tour<span class="red"> ( * )</span>
								</label>
								<select id="areaIdDto" disabled>
								<option value="<?php echo $row['arrive_place_area_id']; ?>"><?php echo $row['area_name'];  ?></option>
								</select>	
							</div>
							<div class="row">
								<label for="">Mã tour<span class="red"> ( * )</span></label>
								<label><input id="idTourDto" type="text" name="" value="<?php echo $row['tour_code']; ?>" disabled /></label>
							</div>
							<div class="row">
								<label for="">Tên tour <span class="red"> ( * )</span></label>
								<label><input id="tenTourDto" type="text" name="" value="<?php echo $row['tour_name']; ?>" /></label>
							</div>
							<div class="row">
								<label for="">Nơi khởi hành <span class="red"> ( * )</span></label>
								<select id="tourFromPlaceIdDto">
									<option value="<?php echo $row['tour_from_place_id']; ?>"><?php echo $row['from_place_name']; ?></option>
									<option value="0">---------------------</option>
								<?php 
									$sql = "SELECT * FROM from_place";
									$query = mysql_query($sql);
									while($rows = mysql_fetch_array($query)){ ?>
									<option value="<?php echo $rows['from_place_id']; ?>"><?php echo $rows['from_place_name'];; ?></option>
								<?php } ?>
								</select>
							</div>
							<div class="row">
								<label for="">Địa điểm đến <span class="red"> ( * )</span></label>
								<select id="tourArrivePlaceIdDto">
									<option value="<?php echo $row['tour_arrive_place_id']; ?>"><?php echo $row['arrive_place_name'];; ?></option>
									<option value="0">---------------------</option>
								<?php 
									$sql = "SELECT * FROM arrive_place WHERE arrive_place_area_id = " . $area_id;
									$query = mysql_query($sql);
									while($rows = mysql_fetch_array($query)){
								?>
									<option value="<?php echo $rows['arrive_place_id']; ?>"><?php echo $rows['arrive_place_name']; ?></option>
								<?php } ?>
								</select>
							</div>
							<div class="row">
								<label for="">Hướng dẫn viên <span class="red"> ( * )</span></label>
								<select id="tourGuiderIdDto">
									<option value="<?php echo $row['tour_guider_id']; ?>"><?php echo $row['guider_name']; ?></option>
									<option value="0">---------------------</option>
								<?php 
									$sql = "SELECT * FROM guider";
									$query = mysql_query($sql);
									while($rows = mysql_fetch_array($query)){
								?>
									<option value="<?php echo $rows['guider_id']; ?>"><?php echo $rows['guider_name']; ?></option>
								<?php } ?>
								</select>
							</div>
						</div>
						<div class="info-r">
							<div class="row">
								<label for="">Số lượng <span class="red"> ( * )</span></label>
								<label><input id="soChoDto" type="text" name="" value="<?php echo $row['tour_seat_number']; ?>" /></label>
							</div>
							<div class="row">
								<label for="">Ngày khởi hành <span class="red"> ( * )</span></label>
								<label><input id="ngayKHDto" type="text" name="" value="<?php echo $fdayStart ?>" placeholder="dd/mm/yyyy" /></label>
								<input id="today" type="hidden" name="today" value="<?php echo $today ?>" />
							</div>
							<div class="row">
								<label for="">Ngày kết thúc <span class="red"> ( * )</span></label>
								<label><input id="ngayKTDto" type="text" name="" value="<?php echo $fdayEnd ?>" placeholder="dd/mm/yyyy" /></label>
							</div>
							<div class="row">
								<label for="">Dịch vụ <span class="red"> ( * )</span></label>
								<select id="idDichVuDto">
									<option value="<?php echo $row['tour_service_id']; ?>"><?php echo $row['services_name'];; ?></option>
									<option value="0">---------------------</option>
								<?php 
									$sql = "SELECT * FROM services";
									$query = mysql_query($sql);
									while($rows = mysql_fetch_array($query)){
								?>
									<option value="<?php echo $rows['services_id']; ?>"><?php echo $rows['services_name']; ?></option>
								<?php } ?>
								</select>
							</div>
							<div class="row">
								<label for="">Giá khuyến mãi <span class="red"> ( * )</span></label>
								<label><input id="giaTourKMDto" type="text" name="" value="<?php echo $row['tour_sale_off']; ?>" /></label>
							</div>
							<div class="row">
								<label for="">Giá tour</label>
								<label><input id="giaTourDto" type="text" name="" value="<?php echo $row['tour_charge']; ?>" /></label>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="thumb">
						<label>Ảnh minh họa Ảnh minh họa <span>(chỉ cho phép .JPG, .PNG, .GIF và dung lượng tối đa là 500Kb)</span></label>
						<input id="imageDto1" type="hidden" name="imageDto1" value="<?php echo $row['tour_image']; ?>" />
						<input id="imageDto" type="file" name="imageDto" value="<?php echo $row['tour_image']; ?>" />
						<p style="margin-left: 75px"><?php echo $row['tour_image']; ?></p>
					</div>
					<div class="details">
						<label>Thông tin chi tiết tour</label>
						<textarea name="infoDto" id="infoDto" rows="2" style="width:100%" ><?php echo $row['tour_infor']; ?></textarea>
						<?php 
			               $CKEditor = new CKEditor();
			                $CKEditor->basePath = 'ckeditor/';
			               $CKEditor->replace("infoDto");
			            ?>
			            <div class="clear"></div>
					</div>
				</div>
				<div class="btn">
					<input class="btn-reset" type="reset" name="" value="Nhập lại" />
					<a class="btn-add" onclick="click_load()" >Cập nhật</a>
					<div class="row">
						<label for="">Trạng thái</label>
						<select id="activeDto">
						<?php if($row['tour_active']==1){ ?>
							<option value="1">Đang thực hiện</option>
							<option value="0">---------------</option>
							<option value="2">Ngừng thực hiện</option>
							<option value="3">Đã thực hiện</option>
						<?php }
						else if($row['tour_active']==2) { ?>
							<option value="2">Chưa thực hiện</option>
							<option value="0">---------------</option>
							<option value="1">Thực hiện tour</option>
							<option value="3">Đã thực hiện</option>
						<?php }
						else if($row['tour_active']==3){ ?>
							<option value="3">Đã thực hiện</option>
						<?php } ?>
						</select>
					</div>
					<div class="clear"></div>
				</div>
			</form>
			<div class="clear"></div>
		</div>
	</div>
	
	<?php } ?>	


	<!-- DATEPICKER -->
	<link rel="stylesheet" type="text/css" href="js/datepicker/datepicker.css" />
	<script type="text/javascript" src="js/datepicker/datepicker.js"></script>
	<!-- MODULE MAIN -->
	<link rel="stylesheet" type="text/css" href="style/tour/tour.css" />
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
		$area_id = $row['arrive_place_area_id'];
		$today = date("d/m/Y");
    ?>
    <input type="hidden" id="touridDto" name="touridDto" value="<?php echo $id; ?>" />
	<div class="breadcrumb">
		<ul>
			<li><a href="#">Trang chủ</a></li>
			<li><a href="#">Cẩm nang</a></li>
			<li><a href="#">Chỉnh sửa thông tin</a></li>
		</ul>
	</div>
	<div class="add-edit" id="editTour" >
		<div class="title-inner">
			<h3 class="title-inner-l">Thông tin chi tiết</h3>
			<div class="title-inner-r">
				<ul>
					<li class="btn-exit"><a href="index.php?page=list-handbook">Thoát</a></li>
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
								<label for="">Thể loại<span class="red"> ( * )</span>
								</label>
								<select id="areaIdDto" disabled>
								<option value="<?php echo $row['arrive_place_area_id']; ?>"><?php echo $row['area_name'];  ?></option>
								</select>	
							</div>
							<div class="row">
								<label for="">Mã cẩm mang<span class="red"> ( * )</span></label>
								<label><input id="idTourDto" type="text" name="" value="<?php echo $row['tour_code']; ?>" disabled /></label>
							</div>
							
						</div>
						<div class="info-r">
							<div class="row">
								<label for="">Tên cẩm nang <span class="red"> ( * )</span></label>
								<label><input id="tenTourDto" type="text" name="" value="<?php echo $row['tour_name']; ?>" /></label>
							</div>
							<div class="row">
								<label for="">Ngày tạo <span class="red"> ( * )</span></label>
								<label><input id="ngayKHDto" type="text" name="" value="<?php echo $fdayStart ?>" placeholder="dd/mm/yyyy" /></label>
								<input id="today" type="hidden" name="today" value="<?php echo $today ?>" />
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="thumb">
						<label>Ảnh minh họa Ảnh minh họa <span>(chỉ cho phép .JPG, .PNG, .GIF và dung lượng tối đa là 500Kb)</span></label>
						<input id="imageDto" type="file" name="imageDto" value="<?php echo $row['tour_image']; ?>" />
						<p style="margin-left: 75px"><?php echo $row['tour_image']; ?></p>
					</div>
					<div class="details">
						<label>Thông tin chi tiết cẩm nang</label>
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
					<a class="btn-add" href="#" onclick="click_load()" >Cập nhật</a>
					<div class="row">
						<label for="">Trạng thái</label>
						<select id="activeDto">
							<option value="">Hiển thị</option>
							<option value="">Không hiển thị</option>
						</select>
					</div>
					<div class="clear"></div>
				</div>
			</form>
			<div class="clear"></div>
		</div>
	</div>
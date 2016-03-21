	<script type="text/javascript" src="js/click.js"></script>
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
    	include ('../../config.php');
    	include ("../../ckeditor/ckeditor.php"); 
    ?>

	<div class="title-inner">
		<h3 class="title-inner-l">Tạo Tour</h3>
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
							<label for="">Loại tour<span class="red"> ( * )</span>
							</label>
							<select id="areaIdDto" onchange="ajax_arrive()">
							<option value="0">Chọn loại tour</option>
							<?php 
								$sql = "SELECT * FROM area";
								$query = mysql_query($sql);
								while($rows = mysql_fetch_array($query)){
							?>
								<option value="<?php echo $rows['area_id'] ?>"><?php echo $rows['area_name'] ?></option>
							<?php } ?>
							</select>
						</div>
						<div class="row">
							<?php 
								$sql="SELECT tour_id FROM tour ORDER BY tour_id DESC";
								$query=mysql_query($sql);
								$row=mysql_fetch_array($query);
								$id=$row['tour_id']+1;
							?>
							<label for="">Mã tour<span class="red"> ( * )</span></label>
							<label><input id="idTourDto" type="text" name="idTourDto" value="MTDLDD<?php echo $id; ?>" disabled  /></label>
						</div>
						<div class="row">
							<label for="">Tên tour <span class="red"> ( * )</span></label>
							<label><input id="tenTourDto" type="text" name="" value="" placeholder="Nhập tên tour" /></label>
						</div>
						<div class="row">
							<label for="">Nơi khởi hành <span class="red"> ( * )</span></label>
							<select id="tourFromPlaceIdDto">
								<option value="0">Chọn nơi khỏi hành</option>
							<?php 
								$sql = "SELECT * FROM from_place";
								$query = mysql_query($sql);
								while($rows = mysql_fetch_array($query)){
							?>
								<option value="<?php echo $rows['from_place_id'] ?>"><?php echo $rows['from_place_name'] ?></option>
							<?php } ?>
							</select>
						</div>
						<div class="row">
							<label for="">Địa điểm đến <span class="red"> ( * )</span></label>
							<select id="tourArrivePlaceIdDto">
								<option value="0">Chọn địa điểm đến</option>
							</select>
						</div>
						<div class="row">
							<label for="">Hướng dẫn viên <span class="red"> ( * )</span></label>
							<select id="tourGuiderIdDto">
								<option value="0">Chọn hướng dẫn viên</option>
							<?php 
								$sql = "SELECT * FROM guider";
								$query = mysql_query($sql);
								while($rows = mysql_fetch_array($query)){
							?>
								<option value="<?php echo $rows['guider_id'] ?>"><?php echo $rows['guider_name'] ?></option>
							<?php } ?>
							</select>
						</div>	
					</div>
					<div class="info-r">
						<div class="row">
							<label for="">Số lượng <span class="red"> ( * )</span></label>
							<label><input id="soChoDto" type="text" name="" value=""
							placeholder="Nhập số lượng người tham gia" /></label>
						</div>
						<div class="row">
							<label for="">Ngày khởi hành <span class="red"> ( * )</span></label>
							<label><input id="ngayKHDto" type="text" name="" value="" placeholder="dd/mm/yyyy" /></label>
							<input id="today" type="hidden" name="today" value="<?php echo date("d/m/Y") ?>" />
						</div>
						<div class="row">
							<label for="">Ngày kết thúc <span class="red"> ( * )</span></label>
							<label><input id="ngayKTDto" type="text" name="" value="" placeholder="dd/mm/yyyy" /></label>
						</div>
						<div class="row">
							<label for="">Dịch vụ <span class="red"> ( * )</span></label>
							<select id="idDichVuDto">
								<option value="0">Chọn loại dịch vụ</option>
								<option value="1">Dịch vụ 1</option>
								<option value="2">Dịch vụ 2</option>
							</select>
						</div>
						<div class="row">
							<label for="">Giá khuyến mãi <span class="red"> ( * )</span></label>
							<label><input id="giaTourKMDto" type="text" name="" value="" placeholder="Nhập giá khuyến mãi" /></label>
						</div>
						<div class="row">
							<label for="">Giá tour</label>
							<label><input id="giaTourDto" type="text" name="" value="" placeholder="Nhập giá tour" /></label>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="thumb">
					<label>Ảnh minh họa Ảnh minh họa <span>(chỉ cho phép .JPG, .PNG, .GIF và dung lượng tối đa là 500Kb)</span></label>
					<input id="imageDto" type="file" name="" value="" />
				</div>
				<div class="details">
					<label>Thông tin chi tiết tour</label>
					<textarea name="infoDto" id="infoDto" rows="2" style="width:100%" ></textarea>
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
				<a class="btn-add" href="#" onclick="click_load()" >Tạo tour</a>
				<div class="row">
					<label for="">Trạng thái</label>
					<select id="activeDto">
						<option value="1">Thực hiện</option>
						<option value="2">Chưa thực hiện</option>
					</select>
				</div>
				<div class="clear"></div>
			</div>
		</form>
		<div class="clear"></div>
	</div>
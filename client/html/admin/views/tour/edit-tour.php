   	<script type="text/javascript">
		var fields = $(".row").closest(".info").find( ":input" );
		jQuery.each( fields, function( i, field ) {
			var b = "#" + field.name;
			$(b).change(function(event) {
				$(b).closest(".row").find(".error").empty();
			});
		});

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

        function EL(id) { return document.getElementById(id); }
		function readFile() {
		  if (this.files && this.files[0]) {
		    var FR= new FileReader();
		    FR.onload = function(e) {
		      	var str = e.target.result;
		      	$("#tourImageDataDto").val(str);
		      	var image = new Image();
				image.src = str;
				var list = document.getElementById("img");
				list.removeChild(list.childNodes[0]);
		      	list.appendChild(image);
		    };       
		    FR.readAsDataURL( this.files[0] );
		  }
		}
		EL("imageDto").addEventListener("change", readFile, false);
		
    </script>
    <script type="text/javascript" src="js/list-tour/edit-tour.js"></script>
    <?php 
    	include ('../../connectDB.php');
    	include ("../../ckeditor/ckeditor.php");
    	$id=$_GET["tour_id"]; 
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
    <input id="today" type="hidden" name="today" value="<?php echo $today ?>" />
			<form action="" method="post" id="formAddEdit">
				<div class="info-title"><span>Những mục có dấu (*) là bắt buộc phải nhập</span></div>
				<div class="warpper">
					<div class="info">
						<div class="info-l">
							<div class="row">
								<label for="">Loại tour<span class="red"> ( * )</span></label>
								<select name="areaIdDto" disabled>
									<option value="<?php echo $row['arrive_place_area_id']; ?>"><?php echo $row['area_name'];  ?></option>
								</select>	
							</div>
							<div class="row">
								<label for="">Mã tour<span class="red"> ( * )</span></label>
								<input id="idTourDto" type="text" name="idTourDto" value="<?php echo $row['tour_code']; ?>" disabled />
							</div>
							<div class="row">
								<label for="">Tên tour <span class="red"> ( * )</span></label>
								<textarea id="tenTourDto" name="tenTourDto" placeholder="Nhập tên tour"><?php echo $row['tour_name']; ?></textarea>
							</div>
							<div class="row">
								<label for="">Nơi khởi hành <span class="red"> ( * )</span></label>
								<select name="tourFromPlaceIdDto">
									<option value="<?php echo $row['tour_from_place_id']; ?>"><?php echo $row['from_place_name']; ?></option>
									<option value="">---------------------</option>
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
								<select class="tourArrivePlaceIdDto" name="tourArrivePlaceIdDto">
									<option value="<?php echo $row['tour_arrive_place_id']; ?>"><?php echo $row['arrive_place_name'];; ?></option>
									<option value="">---------------------</option>
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
								<select name="tourGuiderIdDto">
									<option value="<?php echo $row['tour_guider_id']; ?>"><?php echo $row['guider_name']; ?></option>
									<option value="">---------------------</option>
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
								<input id="soChoDto" type="text" name="soChoDto" value="<?php echo $row['tour_seat_number']; ?>" placeholder="Nhập số lượng người tham gia" />
							</div>
							<div class="row">
								<label for="">Ngày khởi hành <span class="red"> ( * )</span></label>
								<input id="ngayKHDto" type="text" name="ngayKHDto" value="<?php echo $fdayStart ?>" placeholder="dd/mm/yyyy" />
							</div>
							<div class="row">
								<label for="">Ngày kết thúc <span class="red"> ( * )</span></label>
								<input id="ngayKTDto" type="text" name="ngayKTDto" value="<?php echo $fdayEnd ?>" placeholder="dd/mm/yyyy" />
								<div class="error"></div>
							</div>
							<div class="row">
								<label for="">Dịch vụ <span class="red"> ( * )</span></label>
								<select name="idDichVuDto">
									<option value="<?php echo $row['tour_service_id']; ?>"><?php echo $row['services_name'];; ?></option>
									<option value="">---------------------</option>
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
								<label for="">Giá tour <span class="red"> ( * )</span></label>
								<input id="giaTourDto" type="text" name="giaTourDto" value="<?php echo number_format($row['tour_charge'],0,"",","); ?>" placeholder="Nhập giá tour" />
							</div>
							<div class="row">
								<label for="">Giá khuyến mãi </label>
								<?php
									if($row['tour_sale_off'] == 0){
										echo '<input id="giaTourKMDto" name="giaTourKMDto" type="text" value="" placeholder="Nhập giá khuyến mãi" />';
									}
									else {
								?>
								<input id="giaTourKMDto" name="giaTourKMDto" type="text" value="<?php echo number_format($row['tour_sale_off'],0,"",","); ?>" placeholder="Nhập giá khuyến mãi" />
								<?php } ?>
							</div>
							
						</div>
						<div class="clear"></div>
					</div>
					<div class="thumb">
						<label>Ảnh minh họa Ảnh minh họa</label>
						<input id="imageDto" type="file" name="imageDto" value="" />
						<input id="tourImageDataDto" type="hidden" name="tourImageDataDto" value="<?php echo $row['tour_image_data']; ?>" />
						<div id="img"><img src="<?php echo $row['tour_image_data']; ?>" alt="" /></div>
					</div>
					<div class="details">
						<label>Thông tin chi tiết tour</label>
						<!-- <textarea name="infoDto" id="infoDto" rows="2" style="width:100%" ><?php //echo $row['tour_infor']; ?></textarea> -->
						<?php 
			               // $CKEditor = new CKEditor();
			               //  $CKEditor->basePath = 'ckeditor/';
			               // $CKEditor->replace("infoDto");
			            ?>
			            <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
						<script type="text/javascript" src="ckeditor/samples/js/sample.js"></script>
			            <div id="editor"><?php echo $row['tour_infor']; ?></div>
						<script> initSample(); </script>
			            <div class="error"></div>
			            <div class="clear"></div>
					</div>
				</div>
				<div class="btn">
					<input class="btn-reset" type="reset" name="" value="Nhập lại" />
					<!-- <a class="btn-add" href="#" onclick="click_edit()" >Cập nhật</a> -->
					<button class="btn-add" type="submit">Cập nhật</button
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
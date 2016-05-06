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
              buttonText: "Select date",
              minDate: 0
            });
            $( "#ngayKTDto" ).datepicker({
              showOn: "button",
              buttonImage: "js/datepicker/images/icon-picker.png",
              buttonImageOnly: true,
              buttonText: "Select date",
              minDate: 0
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
    <script type="text/javascript" src="js/list-tour/add-tour.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="ckeditor/samples/js/sample.js"></script>
    <?php
    	include ('../../connectDB.php');
    	include ("../../ckeditor/ckeditor.php"); 
    ?>
    <input id="today" type="hidden" name="today" value="<?php echo date("d/m/Y") ?>" />
		<form action="#" method="post" id="formAddEdit">
			<div class="info-title"><span>Những mục có dấu (*) là bắt buộc phải nhập</span></div>
			<div class="warpper">
				<div class="info">
					<div class="info-l">
						<div class="row">
							<label for="">Loại tour<span class="red"> ( * )</span>
							</label>
							<select name="areaIdDto" onchange="ajax_arrive()">
							<!-- id="areaIdDto" -->
							<option value="">Chọn loại tour</option>
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
							<textarea id="tenTourDto" name="tenTourDto" placeholder="Nhập tên tour"></textarea>
						</div>
						<div class="row">
							<label for="">Nơi khởi hành <span class="red"> ( * )</span></label>
							<select name="tourFromPlaceIdDto">
								<option value="">Chọn nơi khỏi hành</option>
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
							<select class="tourArrivePlaceIdDto" name="tourArrivePlaceIdDto">
								<option value="">Chọn địa điểm đến</option>
							</select>
						</div>
						<div class="row">
							<label for="">Hướng dẫn viên <span class="red"> ( * )</span></label>
							<select name="tourGuiderIdDto">
								<option value="">Chọn hướng dẫn viên</option>
							<?php 
								$sql = "SELECT * FROM guider where guider_delete_date is null";
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
							<input id="soChoDto" type="text" name="soChoDto" value=""
							placeholder="Nhập số lượng người tham gia" />
						</div>
						<div class="row">
							<label for="">Ngày khởi hành <span class="red"> ( * )</span></label>
							<input id="ngayKHDto" type="text" name="ngayKHDto" value="" placeholder="dd/mm/yyyy" />
						</div>
						<div class="row">
							<label for="">Ngày kết thúc <span class="red"> ( * )</span></label>
							<input id="ngayKTDto" type="text" name="ngayKTDto" value="" placeholder="dd/mm/yyyy" />
							<div class="error-r"></div>
						</div>
						<div class="row">
							<label for="">Dịch vụ <span class="red"> ( * )</span></label>
							<select name="idDichVuDto">
								<option value="">Chọn loại dịch vụ</option>
								<?php 
									$sql = "SELECT * FROM services where services_delete_date is null";
									$query = mysql_query($sql);
									while($row_service = mysql_fetch_array($query)){
								?>
								<option value="<?php echo $row_service['services_id']; ?>"><?php echo $row_service['services_name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="row">
							<label for="">Giá tour <span class="red"> ( * )</span></label>
							<input id="giaTourDto" type="text" name="giaTourDto" value="" placeholder="Nhập giá tour" />
						</div>
						<div class="row">
							<label for="">Giá khuyến mãi</label>
							<input id="giaTourKMDto" type="text" name="giaTourKMDto" value="" placeholder="Nhập giá khuyến mãi" />
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="thumb">
					<label>Ảnh minh họa Ảnh minh họa </label>
					<input id="imageDto" type="file" name="imageDto" value="" />
					<input id="tourImageDataDto" type="hidden" name="tourImageDataDto" value="" />
					<div id="img">Chưa có hành ảnh</div>
				</div>
				<div class="details">
					<label>Thông tin chi tiết tour</label>
					<!-- <textarea name="infoDto" id="infoDto" rows="2" style="width:100%" ></textarea> -->
					<?php 
		               // $CKEditor = new CKEditor();
		               //  $CKEditor->basePath = 'ckeditor/';
		               // $CKEditor->replace("infoDto");
		            ?>
		            <div id="editor"></div>
					<script> initSample(); </script>
		            <div class="error-r"></div>
		            <div class="clear"></div>
		            
				</div>
			</div>
			<div class="btn">
				<input class="btn-reset" type="reset" name="" value="Nhập lại" />
				<!-- <a class="btn-add" href="#" onclick="click_load()" >Tạo tour</a> -->
				<button class="btn-add" type="submit">Tạo tour</button>
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
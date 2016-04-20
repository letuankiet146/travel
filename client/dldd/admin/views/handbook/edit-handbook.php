	<script type="text/javascript">
        $(function() {
            $( "#dateCreateDto" ).datepicker({
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
    <script type="text/javascript" src="js/handbook/edit-handbook.js"></script>
    <?php
    	include ('../../connectDB.php');
    	include ("../../ckeditor/ckeditor.php"); 
    	$id = $_GET['handbook_id'];
    	$sql = "SELECT * FROM hand_book h join area a on h.area=a.area_id join status s on h.status=s.status_id where id=" . $id;
    	$query = mysql_query($sql);
    	$row_handbook = mysql_fetch_array($query);
    	$date_create = $row_handbook['date_create'];
		$fdate_create = date("d/m/Y", strtotime($date_create));
    ?>
		<input id="tourImageDataDto" type="hidden" name="tourImageDataDto" value="<?php echo $row_handbook['image']; ?>" />
		<input id="id" type="hidden" name="id" value="<?php echo $id; ?>" />
		<form action="#" method="post" accept-charset="utf-8" id="formAddEdit">
			<div class="info-title"><span>Những mục có dấu (*) là bắt buộc phải nhập</span></div>
			<div class="warpper">
				<div class="info">
					<div class="info-l">
						<div class="row">
							<label for="">Thể loại<span class="red"> ( * )</span></label>
							<select id="areaDto" name="areaDto" disabled>
								<option value="<?php echo $row_handbook['area']; ?>"><?php echo $row_handbook['area_name']; ?></option>
							</select>
						</div>
						<div class="row">
							<label for="">Mã cẩm nang<span class="red"> ( * )</span></label>
							<input id="codeDto" type="text" name="codeDto" value="<?php echo $row_handbook['code']; ?>" disabled  />
						</div>
					</div>
					<div class="info-r">
						<div class="row">
							<label for="">Tên cẩm nang <span class="red"> ( * )</span></label>
							<input id="nameDto" type="text" name="nameDto" value="<?php echo $row_handbook['name']; ?>" placeholder="Nhập tên cẩm nang" />
						</div>
						<div class="row">
							<label for="">Ngày tạo <span class="red"> ( * )</span></label>
							<input id="dateCreateDto" type="text" name="dateCreateDto" value="<?php echo $fdate_create; ?>" placeholder="dd/mm/yyyy" />
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="thumb">
					<label>Ảnh minh họa Ảnh minh họa</label>
					<input id="imageDto" type="file" name="imageDto" value="abc" />
					<div id="img"><img src="<?php echo $row_handbook['image']; ?>" alt="" /></div>
				</div>
				<div class="details">
					<label>Thông tin chi tiết cẩm nang</label>
					<textarea name="infoDto" id="infoDto" rows="2" style="width:100%" ><?php echo $row_handbook['info']; ?></textarea>
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
				<button type="submit" class="btn-add">Cập nhật</button>
				<div class="row">
					<label for="">Trạng thái</label>
					<select id="statuDto" name="statuDto">
						<option value="<?php echo $row_handbook['status']; ?>"><?php echo $row_handbook['status_name']; ?></option>
						<option value="8">------------</option>
						<option value="8">Chưa hiển thị</option>
						<option value="7">Hiển thị</option>
					</select>
				</div>
				<div class="clear"></div>
			</div>
		</form>
		<div class="clear"></div>	
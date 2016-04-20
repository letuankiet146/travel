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
    <script type="text/javascript" src="js/handbook/add-handbook.js"></script>
    <?php
    	include ('../../connectDB.php');
    	include ("../../ckeditor/ckeditor.php"); 
    ?>
		<input id="tourImageDataDto" type="hidden" name="tourImageDataDto" value="" />
		<form action="#" method="post" accept-charset="utf-8" id="formAddEdit">
			<div class="info-title"><span>Những mục có dấu (*) là bắt buộc phải nhập</span></div>
			<div class="warpper">
				<div class="info">
					<div class="info-l">
						<div class="row">
							<label for="">Thể loại<span class="red"> ( * )</span></label>
							<select id="areaDto" name="areaDto">
								<option value="">Chọn thể loại</option>
								<option value="1">Trong nước</option>
								<option value="2">Nước ngoài</option>
							</select>
						</div>
						<div class="row">
							<?php 
								$sql="SELECT id FROM hand_book ORDER BY id DESC";
								$query=mysql_query($sql);
								$row=mysql_fetch_array($query);
								$id=$row['id']+1;
							?>
							<label for="">Mã cẩm nang<span class="red"> ( * )</span></label>
							<input id="codeDto" type="text" name="codeDto" value="MACNDL<?php echo $id; ?>" disabled  />
						</div>
					</div>
					<div class="info-r">
						<div class="row">
							<label for="">Tên cẩm nang <span class="red"> ( * )</span></label>
							<input id="nameDto" type="text" name="nameDto" value="" placeholder="Nhập tên cẩm nang" />
						</div>
						<div class="row">
							<label for="">Ngày tạo <span class="red"> ( * )</span></label>
							<input id="dateCreateDto" type="text" name="dateCreateDto" value="" placeholder="dd/mm/yyyy" />
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="thumb">
					<label>Ảnh minh họa Ảnh minh họa</label>
					<input id="imageDto" type="file" name="imageDto" value="" />
					<div id="img">Chưa có hành ảnh</div>
				</div>
				<div class="details">
					<label>Thông tin chi tiết cẩm nang</label>
					<textarea name="infoDto" id="infoDto" rows="2" style="width:100%" ></textarea>
					<?php 
		               $CKEditor = new CKEditor();
		                $CKEditor->basePath = 'ckeditor/';
		               $CKEditor->replace("infoDto");
		            ?>
		            <div class="error"></div>
		            <div class="clear"></div>
				</div>
			</div>
			<div class="btn">
				<input class="btn-reset" type="reset" name="" value="Nhập lại" />
				<button type="submit" class="btn-add">Tạo cẩm nang</button>
				<div class="row">
					<label for="">Trạng thái</label>
					<select id="statuDto" name="statuDto">
						<option value="8">Chưa hiển thị</option>
						<option value="7">Hiển thị</option>
					</select>
				</div>
				<div class="clear"></div>
			</div>
		</form>
		<div class="clear"></div>	
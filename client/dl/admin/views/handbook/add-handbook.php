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
		<?php include ("ckeditor/ckeditor.php"); ?>
		<form action="#" method="post" accept-charset="utf-8" id="formAddEdit">
			<div class="info-title"><span>Những mục có dấu (*) là bắt buộc phải nhập</span></div>
			<div class="warpper">
				<div class="info">
					<div class="info-l">
						<div class="row">
							<label for="">Thể loại<span class="red"> ( * )</span>
							</label>
							<select id="areaIdDto" onchange="ajax_arrive()">
							<option value="0">Chọn thể loại</option>
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
							<label for="">Mã cẩm nang<span class="red"> ( * )</span></label>
							<label><input id="idTourDto" type="text" name="idTourDto" value="MACNDL<?php echo $id; ?>" disabled  /></label>
						</div>
							
					</div>
					<div class="info-r">
						<div class="row">
							<label for="">Tên cẩm nang <span class="red"> ( * )</span></label>
							<label><input id="tenTourDto" type="text" name="" value="" placeholder="Nhập tên tour" /></label>
						</div>
						<div class="row">
							<label for="">Ngày tạo <span class="red"> ( * )</span></label>
							<label><input id="ngayKHDto" type="text" name="" value="" placeholder="dd/mm/yyyy" /></label>
							<input id="today" type="hidden" name="today" value="<?php echo date("d/m/Y") ?>" />
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="thumb">
					<label>Ảnh minh họa Ảnh minh họa <span>(chỉ cho phép .JPG, .PNG, .GIF và dung lượng tối đa là 500Kb)</span></label>
					<input id="imageDto" type="file" name="" value="" />
				</div>
				<div class="details">
					<label>Thông tin chi tiết cẩm nang</label>
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
				<a class="btn-add" href="#" onclick="click_load()" >Tạo cẩm nang</a>
				<div class="row">
					<label for="">Trạng thái</label>
					<select id="activeDto">
						<option value="1">Chưa hiển thị</option>
						<option value="2">hiển thị</option>
					</select>
				</div>
				<div class="clear"></div>
			</div>
		</form>
		<div class="clear"></div>	
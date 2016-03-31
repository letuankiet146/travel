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
    	include ('../../connectDB.php');
    ?>
		<form action="#" method="post" accept-charset="utf-8" id="formAddEdit">
			<div class="info-title"><span>Những mục có dấu (*) là bắt buộc phải nhập</span></div>
			<div class="warpper">
				<div class="info">
					<div class="info-l">
						<div class="row">
							<?php 
								$sql="SELECT staff_id FROM customer ORDER BY staff_id DESC";
								$query=mysql_query($sql);
								$row=mysql_fetch_array($query);
								$id=$row['staff_id']+1;
								echo $row['staff_id'];
							?>
							<label for="">Mã nhân viên<span class="red"> ( * )</span></label>
							<label><input id="customerCode" type="text" name="customerCode" value="MANV<?php echo $id; ?>" disabled /></label>
						</div>
						<div class="row">
							<label for="">Họ và tên <span class="red"> ( * )</span></label>
							<label><input id="customerNameDto" type="text" name="customerNameDto" value="" placeholder="Nhập tên nhân viên" /></label>
						</div>
						<div class="row">
							<label for="">Giới tính<span class="red"> ( * )</span>
							</label>
							<select id="areaIdDto">
								<option value="0">Chọn giới tính</option>
								<option value="1">Nam</option>
								<option value="2">Nữ</option>
							</select>
						</div>
						<div class="row">
							<label for="">Email <span class="red"> ( * )</span></label>
							<label><input id="customerEmailDto" type="text" name="customerEmailDto" value="" placeholder="Nhập email" /></label>
						</div>
						<div class="row">
							<label for="">Số điện thoai <span class="red"> ( * )</span></label>
							<label><input id="customerPhoneDto" type="text" name="customerPhoneDto" value="" placeholder="Nhập số điện thoai" /></label>
						</div>
						<div class="row">
							<label for="">Địa chỉ <span class="red"> ( * )</span></label>
							<label><input id="customerAddressDto" type="text" name="customerAddressDto" value="" placeholder="Nhập địa chỉ" /></label>
						</div>
						
					</div>
					<div class="info-r">
						<div class="row">
							<label for="">Ngày Sinh <span class="red"> ( * )</span></label>
							<label><input id="ngayKTDto" type="text" name="" value="" placeholder="dd/mm/yyyy" /></label>
						</div>
						<div class="row">
							<label for="">Số CMND <span class="red"> ( * )</span></label>
							<label><input id="giaTourKMDto" type="text" name="" value="" placeholder="Nhập số chứng minh thư" /></label>
						</div>
						<div class="row">
							<label for="">Chức vụ<span class="red"> ( * )</span>
							</label>
							<select id="areaIdDto">
								<option value="0">Chọn chức vụ</option>
								<option value="1">Quản trị viên</option>
								<option value="2">Trưởng phòng</option>
								<option value="3">Nhân viên</option>
							</select>
						</div>
						<div class="row">
							<label for="">Tên đăng nhập <span class="red"> ( * )</span></label>
							<label><input id="soChoDto" type="text" name="" value=""
							placeholder="Nhập username" /></label>
						</div>
						<div class="row">
						<?php
							$keys = array_merge(range(0,9), range('a', 'z'));
						    for($i=0; $i < 8; $i++) {
						        $key .= $keys[mt_rand(0, count($keys) - 1)];
						    }
						?>
							<label for="">Mật khẩu <span class="red"> ( * )</span></label>
							<label><input id="customerPasswordDto" type="text" name="customerPasswordDto" value="<?php echo $key; ?>" disabled /></label>
						</div>
						<div class="row">
							<label for="">Ngày vào làm <span class="red"> ( * )</span></label>
							<label><input id="ngayKHDto" type="text" name="" value="" placeholder="dd/mm/yyyy" /></label>
							<input id="today" type="hidden" name="today" value="<?php echo date("d/m/Y") ?>" />
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
				<a class="btn-add" href="#" onclick="click_load()" >Thêm nhân viên</a>					
				<div class="clear"></div>
			</div>
		</form>
		<div class="clear"></div>
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
    	$id=$_GET["staff_id"]; 
    	$sql = "SELECT * FROM staff s join group_users g on s.staff_level=g.group_users_id where staff_id = " . $id;
    	$query=mysql_query($sql);
    	$row=mysql_fetch_array($query);
    	$dayStart = $row['staff_date_start'];
		$fdayStart = date("d/m/Y", strtotime($dayStart));
		$daybirthday = $row['staff_birthday'];
		$fdaybirthday = date("d/m/Y", strtotime($daybirthday));
    ?>
    <input type="hidden" id="touridDto" name="touridDto" value="<?php echo $id; ?>" />
	<form action="#" method="post" accept-charset="utf-8" id="formAddEdit">
		<div class="info-title"><span>Những mục có dấu (*) là bắt buộc phải nhập</span></div>
		<div class="warpper">
			<div class="info">
				<div class="info-l">
					<div class="row">
						<label for="">Mã nhân viên<span class="red"> ( * )</span></label>
						<label><input id="customerCode" type="text" name="customerCode" value="<?php echo $row['staff_code']; ?>" disabled /></label>
					</div>
					<div class="row">
						<label for="">Họ và tên <span class="red"> ( * )</span></label>
						<label><input id="customerNameDto" type="text" name="customerNameDto" value="<?php echo $row['staff_name']; ?>" placeholder="Nhập tên nhân viên" /></label>
					</div>
					<div class="row">
						<label for="">Giới tính<span class="red"> ( * )</span>
						</label>
						<select id="areaIdDto">
							<option value="<?php echo $row['staff_sex']; ?>"><?php echo $row['staff_sex']; ?></option>
							<option value="Nam">Nam</option>
							<option value="Nữ">Nữ</option>
						</select>
					</div>
					<div class="row">
						<label for="">Email <span class="red"> ( * )</span></label>
						<label><input id="customerEmailDto" type="text" name="customerEmailDto" value="<?php echo $row['staff_email']; ?>" placeholder="Nhập email" /></label>
					</div>
					<div class="row">
						<label for="">Số điện thoai <span class="red"> ( * )</span></label>
						<label><input id="customerPhoneDto" type="text" name="customerPhoneDto" value="<?php echo $row['staff_phone']; ?>" placeholder="Nhập số điện thoai" /></label>
					</div>
					<div class="row">
						<label for="">Địa chỉ <span class="red"> ( * )</span></label>
						<label><input id="customerAddressDto" type="text" name="customerAddressDto" value="<?php echo $row['staff_address']; ?>" placeholder="Nhập địa chỉ" /></label>
					</div>
					
				</div>
				<div class="info-r">
					<div class="row">
						<label for="">Ngày Sinh <span class="red"> ( * )</span></label>
						<label><input id="ngayKTDto" type="text" name="" value="<?php echo $fdaybirthday; ?>" placeholder="dd/mm/yyyy" /></label>
					</div>
					<div class="row">
						<label for="">Số CMND <span class="red"> ( * )</span></label>
						<label><input id="giaTourKMDto" type="text" name="" value="<?php echo $row['staff_vietnam_id']; ?>" placeholder="Nhập số chứng minh thư" /></label>
					</div>
					<div class="row">
						<label for="">Chức vụ<span class="red"> ( * )</span>
						</label>
						<select id="areaIdDto">
							<option value="<?php echo $row['staff_level']; ?>"><?php echo $row['group_users_name']; ?></option>
							<option value="1">Quản trị viên</option>
							<option value="2">Trưởng phòng</option>
							<option value="3">Nhân viên</option>
						</select>
					</div>
					<div class="row">
						<label for="">Tên đăng nhập <span class="red"> ( * )</span></label>
						<label><input id="soChoDto" type="text" name="" value="<?php echo $row['staff_user']; ?>"
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
						<label><input id="customerPasswordDto" type="text" name="customerPasswordDto" value="<?php echo $row['staff_password']; ?>" disabled /></label>
					</div>
					<div class="row">
						<label for="">Ngày vào làm <span class="red"> ( * )</span></label>
						<label><input id="ngayKHDto" type="text" name="" value="<?php echo $fdayStart; ?>" placeholder="dd/mm/yyyy" /></label>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="details">
				<label>Ghi chú</label>
				<textarea name="infoDto" id="infoDto" rows="4" style="width:100%" placeholder="Nhập Ghi chú về khách hàng" ><?php echo $row['staff_note']; ?></textarea>
	            <div class="clear"></div>
			</div>
		</div>
		<div class="btn">
			<input class="btn-reset" type="reset" name="" value="Nhập lại" />
			<a class="btn-add" href="#" onclick="click_load()" >Cập nhật</a>					
			<div class="clear"></div>
		</div>
	</form>
	<div class="clear"></div>

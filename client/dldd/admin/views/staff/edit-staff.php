	<script type="text/javascript">
        $(function() {
            $( "#staffBirthday" ).datepicker({
              showOn: "button",
              buttonImage: "js/datepicker/images/icon-picker.png",
              buttonImageOnly: true,
              buttonText: "Select date"
            });
            $( "#staffDateStart" ).datepicker({
              showOn: "button",
              buttonImage: "js/datepicker/images/icon-picker.png",
              buttonImageOnly: true,
              buttonText: "Select date"
            });
        });
    </script>
    <script type="text/javascript" src="js/staff/edit-staff.js"></script>
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
    <input type="hidden" id="staffId" name="staffId" value="<?php echo $id; ?>" />
	<form action="#" method="post" accept-charset="utf-8" id="formAddEdit">
		<div class="info-title"><span>Những mục có dấu (*) là bắt buộc phải nhập</span></div>
		<div class="warpper">
			<div class="info">
				<div class="info-l">
					<div class="row">
						<label for="">Mã nhân viên<span class="red"> ( * )</span></label>
						<input id="staffCode" type="text" name="staffCode" value="<?php echo $row['staff_code']; ?>" disabled />
					</div>
					<div class="row">
						<label for="">Họ và tên <span class="red"> ( * )</span></label>
						<input id="staffName" type="text" name="staffName" value="<?php echo $row['staff_name']; ?>" placeholder="Nhập tên nhân viên" />
					</div>
					<div class="row">
						<label for="">Giới tính<span class="red"> ( * )</span></label>
						<select id="staffSex" name="staffSex">
							<option value="<?php echo $row['staff_sex']; ?>"><?php echo $row['staff_sex']; ?></option>
							<option value="">-----------</option>
							<option value="Nam">Nam</option>
							<option value="Nữ">Nữ</option>
						</select>
					</div>
					<div class="row">
						<label for="">Email <span class="red"> ( * )</span></label>
						<input id="staffEmail" type="text" name="staffEmail" value="<?php echo $row['staff_email']; ?>" placeholder="Nhập email" />
					</div>
					<div class="row">
						<label for="">Số điện thoai <span class="red"> ( * )</span></label>
						<input id="staffPhone" type="text" name="staffPhone" value="<?php echo $row['staff_phone']; ?>" placeholder="Nhập số điện thoai" />
					</div>
					<div class="row">
						<label for="">Địa chỉ <span class="red"> ( * )</span></label>
						<input id="staffAddress" type="text" name="staffAddress" value="<?php echo $row['staff_address']; ?>" placeholder="Nhập địa chỉ" />
					</div>
					
				</div>
				<div class="info-r">
					<div class="row">
						<label for="">Ngày Sinh <span class="red"> ( * )</span></label>
						<input id="staffBirthday" type="text" name="staffBirthday" value="<?php echo $fdaybirthday; ?>" placeholder="dd/mm/yyyy" />
					</div>
					<div class="row">
						<label for="">Số CMND <span class="red"> ( * )</span></label>
						<input id="staffVietNameId" type="text" name="staffVietNameId" value="<?php echo $row['staff_vietnam_id']; ?>" placeholder="Nhập số chứng minh thư" />
					</div>
					<div class="row">
						<label for="">Chức vụ<span class="red"> ( * )</span></label>
						<select id="staffLevel" name="staffLevel">
							<option value="<?php echo $row['staff_level']; ?>"><?php echo $row['group_users_name']; ?></option>
							<option value="">--------------</option>
							<option value="1">Quản trị viên</option>
							<option value="2">Nhân viên</option>
						</select>
					</div>
					<div class="row">
						<label for="">Tên đăng nhập <span class="red"> ( * )</span></label>
						<input id="staffUser" type="text" name="staffUser" value="<?php echo $row['staff_user']; ?>" placeholder="Nhập username" />
					</div>
					<div class="row">
					<?php
						$keys = array_merge(range(0,9), range('a', 'z'));
					    for($i=0; $i < 8; $i++) {
					        $key .= $keys[mt_rand(0, count($keys) - 1)];
					    }
					?>
						<label for="">Mật khẩu <span class="red"> ( * )</span></label>
						<input id="staffPassword" type="text" name="staffPassword" value="<?php echo $row['staff_password']; ?>" disabled />
					</div>
					<div class="row">
						<label for="">Ngày vào làm <span class="red"> ( * )</span></label>
						<input id="staffDateStart" type="text" name="staffDateStart" value="<?php echo $fdayStart; ?>" placeholder="dd/mm/yyyy" />
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="details">
				<label>Ghi chú</label>
				<textarea name="staffNote" id="staffNote" rows="4" style="width:100%" placeholder="Nhập Ghi chú về khách hàng" ><?php echo $row['staff_note']; ?></textarea>
	            <div class="clear"></div>
			</div>
		</div>
		<div class="btn">
			<input class="btn-reset" type="reset" name="" value="Nhập lại" />
			<button class="btn-add" type="submit">Cập nhật</button>					
			<div class="clear"></div>
		</div>
	</form>
	<div class="clear"></div>

	<script type="text/javascript">
        $(function() {
            $( "#staffDateStart" ).datepicker({
              showOn: "button",
              buttonImage: "js/datepicker/images/icon-picker.png",
              buttonImageOnly: true,
              buttonText: "Select date",
              changeMonth: true,
              changeYear: true,
              minDate: "-1M",
              maxDate: '+1W'
            });
            $( "#staffBirthday" ).datepicker({
              showOn: "button",
              buttonImage: "js/datepicker/images/icon-picker.png",
              buttonImageOnly: true,
              buttonText: "Select date",
              changeMonth: true,
              changeYear: true,
              maxDate: '-18Y'
            });
        });
    </script>
    <script type="text/javascript" src="js/staff/add-staff.js"></script>
	<?php
    	include ('../../connectDB.php');
    ?>
    	<input id="today" type="hidden" name="today" value="<?php echo date("d/m/Y") ?>" />
		<form action="#" method="post" id="formAddEdit" >
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
							<input id="staffCode" type="text" name="staffCode" value="MANV<?php echo $id; ?>" disabled />
						</div>
						<div class="row">
							<label>Họ và tên <span class="red"> ( * )</span></label>
							<input id="staffName" type="text" name="staffName" value="" placeholder="Nhập tên nhân viên" />
						</div>
						<div class="row">
							<label for="">Giới tính<span class="red"> ( * )</span></label>
							<select id="staffSex" name="staffSex">
								<option value="">Chọn giới tính</option>
								<option value="Nam">Nam</option>
								<option value="Nữ">Nữ</option>
							</select>
						</div>
						<div class="row">
							<label for="">Email <span class="red"> ( * )</span></label>
							<input id="staffEmail" type="text" name="staffEmail" value="" placeholder="Nhập email" />
						</div>
						<div class="row">
							<label for="">Số điện thoai <span class="red"> ( * )</span></label>
							<input id="staffPhone" type="text" name="staffPhone" value="" placeholder="Nhập số điện thoai" />
						</div>
						<div class="row">
							<label for="">Địa chỉ <span class="red"> ( * )</span></label>
							<input id="staffAddress" type="text" name="staffAddress" value="" placeholder="Nhập địa chỉ" />
						</div>
						
					</div>
					<div class="info-r">
						<div class="row">
							<label for="">Ngày Sinh <span class="red"> ( * )</span></label>
							<input id="staffBirthday" type="text" name="staffBirthday" value="" placeholder="dd/mm/yyyy" />
						</div>
						<div class="row">
							<label for="">Số CMND <span class="red"> ( * )</span></label>
							<input id="staffVietNameId" type="text" name="staffVietNameId" value="" placeholder="Nhập số chứng minh thư" />
						</div>
						<div class="row">
							<label for="">Chức vụ<span class="red"> ( * )</span></label>
							<select id="staffLevel" name="staffLevel">
								<option value="">Chọn chức vụ</option>
								<option value="1">Quản trị viên</option>
								<option value="2">Nhân viên</option>
							</select>
						</div>
						<div class="row">
							<label for="">Tên đăng nhập <span class="red"> ( * )</span></label>
							<input id="staffUser" type="text" name="staffUser" value=""
							placeholder="Nhập username" />
						</div>
						<div class="row">
						<?php
							$keys = array_merge(range(0,9), range('a', 'z'));
						    for($i=0; $i < 8; $i++) {
						        $key .= $keys[mt_rand(0, count($keys) - 1)];
						    }
						?>
							<label for="">Mật khẩu <span class="red"> ( * )</span></label>
							<input id="staffPassword" type="text" name="staffPassword" value="<?php echo md5($key); ?>" disabled />
						</div>
						<div class="row">
							<label for="">Ngày vào làm <span class="red"> ( * )</span></label>
							<input id="staffDateStart" type="text" name="staffDateStart" value="" placeholder="dd/mm/yyyy" />
						</div>
						
					</div>
					<div class="clear"></div>
				</div>
				<div class="details">
					<label>Ghi chú</label>
					<textarea name="staffNote" id="staffNote" rows="4" style="width:100%" placeholder="Nhập Ghi chú về nhân viên" ></textarea>
		            <div class="clear"></div>
				</div>
			</div>
			<div class="btn">
				<input class="btn-reset" type="reset" name="" value="Nhập lại" />
				<button class="btn-add" type="submit">Thêm nhân viên</button>
				<div class="clear"></div>
			</div>
		</form>
		<div class="clear"></div>
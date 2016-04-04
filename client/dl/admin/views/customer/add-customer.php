	<script type="text/javascript">
        $(function() {
            $( "#customerBirthDto" ).datepicker({
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
								$sql="SELECT customer_id FROM customer ORDER BY customer_id DESC";
								$query=mysql_query($sql);
								$row=mysql_fetch_array($query);
								$id=$row['customer_id']+1;
								// Random mật khẩu
								$keys = array_merge(range(0,9), range('a', 'z'));
						    	for($i=0; $i < 8; $i++) {
						        	$key .= $keys[mt_rand(0, count($keys) - 1)];
						   		}
							?>
							<label for="">Mã khách hàng<span class="red"> ( * )</span></label>
							<label><input id="customerCode" type="text" name="customerCode" value="MAKH<?php echo $id; ?>" disabled /></label>
						</div>
						<input id="customerPasswordDto" type="hidden" name="customerPasswordDto" value="<?php echo $key; ?>" />
						<div class="row">
							<label for="">Tên khách hàng <span class="red"> ( * )</span></label>
							<label><input id="customerNameDto" type="text" name="customerNameDto" value="" placeholder="Nhập tên khách hàng" /></label>
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
						<div class="row">
							<div class="row_left">
								<label for="">Ngày sinh <span class="red"> ( * )</span></label>
								<label><input id="customerBirthDto" type="text" name="customerBirthDto" value="" placeholder="dd/mm/yyyy" /></label>
								<div class="error"></div>
							</div>
							<div class="row_right">
								<label for="">Giới tính <span class="red"> ( * )</span></label>
								<select id="customerSexDto" name="customerSexDto">
									<option value="">Giới tính</option>
									<option value="Nam">Nam</option>
									<option value="Nu">Nữ</option>
								</select>
								<div class="error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="row">
							<label for="">Nhóm KM: <span class="red"> ( * )</span></label>
							<select id="customerGroupDto" name="customerGroupDto">
								<option value="7">Khách vãng lai</option>
								<option value="8">Khách hàng tiềm năng</option>
								<option value="9">Khách hàng thân thiết</option>
								<option value="10">Khách VIP</option>
							</select>
						</div>
					</div>
					<div class="info-r">
						<div class="row">
							<label for="">Thông tin liên quan</label>
						</div>
						<div class="row">
							<label for="">Công ty</label>
							<label><input id="customerCompanyNameDto" type="text" name="customerCompanyNameDto" value="" placeholder="Nhập tên công ty" /></label>
						</div>
						<div class="row">
							<label for="">Địa chỉ</label>
							<label><input id="customerAddressCompanyDto" type="text" name="customerAddressCompanyDto" value="" placeholder="Nhập địa chỉ công ty" /></label>
						</div>
						<div class="row">
							<label for="">Điện thoại</label>
							<label><input id="customerPhoneCompanyDto" type="text" name="customerPhoneCompanyDto" value="" placeholder="Nhập số điện thoại công ty" /></label>
						</div>
						<div class="row">
							<label for="">Thành phố</label>
							<label><input id="customerCityDto" type="text" name="customerCityDto" value="" placeholder="Nhập Tỉnh / Thành phố" /></label>
						</div>
						<div class="row">
							<label for="">Mã Quốc gia</label>
							<label><input id="customerCountryDto" type="text" name="customerCountryDto" value="" placeholder="Nhập mã quốc gia" /></label>
						</div>
						
					</div>
					<div class="clear"></div>
				</div>
				<div class="details">
					<label>Ghi chú</label>
					<textarea name="customerNoteDto" id="customerNoteDto" rows="4" style="width:100%" placeholder="Nhập Ghi chú về khách hàng" ></textarea>
		            <div class="clear"></div>
				</div>
			</div>
			<div class="btn">
				<input class="btn-reset" type="reset" name="" value="Nhập lại" />
				<a class="btn-add" href="#" onclick="click_load()" >Thêm khách hàng</a>					
				<div class="clear"></div>
			</div>
		</form>
		<div class="clear"></div>
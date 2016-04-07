    <script type="text/javascript">
        $(function() {
            $("#customerBirthDto").datepicker({
              showOn: "button",
              buttonImage: "js/datepicker/images/icon-picker.png",
              buttonImageOnly: true,
              buttonText: "Select date"
            });
        });

        var fields = $(".row").closest(".info").find( ":input" );
		jQuery.each( fields, function( i, field ) {
			var b = "#" + field.name;
			$(b).change(function(event) {
				$(b).closest(".row").find(".error").empty();
			});
		});
    </script>
    <?php 
    	include ('../../connectDB.php');
    	$id=$_GET["customer_id"]; 
    	$sql = "SELECT * FROM customer c join group_users g on c.customer_group=g.group_users_id WHERE c.customer_id = " . $id;
    	$query=mysql_query($sql);
    	$row=mysql_fetch_array($query);
    ?>
    	<input type="hidden" id="customerIdDto" name="customerIdDto" value="<?php echo $id; ?>" />
    	<input id="customerPasswordDto" type="hidden" name="customerPasswordDto" value="<?php echo $row['customer_password'] ?>" />
			<form action="" method="post" accept-charset="utf-8">
				<div class="info-title"><span>Những mục có dấu (*) là bắt buộc phải nhập</span></div>
				<div class="warpper">
					<div class="warpper-inner">
						<div class="title-info">Thông tin khách hàng</div>
						<div class="info">
							<div class="info-l">
								<div class="row">
									<label for="">Mã khách hàng<span class="red"> ( * )</span></label>
									<label><input id="customerCode" type="text" name="customerCode" value="<?php echo $row['customer_code'] ?>" disabled /></label>
								</div>
								<div class="row">
									<label for="">Tên khách hàng <span class="red"> ( * )</span></label>
									<label><input id="customerNameDto" type="text" name="customerNameDto" value="<?php echo $row['customer_name'] ?>" /></label>
									<div class="error"></div>
								</div>
								<div class="row">
									<label for="">Email <span class="red"> ( * )</span></label>
									<label><input id="customerEmailDto" type="text" name="customerEmailDto" value="<?php echo $row['customer_email'] ?>" /></label>
									<div class="error"></div>
								</div>
								<div class="row">
									<label for="">Số điện thoai <span class="red"> ( * )</span></label>
									<label><input id="customerPhoneDto" type="text" name="customerPhoneDto" value="<?php echo $row['customer_phone'] ?>" /></label>
									<div class="error"></div>
								</div>
								<div class="row">
									<label for="">Địa chỉ <span class="red"> ( * )</span></label>
									<label><input id="customerAddressDto" type="text" name="customerAddressDto" value="<?php echo $row['customer_address'] ?>" /></label>
									<div class="error"></div>
								</div>
								<div class="row">
									<div class="row_left">
										<label for="">Ngày sinh <span class="red"> ( * )</span></label>
										<label><input id="customerBirthDto" type="text" name="customerBirthDto" value="<?php echo date("d/m/Y", strtotime($row['customer_birth'])); ?>" placeholder="dd/mm/yyyy" /></label>
										<input id="today" type="hidden" name="today" value="<?php echo date("d/m/Y") ?>" />
										<div class="error"></div>
									</div>
									<div class="row_right">
										<label for="">Giới tính <span class="red"> ( * )</span></label>
										<select id="customerSexDto" name="customerSexDto">
											<option value="<?php echo $row['customer_sex']; ?>"><?php echo $row['customer_sex']; ?></option>
											<option value="">-----------</option>
											<option value="Nam">Nam</option>
											<option value="Nữ">Nữ</option>
										</select>
										<div class="error"></div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="row">
									<label for="">Nhóm KM: <span class="red"> ( * )</span></label>
									<select id="customerGroupDto" name="customerGroupDto">
										<option value="<?php echo $row['customer_group']; ?>"><?php echo $row['group_users_name']; ?></option>
										<option value="">-----------------</option>
										<option value="7">Khách vãng lai</option>
										<option value="8">Khách hàng tiềm năng</option>
										<option value="9">Khách hàng thân thiết</option>
										<option value="10">Khách VIP</option>
									</select>
									<div class="error"></div>
								</div>
							</div>
							<div class="info-r">
								<div class="row">
									<label for="">Thông tin liên quan</label>
								</div>
								<div class="row">
									<label for="">Công ty</label>
									<label><input id="customerCompanyNameDto" type="text" name="customerCompanyNameDto" value="<?php echo $row['customer_company_name'] ?>" /></label>
								</div>
								<div class="row">
									<label for="">Địa chỉ</label>
									<label><input id="customerAddressCompanyDto" type="text" name="customerAddressCompanyDto" value="<?php echo $row['customer_address_company'] ?>" /></label>
								</div>
								<div class="row">
									<label for="">Điện thoại</label>
									<label><input id="customerPhoneCompanyDto" type="text" name="customerPhoneCompanyDto" value="<?php echo $row['customer_phone_company'] ?>" /></label>
									<div class="error"></div>
								</div>
								<div class="row">
									<label for="">Thành phố</label>
									<label><input id="customerCityDto" type="text" name="customerCityDto" value="<?php echo $row['customer_city'] ?>" /></label>
								</div>
								<div class="row">
									<label for="">Mã Quốc gia</label>
									<label><input id="customerCountryDto" type="text" name="customerCountryDto" value="<?php echo $row['customer_country'] ?>" /></label>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="details">
							<label>Ghi chú</label>
							<textarea name="customerNoteDto" id="customerNoteDto" rows="4" placeholder="Nhập Ghi chú về khách hàng" ><?php echo $row['customer_note'] ?></textarea>
				            <div class="clear"></div>
						</div>
					</div>
				</div>
				<div class="warpper">
					<div class="warpper-inner">
						<div class="title-info">Thông tin Đơn đặt tour</div>
						<table cellspacing="0">
							<thead>
								<tr>
									<th>Mã đơn đặt tour</th>
									<th>Thông tin tour</th>
									<th>Ngày đặt tour</th>
									<th>Tình trạng</th>
									<th>Tổng tiền</th>

								</tr>
							</thead>
							<tbody>
							<?php 
								$sqlOrder = "SELECT * FROM form_order f join tour t on f.form_order_tour_id=t.tour_id join status s on f.form_order_is_pay=s.status_id WHERE f.form_order_customer_id = " . $id . " ORDER BY f.form_order_id DESC";
    							$queryOrder=mysql_query($sqlOrder);
    							while($rowOrder=mysql_fetch_array($queryOrder)){
    								$dayOrder = $rowOrder['form_order_date'];
									$fdayOrder = date("d/m/Y", strtotime($dayOrder));
							?>
								<tr>
									<td><a href="#"><?php echo $rowOrder['form_order_code'] ?></a></td>
									<td>
										<a href="#">
											<div>Mã tour: <?php echo $rowOrder['tour_code'] ?></div>
											<div>Tên tour: <?php echo $rowOrder['tour_name'] ?></div>
										</a>
									</td>
									<td class="text-center"><?php echo $fdayOrder; ?></td>
									<td class="text-center"><?php echo $rowOrder['status_name'] ?></td>
									<td><?php echo $rowOrder['form_order_code'] ?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="btn">
					<input class="btn-reset" type="reset" name="" value="Nhập lại" />
					<a class="btn-add" href="#" onclick="click_edit()" >Cập nhật</a>
					<div class="clear"></div>
				</div>
			</form>
			<div class="clear"></div>
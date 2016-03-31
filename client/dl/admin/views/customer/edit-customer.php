	<!-- MODULE MAIN -->
	<link rel="stylesheet" type="text/css" href="style/customer/customer.css" />
	<script type="text/javascript" src="js/customer/edit-customer.js"></script>	
    <?php 
    	$id=$_GET["Id"]; 
    	$sql = "SELECT * FROM customer c join group_users g on c.customer_group=g.group_users_id WHERE c.customer_id = " . $id;
    	$query=mysql_query($sql);
    	$row=mysql_fetch_array($query);
    ?>
	<div class="breadcrumb">
		<ul>
			<li><a href="#">Trang chủ</a></li>
			<li><a href="#">Quản lý tour</a></li>
		</ul>
	</div>
	<div class="add-edit" id="editTour" >
		<div class="title-inner">
			<h3 class="title-inner-l">Thông tin chi tiết</h3>
			<div class="title-inner-r">
				<ul>
					<li class="btn-exit"><a href="index.php?page=customer">Thoát</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="content">
			<form action="" method="post" accept-charset="utf-8">
				<div class="info-title"><span>Những mục có dấu (*) là bắt buộc phải nhập</span></div>
				<div class="warpper">
					<div class="warpper-inner">
						<div class="title-info">Thông tin khách hàng</div>
						<div class="info">
							<div class="info-l">
								<div class="row">
									<label for="">Mã khách hàng<span class="red"> ( * )</span></label>
									<label><input id="idTourDto" type="text" name="idTourDto" value="<?php echo $row['customer_code'] ?>" disabled /></label>
								</div>
								<div class="row">
									<label for="">Tên khách hàng <span class="red"> ( * )</span></label>
									<label><input id="idTourDto" type="text" name="idTourDto" value="<?php echo $row['customer_name'] ?>" /></label>
								</div>
								<div class="row">
									<label for="">Email <span class="red"> ( * )</span></label>
									<label><input id="ngayKHDto" type="text" name="" value="<?php echo $row['customer_email'] ?>" /></label>
								</div>
								<div class="row">
									<label for="">Số điện thoai <span class="red"> ( * )</span></label>
									<label><input id="giaTourKMDto" type="text" name="" value="<?php echo $row['customer_phone'] ?>" /></label>
								</div>
								<div class="row">
									<label for="">Địa chỉ <span class="red"> ( * )</span></label>
									<label><input id="giaTourKMDto" type="text" name="" value="<?php echo $row['customer_address'] ?>" /></label>
								</div>
								<div class="row">
									<label for="">Mật khẩu <span class="red"> ( * )</span></label>
									<label><input id="giaTourKMDto" type="text" name="" value="<?php echo $row['customer_password'] ?>" disabled /></label>
								</div>
							</div>
							<div class="info-r">
								<div class="row">
									<label for="">Công ty</label>
									<label><input id="tenTourDto" type="text" name="" value="<?php echo $row['customer_company_name'] ?>" /></label>
								</div>
								<div class="row">
									<label for="">Địa chỉ</label>
									<label><input id="tenTourDto" type="text" name="" value="<?php echo $row['customer_address_company'] ?>" /></label>
								</div>
								<div class="row">
									<label for="">Điện thoại</label>
									<label><input id="tenTourDto" type="text" name="" value="<?php echo $row['customer_phone_company'] ?>" /></label>
								</div>
								<div class="row">
									<label for="">Thành phố</label>
									<label><input id="ngayKTDto" type="text" name="" value="<?php echo $row['customer_phone_company'] ?>" /></label>
								</div>
								<div class="row">
									<label for="">Mã Quốc gia</label>
									<label><input id="giaTourDto" type="text" name="" value="<?php echo $row['customer_phone_company'] ?>" /></label>
								</div>
								<div class="row">
									<label for="">Nhóm khách hàng: </label>
									<select name="">
										<option value="<?php echo $row['customer_group'] ?>"><?php echo $row['group_users_name'] ?></option>
										<option value="0">-----------------</option>
										<option value="7">Khách vãng lai</option>
										<option value="8">Khách hàng tiềm năng</option>
										<option value="9">Khách hàng thân thiết</option>
										<option value="10">Khách VIP</option>
									</select>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="details">
							<label>Ghi chú</label>
							<textarea name="infoDto" id="infoDto" rows="4" placeholder="Nhập Ghi chú về khách hàng" ><?php echo $row['customer_note'] ?></textarea>
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
								$sqlOrder = "SELECT * FROM form_order f join tour t on f.form_order_tour_id=t.tour_id join status s on f.form_order_isPay=s.status_id WHERE f.form_order_customer_id = " . $id . " ORDER BY f.form_order_id DESC";
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
					<a class="btn-add" href="#" onclick="click_load()" >Cập nhật</a>
					<div class="clear"></div>
				</div>
			</form>
			<div class="clear"></div>
		</div>
	</div>
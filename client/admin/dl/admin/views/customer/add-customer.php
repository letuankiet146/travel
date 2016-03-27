	<?php
    	include ('../../config.php');
    ?>
    <script type="text/javascript" src="js/click.js"></script>
	<div class="title-inner">
		<h3 class="title-inner-l">Thêm khách hàng</h3>
		<div class="title-inner-r">
			<ul>
				<li class="btn-exit">Thoát</li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
	<div class="content" id="add-edit-tour">
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
							?>
							<label for="">Mã khách hàng<span class="red"> ( * )</span></label>
							<label><input id="idTourDto" type="text" name="idTourDto" value="MAKH<?php echo $id; ?>" disabled /></label>
						</div>
						<div class="row">
							<label for="">Tên khách hàng <span class="red"> ( * )</span></label>
							<label><input id="idTourDto" type="text" name="idTourDto" value="" placeholder="Nhập tên khách hàng" /></label>
						</div>
						<div class="row">
							<label for="">Email <span class="red"> ( * )</span></label>
							<label><input id="ngayKHDto" type="text" name="" value="" placeholder="Nhập email" /></label>
						</div>
						<div class="row">
							<label for="">Số điện thoai <span class="red"> ( * )</span></label>
							<label><input id="giaTourKMDto" type="text" name="" value="" placeholder="Nhập số điện thoai" /></label>
						</div>
						<div class="row">
							<label for="">Địa chỉ <span class="red"> ( * )</span></label>
							<label><input id="giaTourKMDto" type="text" name="" value="" placeholder="Nhập địa chỉ" /></label>
						</div>
						<div class="row">
						<?php
							$keys = array_merge(range(0,9), range('a', 'z'));
						    for($i=0; $i < 8; $i++) {
						        $key .= $keys[mt_rand(0, count($keys) - 1)];
						    }
						?>
							<label for="">Mật khẩu <span class="red"> ( * )</span></label>
							<label><input id="giaTourKMDto" type="text" name="" value="<?php echo $key; ?>" disabled /></label>
						</div>
					</div>
					<div class="info-r">
						<div class="row">
							<label for="">Công ty</label>
							<label><input id="tenTourDto" type="text" name="" value="" placeholder="Nhập tên công ty" /></label>
						</div>
						<div class="row">
							<label for="">Địa chỉ</label>
							<label><input id="tenTourDto" type="text" name="" value="" placeholder="Nhập địa chỉ công ty" /></label>
						</div>
						<div class="row">
							<label for="">Điện thoại</label>
							<label><input id="tenTourDto" type="text" name="" value="" placeholder="Nhập số điện thoại công ty" /></label>
						</div>
						<div class="row">
							<label for="">Thành phố</label>
							<label><input id="ngayKTDto" type="text" name="" value="" placeholder="Nhập Tỉnh / Thành phố" /></label>
						</div>
						<div class="row">
							<label for="">Mã Quốc gia</label>
							<label><input id="giaTourDto" type="text" name="" value="" placeholder="Nhập mã quốc gia" /></label>
						</div>
						<div class="row">
							<label for="">Nhóm khách hàng: </label>
							<select name="">
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
					<textarea name="infoDto" id="infoDto" rows="4" style="width:100%" placeholder="Nhập Ghi chú về khách hàng" ></textarea>
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
	</div>
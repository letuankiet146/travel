<?php 
	include '../../connectDB.php';
	$itemID = (int)$_POST["itemID"];
	$sql = "SELECT * FROM form_order f join customer c on f.form_order_customer_id=c.customer_id join tour t on f.form_order_tour_id=t.tour_id join status st on f.form_order_is_pay=st.status_id join group_users g on c.customer_group=g.group_users_id WHERE f.form_order_id =" . $itemID;
	$query = mysql_query($sql);
	$row_order = mysql_fetch_array($query);
	// format day
	$dayStart = $row_order['tour_day_start'];
	$fdayStart = date("d/m/Y", strtotime($dayStart));
	$dayEnd = $row_order['tour_day_end'];
	$fdayEnd = date("d/m/Y", strtotime($dayEnd));
?>
<input type="hidden" id="formOrderIdDto" name="formOrderIdDto" value="<?php echo $row_order['form_order_id']; ?>" />
<div class="info">
	<div class="info-customer">
		<div class="title-info">Thông tin liên hệ:</div>
		<ul>
		    <li>Họ tên : <strong><?php echo $row_order['customer_name'] ?></strong> <span class="red">( <?php echo $row_order['group_users_name'] ?> )</span></li>
		    <li>Điện thoại : <strong><?php echo $row_order['customer_phone'] ?></strong></li>
		    <li>Email : <strong><?php echo $row_order['customer_email'] ?></strong></li>
		    <li>Địa chỉ : <strong><?php echo $row_order['customer_address'] ?></strong></li>
		</ul>
		<div class="clear"></div>
	</div>
	<div class="info-address">
		<div class="title-info">Địa chỉ thanh toán:</div>
		<ul>
			<li>Hình thức thanh toán : <strong>Thanh toán online</strong></li>
		    <li>Họ tên : <strong><?php echo $row_order['customer_name'] ?></strong></li>
		    <li>Địa chỉ : <strong><?php echo $row_order['customer_address'] ?></strong></li>
		    <li>Yêu cầu thêm : <strong><?php echo $row_order['form_order_other_require'] ?></strong></li>
		</ul>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<div class="info-tour">
	<div class="title-info">Thông tin tour:</div>
	<div class="content">
		<table cellspacing="0">
			<thead>
				<tr>
					<th>Mã tour</th>
					<th>Tên tour</th>
					<th>Ngày khỏi hành</th>
					<th>Ngày kết thúc</th>
					<th>Người lớn</th>
					<th>Dưới 12t</th>
					<th>Dưới 2t</th>
					<th>Tổng tiền</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $row_order['tour_code'] ?>	</td>
					<td><?php echo $row_order['tour_name'] ?></td>
					<td class="text-center"><?php echo $fdayStart; ?></td>
					<td class="text-center"><?php echo $fdayEnd;  ?></td>
					<td class="text-center"><?php echo $row_order['form_order_quantity_adults'] ?></td>
					<td class="text-center"><?php echo $row_order['form_order_quantity_juvenile'] ?></td>
					<td class="text-center"><?php echo $row_order['form_order_quantity_child'] ?></td>
					<td><?php echo number_format($row_order['form_order_money'],0,"","."); ?><sup>đ</sup></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="info-tour">
	<div class="title-info">Cập nhật đơn hàng</div>
	<form action="" method="get" accept-charset="utf-8">
		<ul>
		    <li>
		    	<label>Cập nhật trạng thái</label>
		    	<select id="formOrderIsPayDto" name="formOrderIsPayDto" >
		    		<option value="<?php echo $row_order['form_order_is_pay']; ?>"><?php echo $row_order['status_name']; ?></option>
		    		<option value="0">---------------</option>
		    		<option value="5">Đã thanh toán</option>
		    		<option value="6">Chưa thanh toán</option>
		    	</select>
		    </li>
		    <li>
		    	<label>Ghi chú</label>
		    	<textarea id="formOrderQuantityOtherRequireDto" name="formOrderQuantityOtherRequireDto" rows="7"><?php echo $row_order['form_order_note']; ?></textarea>
		    </li>
		    <li>
		    	<a class="btn-add" href="#" onclick="click_edit()" >Cập nhật</a>
		    </li>
		</ul>
	</form>
</div>

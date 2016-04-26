<?php 
include 'model/customer.php';
session_start();
if(isset($_SESSION['name']))
{
?>   
<div class="wrapper">
    <!--=== BEGIN: BREADCRUMB ===-->
    <div id="vnt-navation" class="breadcrumb">
        <div class="navation">
            <ul>
                <li class="home"><a href="index.php">Trang chủ</a></li>
                <li>Khách hàng</li>
            </ul>
        </div>
    </div>
    <!--=== END: BREADCRUMB ===-->
    <div class="box_mid">
        <div class="mid-title">
            <div class="titleL">
                <h1>Trang cá nhân</h1>
            </div>
            <div class="titleR"></div>
            <div class="clear"></div>
        </div>
        <div class="mid-content">
            <div id="vnt-sidebar">
			    <!--===BEGIN: BOX===-->
			    <div class="box diadiem showinfo">
			        <div class="box-title">
			            <div class="fTitle">Quản trị tài khoản</div>
			        </div>
			        <div class="box-content">
			            <div class="list-diadiem">
			                <ul>
			                	<li><a href="index.php?page=khach-hang">Thông tin khách hàng</a></li>
			                	<li><a href="index.php?page=cap-nhat-thong-tin">Thay đổi thông tin cá nhân</a></li>
			                	<li><a href="index.php?page=thay-doi-mat-khau">Đổi mật khẩu đăng nhập</a></li>
			                	<li><a href="index.php?page=lich-su-dat-tour">Lịch sử đặt tour</a></li>
			                	<li><a href="include/login.php?thoat">Đăng xuất</a></li>
			                </ul>
			            </div>
			        </div>
			    </div>
			    <!--===END: BOX===-->
			</div>
            <div id="vnt-main">
            	<?php if($paged == 'khach-hang'){ ?>
            		<!--===BEGIN: BOX USER===-->
                    <div class="grid-tour">
                    	<div class="i-title">Thông tin khách hàng</div>
                    	<div class="col-md-12">
					        <div class="UserBox">
					            <table class="table table-responsive">
					             	<tbody>
					             	<?php
					             		foreach (listCustomersOne($_SESSION['id']) as $rows) {
						                    echo '<tr>
							                        <td scope="row" style="border-top:none">Tên khách hàng:</td>
							                        <td style="border-top:none">'.$rows["customer_name"].'</td>
							                    </tr>
							                    <tr>
							                        <td scope="row">Nhóm khách hàng:	</td>
							                        <td>
							                            <div style="margin-top:5px"> '.$rows["group_users_name"].' </div>
							                        </td>
							                    </tr>
							                    <tr>
							                        <td scope="row">Địa chỉ Email:</td>
							                        <td>'.$rows["customer_email"].'</td>
							                    </tr>
						                        <tr>
						                            <td scope="row">Điện thoại di động:</td>
						                            <td>'.$rows["customer_phone"].'</td>
						                        </tr>
							                    <tr>
							                        <td scope="row">Địa chỉ:</td>
							                        <td>'.$rows["customer_address"].'</td>
							                    </tr>
							                ';
						                }
					                ?>
					                </tbody>
					            </table>
					        </div>
					    </div>
					    <div class="clear"></div>
					    <div class="i-title">Lịch sử đặt tour</div>
					    <div class="table-responsive">
						    <table class="table table-hover" border="0" cellpadding="0" cellspacing="0">
						    <?php
						    	$list_order = listOrdersMore($_SESSION['id'],1);
						    	if($list_order != ''){
						    ?>
						        <thead>
						            <tr class="active">
						                <th>Mã đơn đặt tour</th>
						                <th>Thông tin chi tiết</th>
						                <th>Số tiền</th>
								        <th>Ngày đặt</th>
								        <th>Thao tác</th>
								    </tr>
						        </thead>
						        <tbody>
						        	<?php 
						        		
						        		foreach ($list_order as $rows){
							        		$date = date("d/m/Y", strtotime($rows['form_order_date']));
							        		$money = number_format($rows['form_order_money'],0,"",",");
								        	echo '	<tr>
										            	<td align="center">'.$rows["form_order_code"].'</td>
								                        <td>
								                            <div class="media">
								                                <div class="media-body">
								                                    <span>Mã tour: '.$rows["tour_code"].'</span>
								                                    </br>
								                                    <span>Tên tour: '.$rows["tour_name"].'</span>
								                            	</div>
								                            </div>
								                        </td>
								                        <td align="center">
								                            <p class="bold"> '.$money.'<sup>đ</sup></p>
								                            <!-- <span class="label label-default"> -->
				                                            <span class="label label-success">'.$rows["status_name"].'</span>
				                                        </td>
								                        <td><span class="small">'.$date.'</span></td>
								                        <td align="center">
								                            <div class="dropdown">
								                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Thao tác </br><span class="caret"></span></a>
								                                <ul class="dropdown-menu">
								                                    <li><a class="" href="index.php?page=lich-su-dat-tour/chi-tiet&order_id='.$rows["form_order_id"].'">Xem chi tiết</a></li>
								                                    <li><a class="" href="index.php?page=lich-su-dat-tour/yeu-cau-huy-don-dat-tour">Hủy đơn đặt tour</a></li>';
								                                if($rows["form_order_is_pay"] != 5){
								                                    echo '<li><a class="" href="">Thanh toán</a></li>';
								                                }
								                                echo '</ul>
								                            </div>
								                        </td>
										            </tr>';
						            	} ?>
						        </tbody>
						    <?php } else {echo '<div>Bạn chưa có đơn đặt tour nào</div>';} ?>
						    </table>
						</div>
						<div align="center">
					    	<a href="index.php?page=lich-su-dat-tour" class="btn btn-success">Xem thêm</a>
					    </div>
						<div class="clear"></div>
					</div>
					<!--===AND: BOX USER===-->
				<?php } ?>
				
				<?php if($paged == 'cap-nhat-thong-tin'){ ?>
					<!--===BEGIN: BOX REGISTER===-->
					<div class="grid-tour">
						<div class="col-md-10">
							<div class="i-title">Thông tin cá nhân</div>
							<div class="RegisterBox">
								<div class="form-horizontal mform2">
									<form action="" method="POST" accept-charset="utf-8">
										<div class="form-group">
											<label class="col-sm-4 control-label">Họ tên khách hàng:</label>
											<div class="col-sm-6">
												<input class="form-control" type="text" name="name" value="Phạm Thành Thảo" disabled />
											</div>
											<div class="clear"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Ngày sinh:</label>
											<div class="col-sm-6">
												<input class="form-control" type="text" name="birthday" value="13/10/1994" />
											</div>
											<div class="clear"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Giới tính</label>
											<div class="col-sm-3">
												<select name="sex" class="form-control">
													<option value="Nam">Nam</option>
													<option value="Nữ">Nữ</option>
												</select>
											</div>
											<div class="clear"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Email:</label>
											<div class="col-sm-6">
												<input class="form-control" type="text" name="email" value="ptthao13@gmail.com" />
											</div>
											<div class="clear"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Điện thoại di động:</label>
											<div class="col-sm-6">
												<input class="form-control" type="text" name="phone" value="0975293398" />
											</div>
											<div class="clear"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Địa chỉ:</label>
											<div class="col-sm-6">
												<textarea class="form-control" name="address"></textarea>
											</div>
											<div class="clear"></div>
										</div>
										<div class="form-group mform2btn noneMrbtm">
											<div class="col-sm-offset-4 col-sm-4 pdr5">
												<button type="submit" class="btn btn-block btn-success">Cập nhật</button>
											</div>
											<div class="col-sm-4 pdl5">
												<a href="index.php?page=khach-hang" class="btn btn-skip">Bỏ qua</a>
											</div>
											<div class="clear"></div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<!--===BEGIN: BOX REGISTER===-->
				<?php } ?>
				
				<?php if($paged == 'thay-doi-mat-khau'){ ?>
					<!--===BEGIN: BOX PASSWORD===-->
					<div class="grid-tour">
						<div class="col-md-10">
							<div class="i-title">Đổi mật khẩu đăng nhập</div>
							<div class="PasswordBox">
								<div class="form-horizontal mform2">
									<form action="index.php?page=thay-doi-mat-khau/xac-thuc" method="POST" accept-charset="utf-8">
										<div class="form-group">
											<label class="col-sm-4 control-label">Mật khẩu cũ:</label>
											<div class="col-sm-6">
												<input class="form-control" type="text" name="name" value="" />
											</div>
											<div class="clear"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Mật khẩu mới:</label>
											<div class="col-sm-6">
												<input class="form-control" type="text" name="birthday" value="" />
											</div>
											<div class="clear"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Nhập lại mật khẩu mới</label>
											<div class="col-sm-6">
												<input class="form-control" type="text" name="birthday" value="" />
											</div>
											<div class="clear"></div>
										</div>
										<div class="form-group mform2btn noneMrbtm">
											<div class="col-sm-offset-4 col-sm-4 pdr5">
												<button type="submit" class="btn btn-block btn-success">Thay đổi</button>
											</div>
											<div class="col-sm-4 pdl5">
												<a href="index.php?page=khach-hang" class="btn btn-skip">Bỏ qua</a>
											</div>
											<div class="clear"></div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<!--===END: BOX PASSWORD===-->
				<?php } ?>

				<?php if($paged == 'thay-doi-mat-khau/xac-thuc'){ ?>
					<!--===BEGIN: BOX PASSWORD===-->
					<div class="grid-tour">
						<div class="col-md-10">
							<div class="i-title">Đổi mật khẩu đăng nhập</div>
							<div class="PasswordBox">
								<div class="form-horizontal mform2">
									<form action="index.php?page=thay-doi-mat-khau/thanh-cong" method="POST" accept-charset="utf-8">
										<div class="form-group">
											<div class="col-sm-offset-4 col-sm-7">
												Để xác thực thay đổi mật khẩu, Travel đã gửi mã xác thực tới email <b>ptthao13@gmail.com</b>, nhập mã đó vào ô dưới đây để hoàn tất. Nếu bạn không nhận được mã xác thực <a href="">click vào đây</a> để nhận lại.
											</div>
											<div class="clear"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Mã xác thực:</label>
											<div class="col-sm-7">
												<input class="form-control" type="text" name="name" value="" />
											</div>
											<div class="clear"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Mã bảo mật:</label>
											<div class="col-sm-3 pdr5">
												<input class="form-control" type="text" name="email" value="" />
											</div>
											<div class="col-sm-3 pdl5">
												kjhkjfd
											</div>
											<div class="clear"></div>
										</div>
										<div class="form-group mform2btn noneMrbtm">
											<div class="col-sm-offset-4 col-sm-4 pdr5">
												<button type="submit" class="btn btn-block btn-success">Xác thực</button>
											</div>
											<div class="col-sm-4 pdl5">
												<a href="index.php?page=khach-hang" class="btn btn-skip">Bỏ qua</a>
											</div>
											<div class="clear"></div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<!--===END: BOX PASSWORD===-->
				<?php } ?>

				<?php if($paged == 'thay-doi-mat-khau/thanh-cong'){ ?>
					<!--===BEGIN: BOX PASSWORD===-->
					<div class="grid-tour">
						<div class="i-title">Đổi mật khẩu đăng nhập</div>
					        <div class="col-md-offset-1 col-md-8 pdtop2">
					            <div class="media">
					                <div class="media-body">
					                    <h4 style="color: #f00">Đổi mật khẩu đăng nhập thành công</h4>
					                    <p> Để tài khoản của bạn được an toàn hơn, bạn không nên cung cấp mật khẩu cho bất kỳ ai. Travel không yêu cầu bạn cung cấp mật khẩu bằng bất kỳ lý do nào. </p>
					                    <p class="pdtop2"><a href="index.php?page=khach-hang" class="btn btn-primary">Xem thông tin tài khoản</a><a href="" class="btn btn-skip">Đăng xuất</a></p>
					                </div>
					            </div>
					        </div>
						<div class="clear"></div>
					</div>
					<!--===END: BOX PASSWORD===-->
				<?php } ?>

				<?php if($paged == 'lich-su-dat-tour'){ ?>
					<!--===BEGIN: BOX HISTORY===-->
                    <div class="grid-tour">
					    <div class="i-title">Lịch sử đặt tour</div>
					    <div class="table-responsive">
						    <table class="table table-hover" border="0" cellpadding="0" cellspacing="0">
						    <?php
						    	$list_order = listOrdersMore($_SESSION['id']);
						    	if($list_order != ''){
						    ?>
						        <thead>
						            <tr class="active">
						                <th>Mã đơn đặt tour</th>
						                <th>Thông tin chi tiết</th>
						                <th>Số tiền</th>
								        <th>Ngày đặt</th>
								        <th>Thao tác</th>
								    </tr>
						        </thead>
						        <tbody>
						            <?php 
						        		
						        		foreach ($list_order as $rows){
							        		$date = date("d/m/Y", strtotime($rows['form_order_date']));
							        		$money = number_format($rows['form_order_money'],0,"",",");
								        	echo '	<tr>
										            	<td align="center">'.$rows["form_order_code"].'</td>
								                        <td>
								                            <div class="media">
								                                <div class="media-body">
								                                    <span>Mã tour: '.$rows["tour_code"].'</span>
								                                    </br>
								                                    <span>Tên tour: '.$rows["tour_name"].'</span>
								                            	</div>
								                            </div>
								                        </td>
								                        <td align="center">
								                            <p class="bold"> '.$money.'<sup>đ</sup></p>
								                            <!-- <span class="label label-default"> -->
				                                            <span class="label label-success">'.$rows["status_name"].'</span>
				                                        </td>
								                        <td><span class="small">'.$date.'</span></td>
								                        <td align="center">
								                            <div class="dropdown">
								                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Thao tác </br><span class="caret"></span></a>
								                                <ul class="dropdown-menu">
								                                    <li><a class="" href="index.php?page=lich-su-dat-tour/chi-tiet&order_id='.$rows["form_order_id"].'">Xem chi tiết</a></li>
								                                    <li><a class="" href="index.php?page=lich-su-dat-tour/yeu-cau-huy-don-dat-tour">Hủy đơn đặt tour</a></li>';
								                                if($rows["form_order_is_pay"] != 5){
								                                    echo '<li><a class="" href="">Thanh toán</a></li>';
								                                }
								                                echo '</ul>
								                            </div>
								                        </td>
										            </tr>';
						            	} 
						            ?>
						        </tbody>
						    <?php } else {echo '<div>Bạn chưa có đơn đặt tour nào</div>';} ?>
						    </table>
						</div>

						<div class="clear"></div>
					</div>
					<!--===AND: BOX HISTORY==-->
				<?php } ?>

				<?php if($paged == 'lich-su-dat-tour/chi-tiet'){ ?>
					<!--===BEGIN: BOX HISTORY===-->
					<?php
	             		foreach (listOrdersOne($_GET['order_id']) as $key => $rows) {
	             			$money = number_format($rows["form_order_money"],0,"",",");
	             			$date = date("d/m/Y", strtotime($rows["form_order_date"]));
	             			$dateKH = date("d/m/Y", strtotime($rows["tour_day_start"]));
	             			$dateKT = date("d/m/Y", strtotime($rows["tour_day_end"]));
	             			$total = $rows["form_order_quantity_adults"]+$rows["form_order_quantity_juvenile"]+$rows["form_order_quantity_child"];
	             			echo '	
                    <div class="grid-tour">
					    <div class="i-title">Chi tiết đơn đặt tour</div>
                    	<div class="col-md-6">
					        <div class="HistoryBox">
					            <table class="table table-responsive">
					             	<tbody>
					             		<tr class="bold">
					                        <td scope="row" style="border-top:none">Mã đơn hàng:</td>
					                        <td style="border-top:none">'.$rows["form_order_code"].'</td>
						                    </tr>
						                    <tr>
						                        <td scope="row">Số tiền:	</td>
						                        <td>
						                            <div>'.$money.'<sup>đ</sup></div>
						                        </td>
						                    </tr>
						                    <tr>
						                        <td scope="row">Ngày đặt:</td>
						                        <td>'.$date.'</td>
						                    </tr>
					                        <tr>
					                            <td scope="row">Hình thức thanh toán:</td>
					                            <td>Thanh toán online-qua Ngân Lượng</td>
					                        </tr>
						                    <tr>
						                        <td scope="row">Trạng thái:</td>
						                        <td>'.$rows["status_name"].'</td>
						                    </tr>
						                    <tr>
						                        <td scope="row">Ghi chú:</td>
						                        <td>'.$rows["form_order_other_require"].'</td>
						                    </tr>
					                </tbody>
					            </table>
					        </div>
					    </div>
					    <div class="col-md-6">
					        <div class="HistoryBox">
					            <table class="table table-responsive">
					             	<tbody>
										<tr class="bold">
					                        <td scope="row" style="border-top:none">Mã tour:</td>
					                        <td style="border-top:none">'.$rows["tour_code"].'</td>
					                    </tr>
					                    <tr>
					                        <td scope="row">Tên tour:	</td>
					                        <td>
					                            <div style="height: 20px; overflow: hidden;"><a href="index.php?page=chi-tiet-tour&tour_id=' .$rows['tour_id']. '" title="'.$rows["tour_name"].'" class="dropdown-toggle"> '.$rows["tour_name"].' </a> </div>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td scope="row">Ngày đi:</td>
					                        <td>'.$dateKH.'</td>
					                    </tr>
				                        <tr>
				                            <td scope="row">Ngày về:</td>
				                            <td>'.$dateKT.'</td>
				                        </tr>
					                    <tr>
					                        <td scope="row" style="min-width: 110px;">Nơi khỏi hành:</td>
					                        <td>'.$rows["from_place_name"].'</td>
					                    </tr>
					                    <tr>
					                        <td scope="row">Số lượng:</td>
					                        <td>'.$total.' (Người lớn: '.$rows["form_order_quantity_adults"].', Trẻ em: '.$rows["form_order_quantity_juvenile"].', Em bé: '.$rows["form_order_quantity_child"].')</td>
					                    </tr>
					                </tbody>
					            </table>
					        </div>
					    </div>
					    <div align="center">';
					    if($rows["form_order_is_pay"] != 5){
					    	echo '<a href="index.php?page=khach-hang" class="btn btn-success">Thanh toán</a>';
					    	}
					    	echo '<a href="index.php?page=lich-su-dat-tour" class="btn btn-skip">Quay lại</a>
					    </div>
						<div class="clear"></div>
					</div>
					';
	                    }
	                ?>
					<!--===AND: BOX HISTORY==-->
				<?php } ?>

				<?php if($paged == 'lich-su-dat-tour/yeu-cau-huy-don-dat-tour'){ ?>
					<!--===BEGIN: BOX HISTORY===-->
                    <div class="grid-tour">
					    <div class="i-title">Chi tiết đơn đặt tour</div>
                    	<div class="col-md-6">
					        <div class="HistoryBox">
					            <table class="table table-responsive">
					             	<tbody>
					                    <tr class="bold">
					                        <td scope="row" style="border-top:none">Mã đơn hàng:</td>
					                        <td style="border-top:none">DHDH</td>
					                    </tr>
					                    <tr>
					                        <td scope="row">Số tiền:	</td>
					                        <td>
					                            <div>30,000,000<sup>đ</sup></div>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td scope="row">Ngày đặt:</td>
					                        <td>17/04/2016 19:14:34</td>
					                    </tr>
				                        <tr>
				                            <td scope="row">Hình thức thanh toán:</td>
				                            <td>Thanh toán online-qua Ngân Lượng</td>
				                        </tr>
					                    <tr>
					                        <td scope="row">Trạng thái:</td>
					                        <td>Đã thanh toán</td>
					                    </tr>
					                </tbody>
					            </table>
					        </div>
					    </div>
					    <div class="col-md-6">
					        <div class="HistoryBox">
					            <table class="table table-responsive">
					             	<tbody>
					                    <tr class="bold">
					                        <td scope="row" style="border-top:none">Mã tour:</td>
					                        <td style="border-top:none">JHJHJH</td>
					                    </tr>
					                    <tr>
					                        <td scope="row">Tên tour:	</td>
					                        <td>
					                            <div style="height: 20px; overflow: hidden;"><a href="" title="" class="dropdown-toggle"> Khách hàng thân thiết Khách hàng thân thiết Khách hàng thân thiết Khách hàng thân thiết </a> </div>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td scope="row">Ngày đi:</td>
					                        <td>13/10/2015</td>
					                    </tr>
				                        <tr>
				                            <td scope="row">Ngày về:</td>
				                            <td>20/03/2016</td>
				                        </tr>
					                    <tr>
					                        <td scope="row" style="min-width: 110px;">Nơi khỏi hành:</td>
					                        <td>Nguyễn Văn Bảo</td>
					                    </tr>
					                    <tr>
					                        <td scope="row">Số lượng:</td>
					                        <td>3 (Người lớn: 1, Trẻ em: 1, Em bé: 0)</td>
					                    </tr>
					                </tbody>
					            </table>
					        </div>
					    </div>
						<div class="clear"></div>
					</div>

					<div class="grid-tour">
						<div class="i-title">Hủy bỏ đơn đặt tour</div>
						<div class="col-md-10">
							<ul class="progress">
				                <li class="active"><span class="number"><b>1</b></span><p>Nhập lý do</p></li>
				                <li class=""><span class="number"><b>2</b></span><p>Xác thực hủy bỏ</p></li>
				                <li><span class="number"><b>3</b></span><p>Hoàn tất</p></li>
				            </ul>
							<div class="RegisterBox">
								<div class="form-horizontal mform2">
									<form action="index.php?page=lich-su-dat-tour/xac-thuc" method="POST" accept-charset="utf-8">
										<div class="form-group">
											<label class="col-sm-4 control-label">Ngày hủy đơn:</label>
											<div class="col-sm-6">
												<input class="form-control" type="text" name="name" value="13/10/2016 13:30" disabled />
											</div>
											<div class="clear"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Lý do:</label>
											<div class="col-sm-6">
												<textarea class="form-control" name="address"></textarea>
											</div>
											<div class="clear"></div>
										</div>
										<div class="form-group mform2btn noneMrbtm">
											<div class="col-sm-offset-4 col-sm-4 pdr5">
												<button type="submit" class="btn btn-block btn-success">Gửi yêu cầu</button>
											</div>
											<div class="col-sm-4 pdl5">
												<a href="index.php?page=lich-su-dat-tour" class="btn btn-skip">Quay lại</a>
											</div>
											<div class="clear"></div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<!--===AND: BOX HISTORY==-->
				<?php } ?>

				<?php if($paged == 'lich-su-dat-tour/xac-thuc'){ ?>
					<div class="grid-tour">
					    <div class="i-title">Chi tiết đơn đặt tour</div>
                    	<div class="col-md-6">
					        <div class="HistoryBox">
					            <table class="table table-responsive">
					             	<tbody>
					                    <tr class="bold">
					                        <td scope="row" style="border-top:none">Mã đơn hàng:</td>
					                        <td style="border-top:none">DHDH</td>
					                    </tr>
					                    <tr>
					                        <td scope="row">Số tiền:	</td>
					                        <td>
					                            <div>30,000,000<sup>đ</sup></div>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td scope="row">Ngày đặt:</td>
					                        <td>17/04/2016 19:14:34</td>
					                    </tr>
				                        <tr>
				                            <td scope="row">Hình thức thanh toán:</td>
				                            <td>Thanh toán online-qua Ngân Lượng</td>
				                        </tr>
					                    <tr>
					                        <td scope="row">Trạng thái:</td>
					                        <td>Đã thanh toán</td>
					                    </tr>
					                </tbody>
					            </table>
					        </div>
					    </div>
					    <div class="col-md-6">
					        <div class="HistoryBox">
					            <table class="table table-responsive">
					             	<tbody>
					                    <tr class="bold">
					                        <td scope="row" style="border-top:none">Mã tour:</td>
					                        <td style="border-top:none">JHJHJH</td>
					                    </tr>
					                    <tr>
					                        <td scope="row">Tên tour:	</td>
					                        <td>
					                            <div style="height: 20px; overflow: hidden;"><a href="" title="" class="dropdown-toggle"> Khách hàng thân thiết Khách hàng thân thiết Khách hàng thân thiết Khách hàng thân thiết </a> </div>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td scope="row">Ngày đi:</td>
					                        <td>13/10/2015</td>
					                    </tr>
				                        <tr>
				                            <td scope="row">Ngày về:</td>
				                            <td>20/03/2016</td>
				                        </tr>
					                    <tr>
					                        <td scope="row" style="min-width: 110px;">Nơi khỏi hành:</td>
					                        <td>Nguyễn Văn Bảo</td>
					                    </tr>
					                    <tr>
					                        <td scope="row">Số lượng:</td>
					                        <td>3 (Người lớn: 1, Trẻ em: 1, Em bé: 0)</td>
					                    </tr>
					                </tbody>
					            </table>
					        </div>
					    </div>
						<div class="clear"></div>
					</div>
					<div class="grid-tour">
						<div class="i-title">Hủy bỏ đơn đặt tour</div>
						<div class="col-md-10">
							<ul class="progress">
				                <li class=""><span class="number"><b>1</b></span><p>Nhập lý do</p></li>
				                <li class="active"><span class="number"><b>2</b></span><p>Xác thực hủy bỏ</p></li>
				                <li><span class="number"><b>3</b></span><p>Hoàn tất</p></li>
				            </ul>
							<div class="PasswordBox">
								<div class="form-horizontal mform2">
									<form action="index.php?page=lich-su-dat-tour/thanh-cong" method="POST" accept-charset="utf-8">
										<div class="form-group">
											<div class="col-sm-offset-4 col-sm-7">
												Để xác thực hủy đơn đặt tour, Travel đã gửi mã xác thực tới email <b>ptthao13@gmail.com</b>, nhập mã đó vào ô dưới đây để hoàn tất. Nếu bạn không nhận được mã xác thực <a href="">click vào đây</a> để nhận lại.
											</div>
											<div class="clear"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Mã xác thực:</label>
											<div class="col-sm-7">
												<input class="form-control" type="text" name="name" value="" />
											</div>
											<div class="clear"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Mã bảo mật:</label>
											<div class="col-sm-3 pdr5">
												<input class="form-control" type="text" name="email" value="" />
											</div>
											<div class="col-sm-3 pdl5">
												kjhkjfd
											</div>
											<div class="clear"></div>
										</div>
										<div class="form-group mform2btn noneMrbtm">
											<div class="col-sm-offset-4 col-sm-4 pdr5">
												<button type="submit" class="btn btn-block btn-success">Xác thực</button>
											</div>
											<div class="col-sm-4 pdl5">
												<a href="index.php?page=khach-hang" class="btn btn-skip">Bỏ qua</a>
											</div>
											<div class="clear"></div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				<?php } ?>

				<?php if($paged == 'lich-su-dat-tour/thanh-cong'){ ?>
					<div class="grid-tour">
					    <div class="i-title">Chi tiết đơn đặt tour</div>
                    	<div class="col-md-6">
					        <div class="HistoryBox">
					            <table class="table table-responsive">
					             	<tbody>
					                    <tr class="bold">
					                        <td scope="row" style="border-top:none">Mã đơn hàng:</td>
					                        <td style="border-top:none">DHDH</td>
					                    </tr>
					                    <tr>
					                        <td scope="row">Số tiền:	</td>
					                        <td>
					                            <div>30,000,000<sup>đ</sup></div>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td scope="row">Ngày đặt:</td>
					                        <td>17/04/2016 19:14:34</td>
					                    </tr>
				                        <tr>
				                            <td scope="row">Hình thức thanh toán:</td>
				                            <td>Thanh toán online-qua Ngân Lượng</td>
				                        </tr>
					                    <tr>
					                        <td scope="row">Trạng thái:</td>
					                        <td>Đã thanh toán</td>
					                    </tr>
					                </tbody>
					            </table>
					        </div>
					    </div>
					    <div class="col-md-6">
					        <div class="HistoryBox">
					            <table class="table table-responsive">
					             	<tbody>
					                    <tr class="bold">
					                        <td scope="row" style="border-top:none">Mã tour:</td>
					                        <td style="border-top:none">JHJHJH</td>
					                    </tr>
					                    <tr>
					                        <td scope="row">Tên tour:	</td>
					                        <td>
					                            <div style="height: 20px; overflow: hidden;"><a href="" title="" class="dropdown-toggle"> Khách hàng thân thiết Khách hàng thân thiết Khách hàng thân thiết Khách hàng thân thiết </a> </div>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td scope="row">Ngày đi:</td>
					                        <td>13/10/2015</td>
					                    </tr>
				                        <tr>
				                            <td scope="row">Ngày về:</td>
				                            <td>20/03/2016</td>
				                        </tr>
					                    <tr>
					                        <td scope="row" style="min-width: 110px;">Nơi khỏi hành:</td>
					                        <td>Nguyễn Văn Bảo</td>
					                    </tr>
					                    <tr>
					                        <td scope="row">Số lượng:</td>
					                        <td>3 (Người lớn: 1, Trẻ em: 1, Em bé: 0)</td>
					                    </tr>
					                </tbody>
					            </table>
					        </div>
					    </div>
						<div class="clear"></div>
					</div>
					<div class="grid-tour">
							<div class="i-title">Hủy bỏ đơn đặt tour</div>
							<ul class="progress">
				                <li><span class="number"><b>1</b></span><p>Nhập lý do</p></li>
				                <li><span class="number"><b>2</b></span><p>Xác thực hủy bỏ</p></li>
				                <li class="active"><span class="number"><b>3</b></span><p>Hoàn tất</p></li>
				            </ul>
					        <div class="col-md-offset-1 col-md-8 pdtop2">
					            <div class="media">
					                <div class="media-body">
					                    <h4 style="color: #f00">Gửi yêu cầu hủy đơn đặt tour thành công</h4>
					                    <p>Travel sẽ giải quyết yêu cầu của bạn trong vong 24h</p>
					                    <p class="pdtop2"><a href="index.php?page=khach-hang" class="btn btn-primary">Xem thông tin tài khoản</a><a href="" class="btn btn-skip">Đăng xuất</a></p>
					                </div>
					            </div>
					        </div>
						<div class="clear"></div>
					</div>
					<!--===END: BOX PASSWORD===-->
				<?php } ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php }
else{
	echo"<script>document.location.href='index.php?page=dang-nhap' </script>";
} ?>
         
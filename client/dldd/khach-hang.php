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
						                </ul>
						            </div>
						        </div>
						    </div>
						    <!--===END: BOX===-->
						    <!--===BEGIN: BOX===-->
						    <div class="box global showinfo">
						        <div class="box-title"><div class="fTitle">Quản lý đơn đặt tour</div></div>
						        <div class="box-content">
						            <div class="list-diadiem">
						                <ul>
						                	<li><a href="">Lịch sử đặt tour</a></li>
						                	<li><a href="">Yêu cầu thay đổi thông tin đơn đặt tour</a></li>
						                	<li><a href="">Yêu cầu hủy đơn đặt tour</a></li>

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
								                    <tr>
								                        <td scope="row" style="border-top:none">Tên khách hàng:</td>
								                        <td style="border-top:none">Phạm Thành Thảo</td>
								                    </tr>
								                    <tr>
								                        <td scope="row">Nhóm khách hàng:	</td>
								                        <td>
								                            <div style="margin-top:5px"> Khách hàng thân thiết </div>
								                        </td>
								                    </tr>
								                    <tr>
								                        <td scope="row">Địa chỉ Email:</td>
								                        <td>phamthanhthao131094@gmail.com</td>
								                    </tr>
							                        <tr>
							                            <td scope="row">Điện thoại di động:</td>
							                            <td>0975-293-398</td>
							                        </tr>
								                    <tr>
								                        <td scope="row">Địa chỉ:</td>
								                        <td>Nguyễn Văn Bảo -   Quận Gò Vấp - Hồ Chí Minh</td>
								                    </tr>
								                </tbody>
								            </table>
								        </div>
								    </div>
								    <div class="clear"></div>
								    <div class="i-title">Lịch sử đặt tour</div>
								    <div class="table-responsive">
									    <table class="table table-hover" border="0" cellpadding="0" cellspacing="0">
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
									            <tr>
									            	<td align="center">MADDT33</td>
							                        <td>
							                            <div class="media">
							                                <div class="media-body">
							                                    <span>Mã tour: MADDT33</span>
							                                    <!-- </br> -->
							                                    <span>Tên tour: đ df df df dfdf dfd fdf dfd fd fd fd fdfd fd f g kkhgh jgkh jgkjh kgj h kgjhjgkh jgkhj gkhjkg jhkj gkhjgk jh</span>
							                            	</div>
							                            </div>
							                        </td>
							                        <td align="center">
							                            <p class="bold"> 100.020.000<sup>đ</sup></p>
							                            <!-- <span class="label label-default"> -->
		                                                <span class="label label-success">Đã thanh toán</span>
		                                            </td>
							                        <td><span class="small">13:15,<br>13/04/2016</span></td>
							                        <td align="center">
							                            <div class="dropdown">
							                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Thao tác </br><span class="caret"></span></a>
							                                <ul class="dropdown-menu">
							                                    <li><a class="" target="_blank" href="">Xem chi tiết</a></li>
							                                    <li><a class="" target="_blank" href="">Hủy đơn đặt tour</a></li>
							                                    <li><a class="" target="_blank" href="">Thanh toán</a></li>
							                                </ul>
							                            </div>
							                        </td>
									            </tr>
									        </tbody>
									    </table>
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
									<div class="row">
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
        
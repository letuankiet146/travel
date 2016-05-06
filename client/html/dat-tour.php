<?php
    // include 'model/customer.php';
    
?>
            <div class="wrapper">
                <!--=== BEGIN: BREADCRUMB ===-->
                <div id="vnt-navation" class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                    <div class="navation">
                        <ul>
                            <li class="home"><a href="index.php">Trang chủ</a></li>
                            <li><a href="tour-noi-dia.php">Tour nội địa</a></li>
                            <li>Đặt tour</li>
                        </ul>
                    </div>
                </div>
                <!--=== END: BREADCRUMB ===-->
                <div class="box_mid">
                    <div class="mid-title">
                        <div class="titleL">
                            <h1 id="h1">Nhập thông tin</h1>
                        </div>
                        <div class="titleR"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="mid-content">
                        <div class="vnt-order">
                            <form id="vnt-order" action="#" method="POST">
                                <div class="wrapper">
                                    <input type="hidden" name="code" id="code" value="MADDT<?php echo madonhang()+1; ?>"/>
                                    <?php if(isset($_SESSION['id'])){
                                    echo '<input type="hidden" name="customerIdDto" id="customerIdDto" value="' . $_SESSION['id'] . '" />
                                    <input type="hidden" name="codekh" id="codekh" value="MAKH'. makhachhang() . '" />';
                                    }else{ ?>
                                        <input type="hidden" name="customerIdDto" id="customerIdDto" value="" />
                                        <input type="hidden" name="codekh" id="codekh" value="MAKH<?php echo makhachhang()+1;?>" />
                                    <?php } ?>
                                    <div class="oder-left" id="oder_left"></div>
                                    <div class="oder-left">
                                        <div class="title">Thông tin liên hệ</div>
                                        <div class="row-input">
                                            <label for="name">Họ và tên <span>(*)</span></label>
                                            <div class="div-input">
                                                <input type="text" name="name" id="name" value="<?php echo $_SESSION['name']; ?>" class="form-control" <?php if(isset($_SESSION['name'])){ echo'disabled'; } ?> />
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="row-input">
                                            <label for="email">Email <span>(*)</span></label>
                                            <div class="div-input">
                                                <input type="text" name="email" id="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" <?php if(isset($_SESSION['email'])){ echo'disabled'; } ?> />
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="row-input">
                                            <label for="phone">Điện thoại <span>(*)</span></label>
                                            <div class="div-input">
                                                <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $_SESSION['phone']; ?>" <?php if(isset($_SESSION['phone'])){ echo 'disabled'; } ?> />
                                                <?php if(isset($_SESSION['phone'])){
                                                echo '<a class="edit" href="index.php?page=cap-nhat-thong-tin"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                                               } ?>
                                            </div>

                                            <div class="clear"></div>
                                        </div>
                                        <div class="row-input">
                                            <label for="address">Địa chỉ <span>(*)</span></label>
                                            <div class="div-input">
                                                <input type="text" name="address" id="address" class="form-control" value="<?php echo $_SESSION['address']; ?>" <?php if(isset($_SESSION['address'])){ echo 'disabled'; } ?> />
                                                <?php if(isset($_SESSION['address'])){
                                                echo '<a class="edit" href="index.php?page=cap-nhat-thong-tin"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                                               } ?>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="row-input">
                                            <label>Số lượng người</label>
                                            <div class="div-input">
                                                <table>
                                                    <tr>
                                                        <td><label for="total">Tổng số khách</label>
                                                        <input type="text" name="total" id="total" class="form-control" value="1" disabled  /></td>
                                                        <td><label for="nguoilon">Người lớn <span>(*)</span></label>
                                                        <input type="text" name="nguoilon" id="nguoilon" class="form-control" value="1" onchange="count_number();" /></td>
                                                        <td><label for="duoi12">Dưới 12 tuổi</label>
                                                        <input type="text" name="duoi12" id="duoi12" class="form-control" value="0" onchange="count_number();" /></td>
                                                        <td><label for="duoi2">Dưới 2 tuổi</label>
                                                        <input type="text" name="duoi2" id="duoi2" class="form-control" value="0" onchange="count_number();" /></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="row-input">
                                            <label for="t-content">Yêu cầu thêm</label>
                                            <div class="div-input">
                                                <textarea id="t-content" name="content" class="form-control" rows="2">
                                                </textarea>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="oder-left" id="thanhtoan">
                                        <div class="title">Hình thức thanh toán</div>
                                        <div class="row-input">
                                            <label style="cursor: pointer;"><input type="radio" name="thanhtoan" id="tructiep" onclick="" value="1" /> Thanh toán trực tiếp</label>
                                            <ul>
                                                <li>Vui lòng đến chi nhánh gần nhất và thanh toán trong vòng 3 ngày từ ngày đặt tour</li>
                                            </ul>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="row-input">
                                            <label style="cursor: pointer;"><input type="radio" name="thanhtoan" id="tructuyen" onclick="" /> Thanh toán trực tuyến</label>
                                            <ul>
                                                <li><label style="cursor: pointer;"><input type="radio" name="thanhtoan" id="nganluong" value="2" /> Bằng tài khoản Ngân Lượng</label></li>
                                                <li><label style="cursor: pointer;"><input type="radio" name="thanhtoan" id="baokim" value="3" /> Bằng tài khoản Bảo Kim</label></li>
                                            </ul>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="row-input">
                                            <label style="cursor: pointer;"><input type="radio" name="thanhtoan" id="chuyenkhoan" onclick="" value="4" /> Thanh toán chuyển khoản</label>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="row-input">
                                        <div class="div-input">
                                            <button type="submit" name="do_submit" id="do_submit" class="btn submit" value=""><span>Đặt tour</span></button>
                                            <button type="reset" name="reset" id="reset" class="btn reset" value=""><span>Nhập lại</span></button>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </form>
                            <div id="check"></div>
                        </div>
                    </div>
                </div>
            </div>
        
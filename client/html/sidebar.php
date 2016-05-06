<div id="vnt-sidebar">
    <!--===BEGIN: BOX===-->
    <div class="box search-tour showinfo">
        <div class="box-title">
            <div class="fTitle">
                Tìm tour du lịch
            </div>
        </div>
        <div class="box-content">
            <div class="w-searchTour">
                <form id="searchTour" method="POST" action="index.php?page=ket-qua-tim-kiem">
                    <div class="input-radio" id="area_id">
                        <ul>
                            <li class="active">
                                <label>
                                    <input type="radio" name="area" value="1" checked="checked" />
                                    <span>Trong nước</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" name="area" value="2" />
                                    <span>Nước ngoài</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="input-wrapper">
                        <div class="input-wrapper-content">
                            <select name="from" id="from" class="form-control">
                                <?php 
                                    $listFrom = listFromPlace();
                                    foreach ($listFrom as $rows){
                                        echo '<option value="'.$rows['from_place_id'].'">'.$rows['from_place_name'].'</option>';
                                    } 
                                ?>
                            </select>
                            <select name="to" id="to" class="form-control">
                                <?php echo listArrivePlace(1); ?>
                            </select>
                            <select name="price" id="price" class="form-control">
                                <option value="">Giá (VNĐ)</option>
                                <option value="1">Dưới 1 triệu</option>
                                <option value="2">1 - 2 triệu</option>
                                <option value="3">2 - 4 triệu</option>
                                <option value="4">4 - 6 triệu</option>
                                <option value="5">6 - 10 triệu</option>
                                <option value="6">Trên 10 triệu</option>
                            </select>
                            <input type="text" name="time" id="time" class="form-control" placeholder="Ngày khỏi hành" />
                            <input type="text" name="keyword" id="t-keyword" class="form-control full768" placeholder="từ khóa..." />
                        </div>
                        <span class="input-wrapper-btn">
                            <button type="submit" id="do_submit" name="do_submit" class="btn" value=""><span>Tìm tour</span></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--===END: BOX===-->
    <!--===BEGIN: BOX===-->
    <div class="box diadiem showinfo">
        <div class="box-title">
            <div class="fTitle">Điểm du lịch nội địa</div>
        </div>
        <div class="box-content">
            <div class="list-diadiem">
                <ul>
                <?php
                    foreach(dsDiaDiem(1) as $rows){
                        echo '<li><a href="#">Tour du lịch '.$rows["arrive_place_name"].'</a></li>';
                    }
                ?>
                </ul>
            </div>
        </div>
    </div>
    <!--===END: BOX===-->
    <!--===BEGIN: BOX===-->
    <div class="box global showinfo">
        <div class="box-title"><div class="fTitle">Điểm du lịch quốc tế</div></div>
        <div class="box-content">
            <div class="list-diadiem">
                <ul>
                    <?php
                        foreach(dsDiaDiem(2) as $rows){
                            echo '<li><a href="#">Tour du lịch '.$rows["arrive_place_name"].'</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <!--===END: BOX===-->
</div>
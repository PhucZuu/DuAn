
                <div class="row mb">
                    <div class="boxtitle">TÀI KHOẢN</div>
                    <div class="boxcontent formtaikhoan">
                        <?php
                            // session_start();
                            if(isset($_SESSION['user'])){
                                extract($_SESSION['user']);
                        ?>
                            <div class="row mb10">
                                Xin chào, <?= $user?>
                            </div>
                            <div class="row mb10">
                                <li><a href="index.php?act=doimk">Đổi mật khẩu</a></li>
                                <li><a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a></li>
                                <?php
                                    if($role==1){
                                ?>
                                <li><a href="admin/index.php">Đăng nhập admin</a></li>
                                <?php
                                    }
                                ?>
                                <li><a href="index.php?act=thoat">Thoát</a></li>
                            </div>
                        <?php
                            }else{
                        ?>
                        <form action="index.php?act=dangnhap" method="post">
                            <div class="row mb10">
                                <label for="">Tên đăng nhập</label><br>
                                <input type="text" name="user" required><br>
                            </div>
                            <div class="row mb10">
                                <label for="">Mật khẩu</label><br>
                                <input class="pass" type="password" name="pass" required><br>
                            </div>
                            <?php
                                if(isset($thongBao)&&($thongBao!="")){
                                    echo $thongBao;
                                }
                            ?>
                            <div class="row mb10">
                                <input class="check" type="checkbox"><label for="">Hiện mật khẩu</label><br>
                            </div>
                            <div class="row mb10">
                                <input class="check" type="checkbox"><label for="">Ghi nhớ tài khoản</label><br>
                            </div>
                            <div class="row mb10">
                                <input type="submit" value="ĐĂNG NHẬP" name="dangnhap">
                            </div>
                        </form>
                        <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                        <li><a href="index.php?act=dangky">Đăng ký tài khoản</a></li>
                        <?php }  ?>
                    </div>
                </div>
                <div class="row mb">
                    <div class="boxtitle">DANH MỤC</div>
                    <div class="boxcontent2 menudoc">
                        <ul>
                            <!-- <li><a href="#">Bánh ngọt</a></li> -->
                            <?php
                                foreach ($dsdm as $dm) {
                                    extract($dm);
                                    $linkdm="index.php?act=sanpham&iddm=".$id;
                                    echo '<li><a href="'.$linkdm.'">'.$name.'</a></li>';
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="boxfooter searchbox">
                        <form action="index.php?act=sanpham" method="post">
                            <input type="text" name="kyw" placeholder="Nhập từ khóa tìm kiếm" required>
                            
                        </form>
                    </div>

                </div>
                <div class="row">
                    <div class="boxtitle">TOP 10 SẢN PHẨM ƯA THÍCH</div>
                    <div class="boxcontent row">
                        <!-- <div class="row mb10 top10">
                            <img src="view/images/bánh2dọc.png" alt="">
                            <a href="#">Bánh ngọt</a>
                        </div> -->
                        <?php
                            foreach($dstop10 as $sp){
                                extract($sp);
                                $linksp="index.php?act=sanphamct&idsp=".$id;
                                $img=$img_path.$img;
                                echo '<div class="row mb10 top10">
                                        <img src="'.$img.'" alt="">
                                        <a href="'.$linksp.'">'.$name.'</a>
                                    </div>';
                            }
                        ?>
                    </div>
                </div>
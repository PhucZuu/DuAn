<div class="row">
            <form action="#" method="post">
                <div class="row header formtitle"><h1>DANH SÁCH TÀI KHOẢN</h1></div>
                <div class="row formcontent">
                    <div class="row mb10 formdsloai">
                        <table>
                            <tr>
                                <th></th>
                                <th>MÃ KHÁCH HÀNG</th>
                                <th>HÌNH ẢNH</th>
                                <th>TÊN ĐĂNG NHẬP</th>
                                <th>EMAIL</th>
                                <th>ĐỊA CHỈ</th>
                                <th>SỐ ĐIỆN THOẠI</th>
                                <th>VAI TRÒ</th>
                                <th>THAO TÁC</th>
                            </tr>
                                <?php
                                    foreach ($listTaiKhoan as $tk){
                                        extract($tk);
                                        $suatk="index.php?act=suatk&id=$id";
                                        $xoatk="index.php?act=xoatk&id=$id";
                                        echo '
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td>'.$id.'</td>
                                            <td><img style="width: 100px; height: 75px" src="../uploads/'.$hinhAnh.'" alt=""></td>
                                            <td>'.$user.'</td>
                                            <td>'.$email.'</td>
                                            <td>'.$address.'</td>
                                            <td>'.$tel.'</td>
                                            <td>'.($role==1?"ADMIN":"USER").'</td>
                                            <td><a href="'.$suatk.'"><input type="button" value="SỬA"></a>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                ?>
                            
                        </table>
                    </div>
                    <div class="row mb">
                        <input type="button" value="Chọn tất cả">
                        <input type="button" value="Bỏ chọn tất cả">
                        <input type="button" value="Xóa các mục đã chọn">
                    </div>
                </div>
            </form>
            
        </div>
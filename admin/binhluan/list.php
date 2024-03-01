<div class="row">
            <form action="#" method="post">
                <div class="row header formtitle"><h1>DANH SÁCH BÌNH LUẬN</h1></div>
                <div class="row formcontent">
                    <div class="row mb10 formdsloai">
                        <table>
                            <tr>
                                <th></th>
                                <th>NỘI DUNG BÌNH LUẬN</th>
                                <th>TÊN NGƯỜI DÙNG</th>
                                <th>TÊN SẢN PHẨM</th>
                                <th>NGÀY BÌNH LUẬN</th>
                                <th>THAO TÁC</th>
                            </tr>
                                <?php
                                    foreach ($listbinhluan as $bl){
                                        extract($bl);
                                        $xoabl="index.php?act=xoabl&id=$idbl";
                                        echo '
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td>'.$noidung.'</td>
                                            <td>'.$tennguoidung.'</td>
                                            <td>'.$tensp.'</td>
                                            <td>'.$ngaybinhluan.'</td>
                                            <td>
                                                <a href="'.$xoabl.'"><input type="button" value="XÓA"></a>
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
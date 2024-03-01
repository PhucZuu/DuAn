<div class="row">
            <form action="#" method="post">
                <div class="row header formtitle mb"><h1>DANH SÁCH SẢN PHẨM</h1></div>
                <form action="index.php?act=listsp" method="post">
                    <input type="text" name="kyw" class="spro" placeholder="Nhập từ khóa...">
                    <select name="iddm" class="chonhh">
                        <option value="0" selected>Tất cả</option>
                    <?php
                        foreach($listdanhmuc as $danhmuc){
                            extract($danhmuc);
                            echo '<option value="'.$id.'">'.$name.'</option>';
                        }
                        ?>
                    </select>
                    <input type="submit" name="listok" class='timhh' value="Lọc">
                </form>
                <div class="row formcontent">
                    <div class="row mb10 formdsloai">
                        <table border style="border: 1px solid #ccc">
                            <tr>
                                <th></th>
                                <th>MÃ SẢN PHẨM</th>
                                <th>TÊN SẢN PHẨM</th>
                                <th>GIÁ</th>
                                <th>HÌNH ẢNH</th>
                                <th>LƯỢT XEM</th>
                                <th></th>
                            </tr>
                                <?php
                                    foreach ($listsanpham as $sanpham){
                                        extract($sanpham);
                                        $suasp="index.php?act=suasp&id=$id";
                                        $xoasp="index.php?act=xoasp&id=$id";
                                        $hinhpath="../uploads/".$img;
                                        if(is_file($hinhpath)){
                                            $hinh='<img style="width: 120px; height: 90px" src="'.$hinhpath.'" alt="">';
                                        }else{
                                            $hinh='<h3 style="color: red">NO FILES</h3>';
                                        }
                                        echo '
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td>'.$id.'</td>
                                            <td>'.$name.'</td>
                                            <td>'.$price.'</td>
                                            <td>'.$hinh.'</td>
                                            <td>'.$luotxem.'</td>
                                            <td><a href="'.$suasp.'"><input type="button" value="SỬA"></a>
                                                <a onclick="return confirm(\'Ban co chac chan khong\')" href="'.$xoasp.'"><input type="button" value="XÓA"></a>
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
                        <a href="index.php?act=addsp"><input type="button" value="Thêm mới"></a>
                    </div>
                </div>
            </form>
            
        </div>
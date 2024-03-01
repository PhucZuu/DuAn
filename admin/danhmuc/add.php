<div class="row">
                <div class="row header formtitle">
                    <h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
                </div>
                <div class="row formcontent">
                    <form action="index.php?act=adddm" method="post">
                        <div class="row mb10">
                            <strong>Mã loại</strong> <br>
                            <input type="text" name="maloai" disabled>
                        </div>
                        <div class="row mb10">
                            <strong>Tên loại</strong> <br>
                            <input type="text" name="tenloai" required>
                        </div>
                        <div class="row mb">
                            <input type="submit" name='themmoi' value="THÊM MỚI">
                            <input type="reset" name='reset' value="NHẬP LẠI">
                            <a href="index.php?act=listdm"><input name="danhsach" type="button" value="DANH SÁCH"></a>
                        </div>
                        <?php
                            if(isset($thongBao)&& $thongBao!= ""){
                                echo '<h2 style="color: green">'.$thongBao.'</h2>';
                            }
                        ?>
                    </form>
                </div>
        </div>
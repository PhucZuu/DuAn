<div class="row">
                <div class="row header formtitle">
                    <h1>THÊM MỚI SẢN PHẨM</h1>
                </div>
                <div class="row formcontent">
                    <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
                        <div class="row mb10">
                            <strong>Danh mục sản phẩm</strong> <br>
                            <select name="iddm" class="sltdm">                       
                                <?php
                                    foreach($listdanhmuc as $danhmuc){
                                        extract($danhmuc);
                                        echo '<option value="'.$id.'">'.$name.'</option>';
                                    }
                                ?>
                                
                            </select>
                        </div>
                        <div class="row mb10">
                            <strong>Tên sản phẩm</strong> <br>
                            <input type="text" name="tensp" required>
                        </div>
                        <div class="row mb10">
                            <strong>Giá</strong> <br>
                            <input type="text" name="giasp" required>
                        </div>
                        <div class="row mb10">
                            <strong>Hình ảnh</strong> <br>
                            <input type="file" name="hinh" required>
                        </div>
                        <div class="row mb10">
                            <strong>Mô tả</strong> <br>
                            <textarea name="mota" id="" cols="163.5" rows="10"></textarea>
                        </div>
                        <div class="row mb">
                            <input type="submit" name='themmoi' value="THÊM MỚI">
                            <input type="reset" value="NHẬP LẠI">
                            <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
                        </div>
                        <?php
                            if(isset($thongBao)&& $thongBao!= ""){
                                echo '<h2 style="color: green">'.$thongBao.'</h2>';
                            }
                        ?>
                    </form>
                </div>
        </div>
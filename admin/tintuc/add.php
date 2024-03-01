<div class="row">
                <div class="row header formtitle">
                    <h1>THÊM MỚI TIN TỨC</h1>
                </div>
                <div class="row formcontent">
                    <form action="index.php?act=addtt" method="post" enctype="multipart/form-data">
                        <div class="row mb10">
                            <strong>Danh mục tin tức</strong> <br>
                            <select name="iddm" class="sltdm">                       
                                <?php
                                    foreach($listdanhmuctt as $danhmuc){
                                        extract($danhmuc);
                                        echo '<option value="'.$id_danhmuc.'">'.$ten_danhmuc.'</option>';
                                    }
                                ?>
                                
                            </select>
                        </div>
                        <div class="row mb10">
                            <strong>Tiêu đề</strong> <br>
                            <input type="text" name="tieu_de"><span><?= $errTD?></span>
                        </div>
                        <div class="row mb10">
                            <strong>Nội dung</strong> <br>
                            <input type="text" name="noi_dung"><span><?= $errND?></span>
                        </div>
                        <div class="row mb10">
                            <strong>Hình ảnh</strong> <br>
                            <input type="file" name="hinh_anh"><span><?= $errHA?></span>
                        </div>
                        
                        <div class="row mb">
                            <input type="submit" name='themmoi' value="THÊM MỚI">
                            <input type="reset" value="NHẬP LẠI">
                            <a href="index.php?act=listtt"><input type="button" value="DANH SÁCH"></a>
                        </div>
                        <?php
                            if(isset($thongBao)&& $thongBao!= ""){
                                echo '<h2 style="color: green">'.$thongBao.'</h2>';
                            }
                        ?>
                    </form>
                </div>
        </div>
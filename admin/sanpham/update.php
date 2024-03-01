<?php
    if(is_array($sp)){
        extract($sp);
    }
    $hinhpath="../uploads/".$img;
    if(is_file($hinhpath)){
        $hinh='<img style="width: 120px; height: 90px" src="'.$hinhpath.'" alt="">';
    }else{
        $hinh='<h3 style="color: red">NO FILES</h3>';
    }
?>

<div class="row">
                <div class="row header formtitle">
                    <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
                </div>
                <div class="row formcontent">
                <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                        <div class="row mb10">
                            <strong>Danh mục sản phẩm</strong> <br>
                            <select name="iddm" class="mb10 sltdm" style="">                       
                                <?php
                                    foreach($listdanhmuc as $danhmuc){
                                        echo '<option '.($danhmuc['id']==$iddm?"selected":"").' value="'.$danhmuc['id'].'">'.$danhmuc['name'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="row mb10">
                            <strong>Tên sản phẩm</strong> <br>
                            <input type="text" name="tensp" required value="<?= $name?>">
                        </div>
                        <div class="row mb10">
                            <strong>Giá</strong> <br>
                            <input type="text" name="giasp" required value="<?= $price?>">
                        </div>
                        <div class="row mb10">
                            <strong>Hình ảnh</strong> <br>
                            <input type="file" name="hinh">
                            <?= $hinh?>
                        </div>
                        <div class="row mb10">
                            <strong>Mô tả</strong> <br>
                            <textarea name="mota" id="" cols="30" rows="10"><?= $mota?></textarea>
                        </div>
                        <div class="row mb">
                            <input type="hidden" name='id' value="<?= $id?>"> 
                            <input type="submit" name='capnhat' value="CẬP NHẬT">
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
<?php
    if(isset($tt)){
        if(is_array($tt)){
            extract($tt);
        }
        $hinhpath="../uploads/".$hinh_anh;
        if(is_file($hinhpath)){
            $hinh='<img style="width: 120px; height: 90px" src="'.$hinhpath.'" alt="">';
        }else{
            $hinh='<h3 style="color: red">NO FILES</h3>';
        }
    }else{
        $hinh='';
    }
?>

<div class="row">
                <div class="row header formtitle">
                    <h1>CẬP NHẬT TIN TỨC</h1>
                </div>
                <div class="row formcontent">
                <form action="index.php?act=updatett" method="post" enctype="multipart/form-data">
                        <div class="row mb10">
                            <strong>Danh mục sản phẩm</strong> <br>
                            <select name="iddm" class="mb10 sltdm" style="">                       
                                <?php
                                    foreach($listdanhmuctt as $danhmuc){
                                        echo '<option '.($danhmuc['id_danhmuc']==$id_danh_muc?"selected":"").' value="'.$danhmuc['id_danhmuc'].'">'.$danhmuc['ten_danhmuc'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="row mb10">
                            <strong>Tiêu đề</strong> <br>
                            <input type="text" name="tieu_de" value="<?=$tieu_de?>"><span><?= $errTD?></span>
                        </div>
                        <div class="row mb10">
                            <strong>Nội dung</strong> <br>
                            <input type="text" name="noi_dung" value="<?= $noi_dung?>"><span><?= $errND?></span>
                        </div>
                        <div class="row mb10">
                            <strong>Hình ảnh</strong> <br>
                            <input type="file" name="hinh_anh"><?= $hinh?>
                        </div>
                        <div class="row mb">
                            <input type="hidden" name='id' value="<?= $id?>"> 
                            <input type="submit" name='capnhat' value="CẬP NHẬT">
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
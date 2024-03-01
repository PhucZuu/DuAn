<?php
    if(is_array($dm)){
        extract($dm);
    }
?>

<div class="row">
                <div class="row header formtitle">
                    <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
                </div>
                <div class="row formcontent">
                    <form action="index.php?act=updatedm" method="post">
                        <div class="row mb10">
                            <strong>Mã loại</strong> <br>
                            <input type="text" name="maloai" value="<?=(isset($id)&&$id!=""?$id:"")?>" disabled>
                        </div>
                        <div class="row mb10">
                            <strong>Tên loại</strong> <br>
                            <input type="text" name="tenloai" required value="<?=(isset($name)&&$name!=""?$name:"")?>">
                        </div>
                        <div class="row mb">
                        <input type="hidden" name="id" value="<?=(isset($id)&&$id!=""?$id:"")?>">
                            <input type="submit" name='capnhat' value="CẬP NHẬT">
                            <input type="reset" value="NHẬP LẠI">
                            <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
                        </div>
                        <?php
                            if(isset($thongBao)&& $thongBao!= ""){
                                echo '<h2 style="color: green">'.$thongBao.'</h2>';
                            }
                        ?>
                    </form>
                </div>
        </div>
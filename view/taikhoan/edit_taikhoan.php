<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            
            <div class="boxtitle">CẬP NHẬT TÀI KHOẢN</div>
            <div class="row boxcontent formtaikhoan">
                <?php
                    if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                        extract($_SESSION['user']);
                    }
                ?>
                <form action="index.php?act=edit_taikhoan" method="post" enctype="multipart/form-data">
                    <div class="row mb10">
                        <img id="avatar" src="./uploads/<?= $hinhAnh?>" alt="">
                    </div>
                    <div class="row mb10">
                        <label for="">Tên đăng nhập</label>
                        <input type="text" name='user' value="<?= $user?>" required>
                    </div>
                        <input type="hidden" name='pass' value="<?= $pass?>" required>
                    <div class="row mb10">
                    <label for="">Email</label>
                        <input type="email" name='email' value="<?= $email?>" required>
                    </div>
                    <div class="row mb10">
                    <label for="">Địa chỉ</label>
                        <input type="text" name='address' value="<?= $address?>" required>
                    </div>
                    <div class="row mb10">
                    <label for="">Số điện thoại</label>
                        <input type="text" name='tel' value="<?= $tel?>" required>
                    </div>
                    <div class="row mb10">
                    <label for="">Hình ảnh</label>
                        <input type="file" name='hinhAnh'>
                    </div>
                    <div class="row mb10">
                        <input type="hidden" name="id" value="<?= $id?>">
                        <input type="submit" name='capnhat' value="CẬP NHẬT">
                    </div>
                    
                </form>
                <?php
                    if(isset($thongBao)&&($thongBao!="")){
                        echo $thongBao;
                    }
                ?>
            </div>
            
        </div>
        
    </div>
    <div class="boxphai">
        <?php include 'view/boxright.php';?>
    </div>

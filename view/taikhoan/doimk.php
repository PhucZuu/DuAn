<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            
            <div class="boxtitle">ĐỔI MẬT KHẨU</div>
            <div class="row boxcontent formtaikhoan">
                <?php
                    if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                        extract($_SESSION['user']);
                    }
                ?>
                <form action="index.php?act=doimk" method="post">
                    <div class="row mb10">
                        <label for="">Tên đăng nhập</label>
                        <input type="text" name='user' value="<?= $user?>" required readonly>
                    </div>
                    <div class="row mb10">
                    <label for="">Mật khẩu cũ</label>
                        <input type="password" name='oldpass' required>
                    </div>
                    <div class="row mb10">
                    <label for="">Mật khẩu mới</label>
                        <input type="password" name='newpass' required>
                    </div>
                    <div class="row mb10">
                    <label for="">Xác nhận mật khẩu</label>
                        <input type="password" name='confirmpass' required>
                    </div>
                    <div class="row mb10">
                        <input type="hidden" name="id" value="<?= $id?>">
                        <input type="submit" name='doimk' value="ĐỔI MẬT KHẨU">
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

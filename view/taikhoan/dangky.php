<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            
            <div class="boxtitle">ĐĂNG KÝ THÀNH VIÊN</div>
            <div class="row boxcontent formtaikhoan">
                <form action="index.php?act=dangky" method="post" enctype="multipart/form-data">
                    <div class="row mb10">
                        <label for="">Tên đăng nhập</label>
                        <input type="text" name='user' required>
                    </div>
                    <div class="row mb10">
                    <label for="">Mật khẩu</label>
                        <input type="password" name='pass' required>
                    </div>
                    <div class="row mb10">
                    <label for="">Email</label>
                        <input type="email" name='email' required>
                    </div>
                    <div class="row mb10">
                    <label for="">Địa chỉ</label>
                        <input type="text" name='address' required>
                    </div>
                    <div class="row mb10">
                    <label for="">Số điện thoại</label>
                        <input type="text" name='tel' required>
                    </div>
                    <div class="row mb10">
                    <label for="">Hình ảnh</label>
                        <input type="file" name='hinhAnh'>
                    </div>
                    <div class="row mb10">
                        <input type="submit" name='dangky' value="Đăng Ký">
                    </div>
                    
                </form>
                <?php
                    if(isset($thongBao)&&($thongBao!="")){
                        echo '<h3 style="color: green">'.$thongBao.'</h3>';
                    }
                ?>
            </div>
            
        </div>
        
    </div>
    <div class="boxphai">
        <?php include 'view/boxright.php';?>
    </div>

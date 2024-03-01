<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            
            <div class="boxtitle">QUÊN MẬT KHẨU</div>
            <div class="row boxcontent formtaikhoan">
                <form action="index.php?act=quenmk" method="post">
                    <div class="row mb10">
                    <label for="">Email</label>
                        <input type="email" name='email' required>
                    </div>
                    <div class="row mb10">
                        <input type="submit" name='guiemail' value="Lấy Lại Mật Khẩu">
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

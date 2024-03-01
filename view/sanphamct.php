<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <?php
                extract($onesp);
            ?>
            <div class="boxtitle">CHI TIẾT SẢN PHẨM</div>
                <div class="row boxcontent">
                    <?php
                        $img=$img_path.$img;
                        echo '<div class="row mb spct"><img src="'.$img.'" alt=""></div>';
                    ?>
                <div class="row">
                    <?php
                        echo $mota;
                    ?>
                </div>
            </div>
            
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#binhluan").load("view/binhluan/binhluanform.php", {idpro: <?= $id?>});
            });
        </script>
        <div class="row" id="binhluan"></div>
        <div class="row mb">
            <div class="boxtitle">SẢN PHẨM CÙNG LOẠI</div>
            <div class="row boxcontent">
                <?php
                    $spCungLoai=load_sanpham_cungloai($id,$iddm);

                    foreach($spCungLoai as $sp){
                        extract($sp);
                        $linksp="index.php?act=sanphamct&idsp=".$id;
                        echo '<li><a href="'.$linksp.'">'.$name.'</a></li>';
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="boxphai">
        <?php include 'boxright.php';?>
    </div>

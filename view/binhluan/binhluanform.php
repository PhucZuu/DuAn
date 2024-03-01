<?php
    session_start();
    include '../../model/pdo.php';
    include '../../model/binhluan.php';
    $idpro=$_REQUEST['idpro'];
    // $dsbl=loadAll_binhluan($idpro);
    $dsbl=loadBinhLuan($idpro);
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="row mb">
    <div class="boxtitle">BÌNH LUẬN</div>
    <div class="boxcontent2 binhluan">
        <table>
            <?php
                foreach ($dsbl as $bl) {
                    extract($bl);
                    echo '
                    <tr>
                        <td><img class="cmtavatar" src="./uploads/'.$hinhAnh.'" alt=""></td>
                        <td>'.$tennguoidung.'</td>
                        <td>'.$noidung.'</td>
                        <td>'.$ngaybinhluan.'</td>
                    </tr>
                    ';
                }
            ?>
        </table>
    </div>
    <div class="boxfooter searchbox">
        <?php
            if(isset($_SESSION['user'])){
        ?>
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
            <input type="hidden" name='idpro' value="<?= $idpro?>">
            <input id="bl" type="text" name="noidung" placeholder="Nhập bình luận" required>
            <input id="btn_bl" type="submit" name="guibinhluan" value="Gửi">
        </form>
        <?php }else{
            echo "<h3>Đăng nhập để bình luận sản phẩm</h3>";
            }?>

    </div>
    <?php
        if(isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])){
            $noidung=$_POST['noidung'];
            $idpro=$_POST['idpro'];
            $iduser=$_SESSION['user']['id'];
            $ngaybinhluan=date('h:i:sa d/m/Y');
            insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan);
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
    ?>
</div>
</body>
</html>

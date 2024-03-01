<?php
    session_start();
    include 'model/pdo.php';
    include 'model/sanpham.php';
    include 'model/danhmuc.php';
    include 'model/taikhoan.php';
    include 'model/cart.php';
    include 'view/header.php';
    include 'global.php';
    if(!isset($_SESSION['myCart'])){
        $_SESSION['myCart']=[];
    }
    $spnew=loadAll_sanpham_honme();
    $dsdm=loadAll_danhmuc();
    $dstop10=loadAll_sanpham_top10();
    if(isset($_GET['act'])&&($_GET['act'])!=""){
        $act=$_GET['act'];
        switch ($act) {
            
            case 'sanpham':
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                    $kyw=$_POST['kyw'];
                }else{
                    $kyw="";
                }
                if(isset($_GET['iddm'])&&($_GET['iddm']>0)){
                    $iddm=$_GET['iddm'];
                }else{
                    $iddm=0;
                }
                $dssp=loadAll_sanpham($kyw,$iddm);
                $tendm=load_ten_dm($iddm);
                include 'view/sanpham.php';
                break;
            case 'sanphamct':
                if(isset($_GET['idsp'])&&($_GET['idsp']>0)){
                    $id=$_GET['idsp'];
                    $onesp=loadOne_sanpham($id);
                    extract($onesp);
                    $spCungLoai=load_sanpham_cungloai($id,$iddm);
                    include 'view/sanphamct.php';
                }else{
                    include 'view/home.php';
                }

                break;
            case 'dangky':
                if(isset($_POST['dangky'])&&($_POST['dangky'])){
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $filename=$_FILES['hinhAnh']['name'];
                    if($filename){
                        $filename= time().$filename;
                        $target_dir='./uploads/';
                        $target_file= $target_dir . basename($filename);
                        if (move_uploaded_file($_FILES["hinhAnh"]["tmp_name"], $target_file)) {
                            // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                        } else {
                            // echo "Sorry, there was an error uploading your file.";
                        }
                    }else{
                        $filename="";
                    }
                    insert_taikhoan($user,$pass,$email,$address,$tel,$filename);
                    $thongBao="Đăng ký tài khoản thành công";
                }
                include 'view/taikhoan/dangky.php';
                break;
            case 'addtocart':
                if(isset($_SESSION['user'])){
                    // add thong tin sp tu form add to cart len session
                    if(isset($_POST['addtocart'])&&($_POST['addtocart'])){
                        $id=$_POST['id'];
                        $name=$_POST['name'];
                        $img=$_POST['img'];
                        $price=$_POST['price'];
                        $soluong=1;
                        $price=(float)$price;
                        $total= $soluong*$price;
                        $spadd=[$id,$name,$img,$price,$soluong,$total];
                        array_push($_SESSION['myCart'],$spadd);
                        // echo '<pre>';
                        // print_r($spadd);
                        // die;
                        // header('Location: index.php');
                    }
                    include 'view/cart/viewcart.php';
                }else{
                    echo '<script>alert("Bạn phải đăng nhập để thực hiện chức năng này")</script>';
                    // include ''
                }
                break;
            case 'giohang':
                include 'view/cart/viewcart.php';
                break;
            case 'bill':
                include 'view/cart/bill.php';
                break;
            case 'billconfirm':
                if(isset($_POST['acceptOrder'])&&($_POST['acceptOrder'])){
                    $name=$_POST['name'];
                    $address=$_POST['address'];
                    $email=$_POST['email'];
                    $tel=$_POST['tel'];
                    $ngaydathang=date('h:i:sa d/m/Y');
                    $tongdonhang=tongdonhang();
                }
                include 'view/cart/billconfirm.php';
                break;
            case 'delCart':
                if(isset($_GET['idCart'])){
                    // xoa mang session cart tu vi tri idCart va cat 1 phan tu
                    array_splice($_SESSION['myCart'],$_GET['idCart'],1);
                }else{
                    $_SESSION['myCart']=[];
                }
                header('Location: index.php?act=giohang');
                break;
            case 'dangnhap':
                if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $checkUser=checkUser($user,$pass);
                    if(is_array($checkUser)){
                        $_SESSION['user']=$checkUser;
                        // $thongBao='<h3 style="color: green">Đăng nhập thành công<h3>';
                        header('Location: index.php');
                    }else{
                        $thongBao='<h3 style="color: red">Tài khoản hoặc mật khẩu không chính xác<h3>';
                        include 'view/home.php';
                    }
                }
                break;
            case 'edit_taikhoan':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $id=$_POST['id'];
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $filename=$_FILES['hinhAnh']['name'];
                    if($filename){
                        $filename= time().$filename;
                        $target_dir='./uploads/';
                        $target_file= $target_dir . basename($filename);
                        if (move_uploaded_file($_FILES["hinhAnh"]["tmp_name"], $target_file)) {
                            // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                        } else {
                            // echo "Sorry, there was an error uploading your file.";
                        }
                    }else{
                        $filename="";
                    }
                    update_taikhoan($id,$user,$pass,$email,$address,$tel,$filename);
                    // cap nhat lai session
                    $_SESSION['user']=checkUser($user,$pass);
                    header('Location: index.php?act=edit_taikhoan');
                    $thongBao='<h3 style="color:green">Cập nhật thông tin thành công</h3>';
                }
                include 'view/taikhoan/edit_taikhoan.php';
                break;
            case 'quenmk':
                if (isset($_POST['guiemail'])&&($_POST['guiemail'])) {
                    $email=$_POST['email'];
                    $checkEmail=checkEmail($email);
                    if(is_array($checkEmail)){
                        $thongBao='Mật khẩu của bạn là: '.$checkEmail['pass'].'';
                    }else{
                        echo '<h3 style="color: red">Email không tồn tại</h3>';
                    }
                }
                include 'view/taikhoan/quenmk.php';
                break;
            case 'doimk':
                if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                    extract($_SESSION['user']);
                    if (isset($_POST['doimk'])&&($_POST['doimk'])) {
                        $oldpass=$_POST['oldpass'];
                        $newpass=$_POST['newpass'];
                        $id=$_POST['id'];
                        $confirmpass=$_POST['confirmpass'];
                        if($oldpass!=$pass || $newpass!=$confirmpass){
                            $thongBao='<h3 style="color:red">Mật khẩu không chính xác</h3>';
                        }else if($pass==$newpass){
                            $thongBao='<h3 style="color:red">Mật khẩu mới không được trùng với mật khẩu cũ</h3>';
                        }else{
                            changePass($newpass,$id);
                            $thongBao='<h3 style="color:green">Đổi mật khẩu thành công</h3>';
                        }
                        // print_r([$oldpass,$newpass,$confirmpass]);
                        // die;
                    }
                }
                include 'view/taikhoan/doimk.php';
                break;
            
            case 'thoat':
                session_unset();
                header('Location: index.php');
                break;
            case 'gioithieu':
                include 'view/gioithieu.php';
                break;
            case 'lienhe':
                include 'view/lienhe.php';
                break;
            case 'gopy':
                include 'view/gopy.php';
                break;
            case 'hoidap':
                include 'view/hoidap.php';
                break;
            default:
                include 'view/home.php';
                break;
        }
    }else{
        include 'view/home.php';
    }
    include 'view/footer.php';
?>
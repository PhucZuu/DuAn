<?php
    include '../model/pdo.php';
    include '../model/danhmuc.php';
    include '../model/taikhoan.php';
    include '../model/sanpham.php';
    include '../model/binhluan.php';
    include '../model/thongke.php';
    include '../model/tintuc.php';
    include 'header.php';
    session_start();
    //controller
    if(isset($_SESSION['user'])){
        if(isset($_GET['act'])){
            $act=$_GET['act'];
            switch ($act) {
                case 'adddm':
                    //kiểm tra người dùng có click vào nút add hay không
                    if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                        $tenloai=$_POST['tenloai'];
                        insert_danhmuc($tenloai);
                        $thongBao="Thêm thành công";
                    }
                    include ('danhmuc/add.php');
                    break;
                case 'listdm':
                    $listdanhmuc=loadAll_danhmuc();
                    include ('./danhmuc/listdm.php');
                    break;
                case 'xoadm':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        delete_danhmuc($_GET['id']);
                    }
                    //sau khi xóa sẽ phải gọi lại danh sách danh mục
                    $listdanhmuc=loadAll_danhmuc();
                    include ('./danhmuc/listdm.php');
                    break;
                case 'suadm':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        $dm=loadOne_danhmuc($_GET['id']);
                    }
                    include ('danhmuc/update.php');
                    break;
                case 'updatedm':
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $id=$_POST['id'];
                        $tenloai=$_POST['tenloai'];
                        update_danhmuc($id,$tenloai);
                        $thongBao="Cập nhật thành công";
                    }
                    //sau khi update sẽ phải gọi lại danh sách danh mục
                    $listdanhmuc=loadAll_danhmuc();
                    include ('./danhmuc/listdm.php');
                    break;
    
    
    
                // controller sản phẩm
                case 'addsp':
                    //kiểm tra người dùng có click vào nút add hay không
                    if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                        $iddm=$_POST['iddm'];
                        $tensp=$_POST['tensp'];
                        $price=$_POST['giasp'];
                        $filename=$_FILES['hinh']['name'];
                        $mota=$_POST['mota'];
                        $target_dir='../uploads/';
                        $target_file= $target_dir . basename($_FILES['hinh']['name']);
                        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                            // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                        } else {
                            // echo "Sorry, there was an error uploading your file.";
                        }
                        insert_sanpham($tensp,$price,$filename,$mota,$iddm);
                        $thongBao="Thêm thành công";
                    }
                    $listdanhmuc=loadAll_danhmuc();
                    // var_dump($listdanhmuc);
                    include ('sanpham/add.php');
                    break;
                case 'listsp':
                    if(isset($_POST['listok'])&&($_POST['listok'])){
                        $kyw=$_POST['kyw'];
                        $iddm=$_POST['iddm'];
                    }else{
                        $kyw="";
                        $iddm=0;
                    }
                    $listdanhmuc=loadAll_danhmuc();
                    $listsanpham=loadAll_sanpham($kyw,$iddm);
                    include ('./sanpham/listsp.php');
                    break;
                case 'xoasp':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        delete_sanpham($_GET['id']);
                    }
                    //sau khi xóa sẽ phải gọi lại danh sách sản phẩm
                    $listsanpham=loadAll_sanpham("",0);
                    include ('./sanpham/listsp.php');
                    break;
                case 'suasp':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        $sp=loadOne_sanpham($_GET['id']);
                    }
                    $listdanhmuc=loadAll_danhmuc();
                    include ('sanpham/update.php');
                    break;
                case 'updatesp':
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $id=$_POST['id'];
                        $iddm=$_POST['iddm'];
                        $tensp=$_POST['tensp'];
                        $price=$_POST['giasp'];
                        $filename=$_FILES['hinh']['name'];
                        $mota=$_POST['mota'];
                        $target_dir='../uploads/';
                        $target_file= $target_dir . basename($_FILES['hinh']['name']);
                        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                            // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                        } else {
                            // echo "Sorry, there was an error uploading your file.";
                        }
                        update_sanpham($id,$iddm,$tensp,$price,$filename,$mota);
                        $thongBao="Cập nhật thành công";
                    }
                    //sau khi xóa sẽ phải gọi lại danh sách danh mục
                    $listsanpham=loadAll_sanpham("",0);
                    $listdanhmuc=loadAll_danhmuc();
                    include ('./sanpham/listsp.php');
                    break;
                case 'dskh':
                    $listTaiKhoan=loadAll_taikhoan();
                    include 'taikhoan/list.php';
                    break;
                case 'dsbl':
                    // $listbinhluan=loadAll_binhluan(0);
                    $listbinhluan=loadBinhLuan(0);
                    include 'binhluan/list.php';
                    break;
                case 'xoabl':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        delete_binhluan($_GET['id']);
                    }
                    $listbinhluan=loadBinhLuan(0);
                    include 'binhluan/list.php';
                case 'thongke':
                    $listthongke=loadAll_thongke();
                    include 'thongke/list.php';
                    break;
                case 'bieudo':
                    $listthongke=loadAll_thongke();
                    include 'thongke/bieudo.php';
                    break;
                case 'backUser':
                    header('Location: ../index.php');
                    break;
                case 'addtt':
                    $errTD='';
                    $errND='';
                    $errHA='';
    
                    //kiểm tra người dùng có click vào nút add hay không
                    if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                        $check=true;
                        $id_danh_muc=$_POST['iddm'];
                        $tieu_de=$_POST['tieu_de'];
                        $noi_dung=$_POST['noi_dung'];
                        $filename=$_FILES['hinh_anh']['name'];
                        if($tieu_de==''){
                            $errTD='Tieu de khong duoc de trong';
                            $check=false;
                        }
                        if($noi_dung==''){
                            $errND='Noi dung khong duoc de trong';
                            $check=false;
    
                        }
                        if($filename==''){
                            $errHA='Hinh anh khong duoc de trong';
                            $check=false;
    
                        }
                        if($check){
    
                            $target_dir='../uploads/';
                            $target_file= $target_dir . basename($_FILES['hinh_anh']['name']);
                            if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file)) {
                                // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                            } else {
                                // echo "Sorry, there was an error uploading your file.";
                            }
                            insert_tintuc($tieu_de,$noi_dung,$filename,$id_danh_muc);
                            $thongBao="Thêm thành công";
                        }
                    }
                    $listdanhmuctt=loadAll_danhmuctt();
                    // var_dump($listdanhmuc);
                    include ('tintuc/add.php');
                    break;
                    case 'listtt':
                        $listTT=loadTintuc();
                        include 'tintuc/listtt.php';
                        break;
                    case 'suatt':
                        $errTD='';
                        $errND='';
                        if(isset($_GET['id'])&&($_GET['id']>0)){
                            $tt=loadOne_tintuc($_GET['id']);
                        }
                        $listdanhmuctt=loadAll_danhmuctt();
                        include ('tintuc/update.php');
                        break;
                    case 'updatett':
                        $errTD='';
                        $errND='';
                        if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                            $check=true;
                            $id_danh_muc=$_POST['iddm'];
                            $id=$_POST['id'];
                            $tieu_de=$_POST['tieu_de'];
                            $noi_dung=$_POST['noi_dung'];
                            $filename=$_FILES['hinh_anh']['name'];
                            if($tieu_de==''){
                                $errTD='Tieu de khong duoc de trong';
                                $check=false;
                            }
                            if($noi_dung==''){
                                $errND='Noi dung khong duoc de trong';
                                $check=false;
        
                            }
                           
                            if($check){
                                if($filename!=''){
                                
                                    $target_dir='../uploads/';
                                    $target_file= $target_dir . basename($_FILES['hinh_anh']['name']);
                                    if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file)) {
                                        // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                                    } else {
                                        // echo "Sorry, there was an error uploading your file.";
                                    }
        
                                }else{
                                    $filename="";
                                }
                                updatett($id,$tieu_de,$noi_dung,$filename,$id_danh_muc);
                                // $listTT=loadTintuc();
                                header("Location: index.php?act=listtt");
                                // $thongBao="Thêm thành công";
                            }
                        }
                        $listdanhmuctt=loadAll_danhmuctt();
                        include 'tintuc/update.php';
                        break;
                    case 'xoatt':
                        if(isset($_GET['id'])&&($_GET['id']>0)){
                            delete_tintuc($_GET['id']);
                        }
                        //sau khi xóa sẽ phải gọi lại danh sách tin tức
                        $listTT=loadTintuc();
                        include 'tintuc/listtt.php';
                        break;
                default:
                    include ('home.php');
                    break;
            }
        }else{
            include 'home.php';
        }
    }else{
        echo "<h2>Bạn cần đăng nhập để thực hiện chức năng quản trị</h2>";
        echo '<button><a href="../index.php">Bấm vào đây để quay lại</a></button>';
    }

    
    include 'footer.php'

?>

<?php
    function loadAll_danhmuctt(){
        $sql="SELECT * FROM danhmuctintuc ORDER BY id_danhmuc DESC";
        $listtt=pdo_query($sql);
        return $listtt;
    }
    function insert_tintuc($tieu_de,$noi_dung,$filename,$id_danh_muc){
        $sql="INSERT INTO tintuc(tieu_de,noi_dung,hinh_anh,id_danh_muc) VALUES ('$tieu_de','$noi_dung','$filename','$id_danh_muc')";
        pdo_execute($sql);
    }
    function loadTintuc(){
        $sql="SELECT id,tieu_de,noi_dung,hinh_anh,danhmuctintuc.ten_danhmuc FROM tintuc JOIN danhmuctintuc ON tintuc.id_danh_muc=danhmuctintuc.id_danhmuc";
        $listtt=pdo_query($sql);
        return $listtt;
    }
    function loadOne_tintuc($id){
        $sql="SELECT * FROM tintuc WHERE id=".$id;
        $tt=pdo_query_one($sql);
        return $tt;
    }
    function updatett($id,$tieu_de,$noi_dung,$filename,$id_danh_muc){
        if($filename!=""){
            $sql="UPDATE tintuc SET id_danh_muc='$id_danh_muc',
                         tieu_de='$tieu_de',
                         noi_dung='$noi_dung',
                         hinh_anh='$filename' WHERE id=".$id;
        }else{
            $sql="UPDATE tintuc SET id_danh_muc='$id_danh_muc',
                         tieu_de='$tieu_de',
                         noi_dung='$noi_dung' WHERE id=".$id;
        }
        pdo_execute($sql);
    }
    function delete_tintuc($id){
        $sql="DELETE FROM tintuc WHERE id=".$id;
        pdo_execute($sql);
    }
?>
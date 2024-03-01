<?php
    function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan){
        $sql="INSERT INTO binhluan(noidung,iduser,idpro,ngaybinhluan) VALUES ('$noidung','$iduser','$idpro','$ngaybinhluan')";
        pdo_execute($sql);
    }
    function loadAll_binhluan($idpro){
        $sql="SELECT * FROM binhluan WHERE idpro=$idpro ORDER BY id DESC";
        $listbl=pdo_query($sql);
        return $listbl;
    }
    function delete_binhluan($id){
        $sql="DELETE FROM binhluan WHERE id=".$id;
        pdo_execute($sql);
    }
    function loadBinhLuan($idpro){
        $sql="SELECT binhluan.id as idbl,taikhoan.hinhAnh, noidung, taikhoan.user as tennguoidung, sanpham.name as tensp, ngaybinhluan";
        $sql.=" FROM binhluan INNER JOIN taikhoan ON taikhoan.id=binhluan.iduser";
        $sql.=" INNER JOIN sanpham ON sanpham.id=binhluan.idpro";
        if($idpro>0){
            $sql.=" WHERE binhluan.idpro=$idpro ORDER BY binhluan.id DESC";
        }
        $listbl=pdo_query($sql);
        return $listbl;
    }
?>
<?php
    function insert_sanpham($tensp,$price,$filename,$mota,$iddm){
        $sql="INSERT INTO sanpham(name,price,img,mota,iddm) VALUES ('$tensp','$price','$filename','$mota','$iddm')";
        pdo_execute($sql);
    }
    function delete_sanpham($id){
        $sql="DELETE FROM sanpham WHERE id=".$id;
        pdo_execute($sql);
    }
    function loadAll_sanpham($kyw,$iddm){
        $sql="SELECT * FROM sanpham WHERE 1";
        if($kyw!=""){
            $sql.=" AND name LIKE '%".$kyw."%'";
        }
        if($iddm>0){
            $sql.=" AND iddm = $iddm";
        }
        
        $sql.=" ORDER BY id DESC";
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function loadOne_sanpham($id){
        $sql="SELECT * FROM sanpham WHERE id=".$id;
        $sp=pdo_query_one($sql);
        return $sp;
    }
    function load_ten_dm($iddm){
        if($iddm>0){
            $sql="SELECT * FROM danhmuc WHERE id=".$iddm;
            $dm=pdo_query_one($sql);
            extract($dm);
            return $name;
        }else{
            return "";
        }
    }
    function load_sanpham_cungloai($id,$iddm){
        $sql="SELECT * FROM sanpham WHERE iddm=$iddm AND id <> ".$id;
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function update_sanpham($id,$iddm,$tensp,$price,$filename,$mota){
        if($filename!=""){
            $sql="UPDATE sanpham SET iddm='$iddm',
                         name='$tensp',
                         price='$price',
                         img='$filename',
                         mota='$mota' WHERE id=".$id;
        }else{
            $sql="UPDATE sanpham SET iddm='$iddm',
                         name='$tensp',
                         price='$price',
                         mota='$mota' WHERE id=".$id;
        }
        pdo_execute($sql);
    }
    function loadAll_sanpham_honme(){
        $sql='SELECT * FROM sanpham WHERE 1 ORDER BY id DESC LIMIT 0,9';
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function loadAll_sanpham_top10(){
        $sql="SELECT * FROM sanpham WHERE 1 ORDER BY luotxem LIMIT 0,10";
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
?>
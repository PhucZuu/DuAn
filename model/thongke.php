<?php
    function loadAll_thongke(){
        $sql="SELECT danhmuc.name as tendm, danhmuc.id as madm, COUNT(sanpham.id) as countsp, MIN(sanpham.price) as minprice, MAX(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
        $sql.=" FROM sanpham LEFT JOIN danhmuc ON danhmuc.id = sanpham.iddm";
        $sql.=" GROUP BY danhmuc.id ORDER BY danhmuc.id DESC";
        $listtk=pdo_query($sql);
        return $listtk;
    }
?>
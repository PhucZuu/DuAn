<?php
    function viewcart($del){
        global $img_path;
        $tongthanhtoan=0;
        if($del==1){
            $xoasp_th='<th>Thao tác</th>';
        }else{
            $xoasp_th='';
        }
        echo '
        <tr>
            <th>Hình</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            '.$xoasp_th.'
        </tr>
        ';
                            foreach($_SESSION['myCart'] as $key=>$cart){
                                $hinh=$img_path.$cart[2];
                                $thanhtien=$cart[3]*$cart[4];
                                $tongthanhtoan+=$thanhtien;
                                // echo "<pre>";
                                // print_r([$hinh,$cart[0],$cart[1],$cart[2],$cart[3],$cart[4]]);
                                // die();
                                if($del==1){
                                    $xoasp_td='<td><a href="index.php?act=delCart&idCart='.$key.'"><input type="button" value="Xóa"></a></td>';
                                }else{
                                    $xoasp_td='';
                                }
                                echo 
                                '
                                <tr>
                                    <td><img style="width: 120px;" src="'.$hinh.'" alt=""></td>
                                    <td>'.$cart[1].'</td>
                                    <td>'.$cart[3].'</td>
                                    <td>'.$cart[4].'</td>
                                    <td>'.$thanhtien.'</td>
                                    '.$xoasp_td.'
                                </tr>
                                ';
                            }
                            echo 
                            '
                            <tr>
                                <td colspan="4">Tổng thanh toán</td>
                                <td colspan="2">'.$tongthanhtoan.' VND</td>
                                
                            </tr>
                            ';
    }
    function tongdonhang(){
        $tong=0;
        foreach($_SESSION['mycart'] as $cart){
            $total=$cart[3]*$cart[4];
            $tong+=$total;
        }
        return $tong;
    }
?>
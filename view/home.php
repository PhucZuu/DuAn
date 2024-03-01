<div class="row mb">
            <div class="boxtrai mr">
                <div class="row">
                    <div class="banner mb10">
                        <div class="slider">
                            <div class="list">
                                <div class="item">
                                    <img src="view/images/banner.png" alt="">
                                </div>
                                <div class="item">
                                    <img src="view/images/banner1.png" alt="">
                                </div>
                                <div class="item">
                                    <img src="view/images/banner2.png" alt="">
                                </div>
                                <div class="item">
                                    <img src="view/images/banner3.png" alt="">
                                </div>
                                <div class="item">
                                    <img src="view/images/banner4.png" alt="">
                                </div>
                                <!-- <div class="item">
                                    <img src="view/images/banner.png" alt="">
                                </div> -->
                            </div>
                            <div class="buttons">
                                <button id="next"><i class="fa-solid fa-angle-left"></i></button>
                                <button id="prev"><i class="fa-solid fa-angle-right"></i></button>
                            </div>
                            <ul class="dots">
                                <li class="active"></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="boxsp mr">
                        <img src="view/images/bánh2dọc.png" alt="">
                        <p>$10.00</p>
                        <a href="#">Bánh ngọt</a>
                    </div> -->
                    <?php
                    $i=0;
                        foreach($spnew as $sp){
                            extract($sp);
                            $hinh=$img_path.$img;
                            if(($i==2) || ($i==5) || ($i==8)){
                                $mr='';
                            }else{
                                $mr='mr';
                            }
                            echo ' <div class="boxsp '.$mr.'">
                                        <img id="imgProduct" src="'.$hinh.'" alt="">
                                        <p id="price">'.$price.' VNĐ</p>
                                        <a id="nameProduct" href="index.php?act=sanphamct&idsp='.$id.'">'.$name.'</a>
                                        <div class="row btnAddToCart">
                                            <form action="index.php?act=addtocart" method="post">
                                                <input type="hidden" name="id" value="'.$id.'">
                                                <input type="hidden" name="name" value="'.$name.'">
                                                <input type="hidden" name="img" value="'.$img.'">
                                                <input type="hidden" name="price" value="'.$price.'">
                                                <input id="addToCart" type="submit" name="addtocart" value="Thêm vào giỏ">
                                            </form>
                                        </div>
                                    </div>';
                            $i++;
                        }
                    ?>
                </div>
            </div>
            <div class="boxphai">
                <?php include 'boxright.php';?>
            </div>
        </div>
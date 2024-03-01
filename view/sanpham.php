<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle tieude"><?= $tendm?></div>
            <div class="row boxcontent">
                  <?php
                    $i=0;
                    foreach($dssp as $sp){
                        extract($sp);
                        $hinh=$img_path.$img;
                        if(($i==2) || ($i==5) || ($i==8) || ($i==11)){
                            $mr='';
                        }else{
                            $mr='mr';
                        }
                        echo ' <div class="boxsp '.$mr.'">
                                    <img src="'.$hinh.'" alt="">
                                    <p>'.$price.'</p>
                                    <a href="index.php?act=sanphamct&idsp='.$id.'">'.$name.'</a>
                                </div>';
                        $i++;
                    }
                  ?>
            </div>
            
        </div>
        
    </div>
    <div class="boxphai">
        <?php include 'boxright.php';?>
    </div>

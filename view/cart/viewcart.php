<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">GIỎ HÀNG</div>
                <div class="row boxcontent cart">
                    <table border>
                        <?php
                            viewcart(1);
                        ?>
                        <!-- <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                        </tr> -->
                    </table>
                </div>
            </div>
            <div class="row mb bill">
                <a href="index.php?act=bill"><input type="submit" value="ĐẶT HÀNG"></a>
                <a href="index.php?act=delCart"><input type="button" value="XÓA GIỎ HÀNG"></a>
            </div>
        </div>
        <div class="boxphai">
            <?php include 'view/boxright.php';?>
        </div>
    </div>
</div>
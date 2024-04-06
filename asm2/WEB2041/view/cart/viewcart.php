<div class="row mb">
    <div class="boxleft mr">
        <div class="row mb">
            <div class="boxtitle">GIỎ HÀNG</div>
            <div class="row boxcontent formdsloai">
                <table>
                    
                    <?php 
                  viewcart(1);
                        
                    ?>
                    <!-- <tr>
                        <td>1</td>
                        <td><img src="" alt=""></td>
                        <td>DỒng hồ</td>
                        <td>50</td>
                        <td>2</td>
                        <td>100.000 VND</td>
                        <td><input type="button" value="xoa"></td>
                    </tr> -->
                </table>
            </div>
        </div>
        <div class="row mb bill">
            <a href="index.php?act=bill"><input type="submit"  value="TIẾP TỤC ĐẶT HÀNG"></a>
            <a href="index.php?act=viewcart"><input type="button" value="Xóa giỏ hàng"></a>
            
        </div>
    </div>
    <div class="boxright">
        <?php
        include "view/boxright.php";
        ?>
    </div>
</div>
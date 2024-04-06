
<div class="row mb ">
    <div class="boxleft mr">
        <div class="row mb">
            <?php
            extract($ctsp);
            ?>
            <div class="boxtitle">
                <?= $namesp ?>
            </div>
            <div class="boxcontent row">
                <?php

                $hinh = $hinhpath . $img;
                echo '<div class="row mb spct"><img src="' . $hinh . '"></div>';
                echo $mota;
                echo '  <div class="row btnaddtocart">
                <form action="index.php?act=addtocart" method="post">
                    <input type="hidden" name="id" value="'.$idsp.'">
                    <input type="hidden" name="namesp" value="'.$namesp.'">
                    <input type="hidden" name="hinh" value="'.$hinh.'">
                    <input type="hidden" name="gia" value="'.$gia.'">
                    <input type="hidden" name="iddm" value="'.$iddm.'">
                    <input type="submit" value="Thêm vào giỏ hàng" name="addtocart">
                </form>
                </div>';
                ?>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {

                $("#binhluan").load("view/binhluan/binhluanform.php", { idpro: <?= $id ?> });

            });
        </script>
        <div class="row" id="binhluan">

        </div>
        <div class="row mb">
            <div class="boxtitle">SẢN PHẨM CÙNG LOẠI</div>
            <div class="boxcontent row">
                <?php
                foreach ($spcl as $spcl) {
                    extract($spcl);
                    $linksp = "index.php?act=sanphamct&idsp=" . $id;
                    echo '<li><a href="' . $linksp . '">' . $namesp . '</a></li>';
                    
                }
                ?>
            </div>
        </div>
    </div>

    <div class="boxright">
        <?php
       include "boxright.php"
        ?>
    </div>
</div>

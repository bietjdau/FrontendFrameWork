<div class="row mb ">
    <div class="boxleft mr">
        <div class="row">
            <div class="banner">
                <!-- Slideshow container -->
                <div class="slideshow-container">

                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="view/image/mac3.jpg" style="width:100%">
                        <div class="text"></div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="view/image/macpro.jpg" style="width:100%">
                        <div class="text"></div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="view/image/macpro2.jpg" style="width:100%">
                        <div class="text"></div>
                    </div>

                </div>
                <br>

                <div style="text-align:center">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $i = 0;
            foreach ($spnew as $sanpham) {
                extract($sanpham);
               
                
                $linksp = "index.php?act=sanphamct&idsp=" . $idsp;
                $hinh = $hinhpath . $img;
                if (($i == 2) || ($i == 5) || ($i == 8)) {
                    $mr = "";
                } else {
                    $mr = "mr";
                }
                echo '<div class="boxsp ' . $mr . '">
                    <div class=" row img anhsp"><a href="' . $linksp . '">
                        <img src="' . $hinh . '" alt="">
                        </a></div>
                    <strong><p>$' . $gia . '</p></strong>
                    <a href="' . $linksp . '">' . $namesp . '</a>
                    <div class="row btnaddtocart">
                    <form action="index.php?act=addtocart" method="post">
                        <input type="hidden" name="id" value="'.$idsp.'">
                        <input type="hidden" name="namesp" value="'.$namesp.'">
                        <input type="hidden" name="hinh" value="'.$hinh.'">
                        <input type="hidden" name="gia" value="'.$gia.'">
                        <input type="hidden" name="iddm" value="'.$iddm.'">
                        <input type="submit" value="Thêm vào giỏ hàng" name="addtocart">
                    </form>
                    </div>
                </div>';
                $i += 1;
            }
            ?>

            <!-- <div class="boxsp mr">
                <div class=" row img">
                    <img src="view/image/4.jpg" alt="">
                </div>
                <p>$30</p>
                <a href="#">điện Thoại</a>
            </div>
            <div class="boxsp mr">
                <div class=" row img">
                    <img src="view/image/4.jpg" alt="">
                </div>
                <p>$30</p>
                <a href="#">điện Thoại</a>
            </div>
            <div class="boxsp ">
                <div class=" row img">
                    <img src="view/image/4.jpg" alt="">
                </div>
                <p>$30</p>
                <a href="#">điện Thoại</a>
            </div>
            <div class="boxsp mr">
                <div class=" row img">
                    <img src="view/image/1.2.jpg" alt="">
                </div>
                <p>$30</p>
                <a href="#">điện Thoại</a>
            </div>
            <div class="boxsp mr">
                <div class=" row img">
                    <img src="view/image/1.2.jpg" alt="">
                </div>
                <p>$30</p>
                <a href="#">điện Thoại</a>
            </div>
            <div class="boxsp">
                <div class=" row img">
                    <img src="view/image/1.2.jpg" alt="">
                </div>
                <p>$30</p>
                <a href="#">điện Thoại</a>
            </div>
            <div class="boxsp mr">
                <div class=" row img">
                    <img src="view/image/1.2.jpg" alt="">
                </div>
                <p>$30</p>
                <a href="#">điện Thoại</a>
            </div>
            <div class="boxsp mr">
                <div class=" row img">
                    <img src="view/image/1.2.jpg" alt="">
                </div>
                <p>$30</p>
                <a href="#">điện Thoại</a>
            </div>
            <div class="boxsp">
                <div class=" row img">
                    <img src="view/image/1.2.jpg" alt="">
                </div>
                <p>$30</p>
                <a href="#">điện Thoại</a>
            </div> -->
        </div>
    </div>
    <div class="boxright ">
        <?php
        include "boxright.php";
        ?>
    </div>
</div>
<div class="row mb">
    <div class="boxtitle">TÀI KHOẢN</div>
    <div class="boxcontent formtk">
        <?php
        if (isset($_SESSION['user'])) {
            extract($_SESSION['user'])
                ?>
            <div class="row mb10">
                chao mung ban <br>
                <?= $user ?>
            </div>
            <div class="row mb10">
            <li>
                    <a href="index.php?act=quenmk">Quên mật khẩu</a>
                </li>
                <li>
                    <a href="index.php?act=edit_tk">Cập nhật tài khoản</a>
                </li>
                <li>
                    <a href="index.php?act=mybill">Đơn hàng của tôi</a>
                </li>
                <?php 
                    if($role==1){

                ?>
                <li>
                    <a href="admin/index.php">đăng nhập admin</a>
                </li>
                <?php } ?>
                <li>
                    <a href="index.php?act=logout">Logout</a>
                </li>
            </div>
            <?php
        } else {


            ?>
            <form action="index.php?act=dangnhap" method="post">
                <div class="row mb10">
                    Tên đăng nhập <br>
                    <input type="text" name="user" id="">
                </div>
                <div class="row mb10">
                    mật khẩu <br>
                    <input type="password" name="pass"><br>
                </div>
                <div class="row mb10">
                    <input type="checkbox" name="" id=""> ghi nhớ tài khoản<br>
                </div>
                <div class="row mb10">
                    <input type="submit" value="Đăng nhập" name="dangnhap">
                </div>
            </form>
            <li>
                <a href="index.php?act=quenmk">quên mật khẩu</a>
            </li>
            <li>
                <a href="index.php?act=dangky">đăng ký</a>
            </li>
        <?php } ?>

    </div>
</div>
<div class="row mb">
    <div class="boxtitle">DANH MỤC</div>
    <div class="boxcontent2 menudoc">
        <ul>
            <?php
            foreach ($dsdm as $danhmuc) {
                extract($danhmuc);
                $linkdm = "index.php?act=sanpham&iddm=" . $id;
                echo ' <li><a href="' . $linkdm . '">' . $name . '</a></li>';
            }
            ?>
            <!-- <li><a href="#">Đồng hồ</a></li>
                    <li><a href="#">laptop</a></li>
                    <li><a href="#">Điện Thoại</a></li>
                    <li><a href="#">Ba lô</a></li>
                    <li><a href="#">Đồng hồ</a></li>
                    <li><a href="#">laptop</a></li> -->
        </ul>
    </div>
    <div class="boxfooter searchbox">
        <form action="index.php?act=sanpham" method="post">
            <input type="text" name="kyw" id="" placeholder="từ khóa tìm kiếm">
            <input type="submit" value="Tìm kiếm " name="timkiem">
        </form>
    </div>
</div>
<div class="row mb">
    <div class="boxtitle">TOP 10 YÊU THÍCH </div>
    <div class="boxcontent row">
        <?php
        foreach ($dsyt as $sanpham) {
            extract($sanpham);
            $linksp = "index.php?act=sanphamct&idsp=" . $idsp;
            $img = $hinhpath . $img;
            echo '<div class="row mb10 top10">
            <a href="' . $linksp . '"><img src="' . $img . '" alt=""></a>
            <a href="' . $linksp . '">' . $namesp . '</a>
            </div>';
        }

        ?>
        <!-- <div class="row mb10 top10">
                    <img src="view/image/mac3.jpg" alt="">
                    <a href="#">Sir rodney's marmalade</a>
                </div>
                <div class="row mb10 top10">
                    <img src="view/image/macpro.jpg" alt="">
                    <a href="#">cate de blaye</a>
                </div>
                <div class="row mb10 top10">
                    <img src="view/image/macpro2.jpg" alt="">
                    <a href="#">Mishi coke nika</a>
                </div>
                <div class="row mb10 top10">
                    <img src="view/image/icon.png" alt="">
                    <a href="#">thariger conamut</a>
                </div>
                <div class="row mb10 top10">
                    <img src="view/image/lap.png" alt="">
                    <a href="#">cannon tigers</a>
                </div>
                <div class="row mb10 top10">
                    <img src="view/image/dongho.jpg" alt="">
                    <a href="#">racle coudranut</a>
                </div>
                <div class="row mb10 top10">
                    <img src="view/image/1.2.jpg" alt="">
                    <a href="#">change</a>
                </div>
                <div class="row mb10 top10">
                    <img src="view/image/1.3.jpg" alt="">
                    <a href="#">mananut contaim</a>
                </div>
                <div class="row mb10 top10">
                    <img src="view/image/4.jpg" alt="">
                    <a href="#">koniciwa sodestsu</a>
                </div>
                <div class="row mb10 top10">
                    <img src="view/image/lap.png" alt="">
                    <a href="#">mugiwara luuffy</a>
                </div> -->
    </div>
</div>
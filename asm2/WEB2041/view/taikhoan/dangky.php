<div class="row mb ">
    <div class="boxleft mr">
        <div class="row mb">
            <div class="boxtitle">ĐĂNG KÝ</div>
            <div class="boxcontent row formtk">
                <form action="index.php?act=dangky" method="post">
                    <div class="row mb10">
                        Email
                        <input type="email" name="email">
                    </div>
                    <div class="row mb10">
                        Têm đăng nhập
                        <input type="text" name="user">
                    </div>
                    <div class="row mb10">
                        Mật khẩu
                        <input type="password" name="pass" id="">
                    </div>
                    <div class="row mb10">
                        <input type="submit" value="Đăng ký" name="dangky">
                        <input type="reset" value="Nhập lại">
                    </div>


                </form>
                <h2 class="thongbao">
                <?php 
                if(isset($thongbao)&&($thongbao!="")){
                    echo $thongbao;
                }

                ?>
                </h2>
            </div>
        </div>
    </div>
    <div class="boxright ">
        <?php include "view/boxright.php"; ?>
    </div>
</div>
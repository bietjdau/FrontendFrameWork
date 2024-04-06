<div class="row">
            <div class="row formtitle">
                <h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
            </div>
            <div class="row formcontent">
                <form action="index.php?act=adddm" method="post">
                    <div class="row mb10">
                        Mã Loại<br>
                        <input type="text" name="id" disabled>
                    </div>
                  <div class="row mb10">
                    Tên loại<br>
                    <input type="text" name="tenloai">
                  </div>
                  <div class="row mb10">
                    
                    <input type="submit" name="themoi" value="THÊM MỚI">
                    <input type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
                  </div>
                  <?php 
                  if(isset($thongbao)&&($thongbao!=''))
                  echo $thongbao;
                  ?>

                </form>
            </div>
        </div>
    </div>

<?php

if(is_array($listdm)){
    extract($listdm);
}

?>

<div class="row">
            <div class="row formtitle">
                <h1> CẬP NHẬT LOẠI HÀNG HÓA</h1>
            </div>
            <div class="row formcontent">
                <form action="index.php?act=updatedm" method="post">
                    <div class="row mb10">
                        Mã Loại<br>
                        <input type="text" name="id" disabled>
                    </div>
                  <div class="row mb10">
                    Tên loại<br>
                    <input type="text" name="tenloai" value="<?php if(isset($name)&&($name!="")) {echo $name;}?>">
                  </div>
                  <div class="row mb10">
                    
                  <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id;?>">
                    <input type="submit" name="capnhat" value="Cập nhật">
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
  

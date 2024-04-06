<?php

if (is_array($listsp)) {
  extract($listsp);
}
$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
  $hinh = "<img src='" . $hinhpath . "' height='80'>";
} else {
  $hinh = "No photoo";
}
?>

<div class="row">
  <div class="row formtitle">
    <h1> CẬP NHẬT LOẠI HÀNG HÓA</h1>
  </div>
  <div class="row formcontent">
    <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
      <div class="row mb10">
      <input type="hidden" name="id" value="<?= $id ?>">
        <select name="iddm" id="">
          <option value="0" selected>Tất cả</option>
          <?php
          foreach ($listdm as $danhmuc) {
            extract($danhmuc);
            if ($iddm == $id)
              
              echo '<option value="' . $id . '" selected>'. $name . '</option>';
            else
              
            echo '<option value="' . $id . '">'. $name . '</option>';
          }
          ?>
        </select>
      </div>
      <input type="hidden" name="id" value="<?php echo $idsp; ?>" />
      <div class="row mb10">
        Tên sản phẩm<br>
        <input type="text" name="tensp" value="<?= $namesp ?>">
      </div>
      <div class="row mb10">
        giá<br>
        <input type="text" name="giasp" value="<?= $gia ?>">
      </div>
      <div class="row mb10">
        ảnh <br>
        <input type="hidden" name="hinhcu" value=" <?= $img ?>">
        <input type="file" name="hinh">
        <?= $hinh ?>
      </div>
      <div class="row mb10">
        Mô tả<br>
        <textarea name="mota" cols="30" row="10"><?= $mota ?></textarea>
      </div>
      
      

      <div class="row mb10">
        <input type="submit" name="capnhat" value="cập nhật">
        <input type="reset" value="NHẬP LẠI">
        <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
      </div>
      <?php
      if (isset($thongbao) && ($thongbao != ''))
        echo $thongbao;
      ?>

    </form>
  </div>
</div>
</div>
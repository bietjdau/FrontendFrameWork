<div class="row">
    <div class="row formtitle">
        <h1>DANH SÁCH SẢN PHẨM</h1>
    </div>
    <form action="index.php?act=listsp" method="post">
        <input type="search" name="kyw" id="">
        <select name="iddm" id="">
            <option value="0" selected>Tất cả</option>
            <?php
            foreach ($listdm as $danhmuc) {
              
                extract($danhmuc);
                echo '<option value="' . $id . '">"' . $name . '"</option>';
            }
            ?>
        </select>
        <input type="submit" name="listok" value="go">
    </form>
    <div class="row formcontent">
        <div class="row mb10 formdsloai">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ SẢN PHẨM</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>HÌNH</th>
                    <th>GIÁ</th>
                    <th>LƯỢT XEM</th>
                    <th></th>
                </tr>
                <?php
                $luotxem="";
                foreach ($listsp as $sanpham) {
                    extract($sanpham);
                    $suasp = "index.php?act=suasp&id=" . $idsp;
                    $xoasp = "index.php?act=xoasp&id=" . $idsp."&iddm=".$iddm;
                    $hinhpath = "../upload/" . $img;
                    if (is_file($hinhpath)) {
                        $hinh = "<img src='" . $hinhpath . "' height='80'>";
                    } else {
                        $hinh = "No photoo";
                    }
                    echo '  <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>' . $idsp . '</td>
                            <td>' . $namesp . '</td>
                            <td>' . $hinh . '</td>
                            <td>' . $gia . '</td>
                            <td>' . $luotxem . '</td>
                            <td><a href="' . $suasp . '"><input type="button" value="sửa"></a> <a href="' . $xoasp . '"><input type="button" value="xóa"></a></td>
                        </tr>';
                }
                ?>


            </table>
        </div>
        <div class="row mb10">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa mục đã chọn">

            <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
        </div>

    </div>
</div>
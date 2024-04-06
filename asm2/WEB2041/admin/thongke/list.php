<div class="row">
    <div class="row formtitle">
        <h1>DANh SÁCH THỐNG KÊ</h1>
    </div>
    <div class="row formcontent">

            <div class="row mb10 formdsloai">
                <table>
                    <tr>
                        
                        <th>Mã danh mục</th>
                        <th>Tên danh mục</th>
                        <th>Số lượng</th>
                        <th>Giá cao nhất</th>
                        <th>Gía thấp nhất</th>
                        <th>Gía trung bình</th>
                        
                    </tr>
                    <?php
                    foreach ($listthongke as $thongke) {
                        extract($thongke);
                       
                    //    $suabl = "index.php?act=suabl&id=" . $id;
                    //     $xoabl = "index.php?act=xoabl&id=" . $id; 
                        echo '  <tr>
                            <td>' . $madm . '</td>
                            <td>' . $tendm . '</td>
                            <td>' . $soluong . '</td>
                            <td>' . $maxgia. '</td>
                            <td>' . $mingia . '</td>
                            <td>' . $avggia . '</td>
                            </tr>';
                    }
                    ?>


                </table>
            </div>
            <div class="row mb10">
            <a href="index.php?act=bieudo"><input type="button" value="XEM BIỂU ĐỒ"></a>


            </div>

        
    </div>
</div>
<div class="row">
    <div class="row formtitle">
        <h1>DANH SÁCH ĐƠN HÀNG</h1>
    </div>
    <form action="index.php?act=listbill" method="post">
        <input type="text" name="kyw" id="" placeholder="nhập mã đơn hàng">
        <input type="submit" value="search" name="listok">


    </form>
    <div class="row formcontent">
        <div class="row mb10 cart">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ ĐƠN HÀNG</th>
                    <th>KHÁCH HÀNG</th>
                    <th>SỐ LƯỢNG HÀNG</th>
                    <th>GÍA TRỊ ĐƠN HÀNG</th>
                    <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                    <th>NGÀY ĐẶT HÀNG</th>
                    <th>THAO TÁC</th>
                </tr>
                <?php
                foreach ($listbill as $bill) {
                    extract($bill);
                    $kh =$bill['billname'].'
                    <br>'.$bill['bill_address'].'
                    <br>'.$bill['bill_email'].'
                    <br>'.$bill['bill_tel'].'';
                    $xoabill = "index.php?act=delbill&idbill=".$id;
                    
                    $ttdh=get_thdh($bill['bill_status']);
                    $countsp= loadall_cart_count($bill['id']);
                    echo ' <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>NVA-'.$bill['id'].'</td>
                    <td>'.$kh.'</td>
                    <td>'.$countsp.'</td>
                    <td><strong>'.$bill['total'].'</strong>VND</td>
                    <td>'.$ttdh.'</td>
                    <td>'.$bill['ngaydathang'].'</td>
                    <td><a href="index.php?act=editbill&edit='.$bill['id'].'"><input type="button" value="sửa"></a>
                    <a href="index.php?act=delbill&id='.$bill['id'].'"><input type="button" value="xóa"></a></td>

                </tr>';
                }
                ?>



            </table>
        </div>
        <div class="row mb10">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa mục đã chọn">

            <!-- <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a> -->
        </div>

    </div>
</div>
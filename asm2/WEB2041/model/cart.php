<?php
function viewcart($del)
{
    global $hinhpath;
    $tong = 0;
    $i = 0;
    if ($del == 1) {
        $xoasp_th = "<th>Thao tác</th>";
        $xoasp_td2 = "<td></td>";

    } else {
        $xoasp_th = "";
        $xoasp_td2 = " ";
    }
    echo '<tr>
    <th>Hình</th>
    <th>Sản Phẩm</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
    ' . $xoasp_th . '
     </tr>';
    foreach ($_SESSION['mycart'] as $id => $cart) {


        $img = $hinhpath . $cart['hinh'];
        $ttien = (double) $cart['soluong'] * (double) $cart['gia'];
        $tong = $tong + $ttien;
        if ($del == 1) {
            $xoasp_td = '<td><a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="xóa"></a></td>';
        } else {

            $xoasp_td = " ";
        }
        echo '<tr>
            <td><img height="90px" src="' . $cart['hinh'] . '" alt=""></td>
            <td>' . $cart['name'] . '</td>
            <td>' . $cart['gia'] . '</td>
            <td>' . $cart['soluong'] . '</td>
            <td>' . $ttien . '</td>
            ' . $xoasp_td . '

            <form action="" method="post">
            <input type="hidden" name="id" value="' . $id . '" >
            <input type="hidden" name="iddm" value="' . $cart['iddm'] . '" >
            </form>
        </tr>';
        $i += 1;
    }
    echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td>' . $tong . '</td>
            ' . $xoasp_td2 . '
        </tr>';
}

function bill_chitiet($listbill)
{
    global $hinhpath;
    $tong = 0;
    $i = 0;

    echo '<tr>
    <th>Hình</th>
    <th>Sản Phẩm</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
   
     </tr>';
    foreach ($listbill as $cart) {


        $img = $hinhpath . $cart['img'];//thieu id danh muc

        $tong = $cart['thanhtien'];

        echo '<tr>
            <td><img height="90px" src="' . $cart['img'] . '" alt=""></td>
            <td>' . $cart['name'] . '</td>
            <td>' . $cart['price'] . '</td>
            <td>' . $cart['soluong'] . '</td>
            <td>' . $cart['thanhtien'] . '</td>
           
        </tr>';
        $i += 1;
    }
    echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td>' . $tong . '</td>
          
        </tr>';
}
function tongdonhang()
{

    $tong = 0;


    foreach ($_SESSION['mycart'] as $id => $cart) {


        $ttien = (double) $cart['soluong'] * (double) $cart['gia'];
        $tong = $tong + $ttien;
        echo '<form action="" method="post">
            <input type="hidden" name="id" value="' . $id . '" >
            </form>';
    }
    return $tong;
}

function insert_bill($iduser, $name, $address, $email, $tel, $pttt, $ngaydathang, $tongdonhang)
{
    $sql = "INSERT INTO bill(iduser,billname,bill_address,bill_email,bill_tel,bill_pttt,ngaydathang,total) values('$iduser','$name',  '$address','$email', '$tel','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}

function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill)
{
    $sql = "INSERT INTO cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values('$iduser','$idpro','$img', '$name','$price','$soluong','$thanhtien','$idbill    ')";
    return pdo_execute($sql);
}

function loadone_bill($idbill)
{
    $sql = "SELECT * from bill where  id = " . $idbill;
    $listbill = pdo_query_one($sql);
    return $listbill;
}

function loadall_cart($idbill)
{
    $sql = "SELECT * from cart where  idbill = " . $idbill;
    $billct = pdo_query($sql);
    return $billct;
}

function loadall_bil($kyw="",$iduser=0)
{
    $sql = "SELECT * from bill where 1";   
    if($iduser>0) $sql.= " AND iduser = " . $iduser;
    if($kyw!="") $sql.= " AND id like '%" . $kyw."%'";
    $sql.=" order by id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}

function loadall_bil_count($iduser)
{
    $sql = "SELECT * from bill where  iduser = " . $iduser;
    $listbill = pdo_query($sql);
    return sizeof($listbill);
}
function loadall_cart_count($idbill)
{
    $sql = "SELECT * from cart where  idbill = " . $idbill;
    $listbill = pdo_query($sql);
    return sizeof($listbill);
}
function loadall_thongke()
{
    $sql = "select danhmuc.id 'madm', danhmuc.name 'tendm', COUNT(*) 
    'soluong',MIN(sanpham.gia) 'mingia', MAX(sanpham.gia) 'maxgia',AVG(sanpham.gia) 
    'avggia' from danhmuc join sanpham on danhmuc.id = sanpham.iddm GROUP by danhmuc.id,danhmuc.name ORDER by soluong desc";
    $listthongke = pdo_query($sql);
    
   
    return $listthongke;
}

function load_bill_edit($id){
    $sql = "SELECT * FROM `bill` WHERE id =".$id;
    $bill = pdo_query_one($sql);
    return $bill;
}
function update_bill($id,$ttdh){
    $sql = "UPDATE `bill` SET `bill_status`='$ttdh' WHERE id = ".$id;
    pdo_execute($sql);
}

function delete_donhang($del){
    $sql = "DELETE FROM `cart` WHERE idbill in ";
    $sql.= "('".implode("','",array_values($del))."')";
    pdo_execute($sql);
    $sql = "DELETE FROM `bill` WHERE id in ";
    $sql.= "('".implode("','",array_values($del))."')";
    pdo_execute($sql);
}
function delete_bill($id)
{
    $sql = "delete from bill where id=" . $id;
    pdo_execute($sql);
}
function get_thdh($n)
{
    switch ($n) {
        case '0':
            $tt = "Đơn hàng mới";
            break;
        case '1':
            $tt = "Đang xử lý";
            break;
        case '2':
            $tt = "Đang giao hàng";
            break;
        case '3':
            $tt = "Đã giao hàng";
            break;

        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}
?>
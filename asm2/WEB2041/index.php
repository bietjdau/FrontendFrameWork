<?php
session_start();
include "model/pdo.php";
include "global.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
include "model/cart.php";

if (!isset($_SESSION['mycart']))
    $_SESSION['mycart'] = [];

$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$dsyt = loadall_sanpham_yeuthich();

include "view/header.php";

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanpham':
            if (isset($_POST['kyw']) && ($_POST['kyw'] > 0)) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];

            } else {
                $iddm = 0;
            }
            $tendm = load_tendm($iddm);
            $dssp = loadall_sanpham($kyw, $iddm);
            include "view/sanpham.php";
            break;
        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $ctsp = loadone_sanpham($id);
                extract($ctsp);
                $spcl = load_sanpham_cungloai($idsp, $iddm);
                include "view/sanphamct.php";
            } else {
                include "view/home.php";
            }
            break;
        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                insert_taikhoan($email, $user, $pass);
                $thongbao = "Dang ky thanh cong";

            }
            include "view/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = check_user($user, $pass);

                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header('Location: index.php');
                    //$thongbao = "Ban đã đăng nhập thành công";
                } else {
                    $thongbao = "tai khoan khong ton tai. Vui long kiem tra hoac dang ky";

                }
            }
            include "view/tdangkyaikhoan/.php";
            break;
        case 'edit_tk':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];

                update_tk($id, $user, $pass, $email, $address, $tel);
                $_SESSION['user'] = check_user($user, $pass);
                header('Location: index.php?act=edit_tk');

            }
            include "view/taikhoan/edit_tk.php";
            break;
        case 'quenmk':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];

                $checkemail = check_emmail($email);

                if (is_array($checkemail)) {
                    $thongbao = "mật khẩu của bạn là: " . $checkemail['pass'];
                } else {
                    $thongbao = "email này không tồn tại";
                }
                // header('Location: index.php?act=quenmk');

            }
            include "view/taikhoan/quenmk.php";
            break;
        case 'logout':
            session_unset();
            header('Location: index.php');
            break;
        case 'addtocart':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];

                $namesp = $_POST['namesp'];
                $hinh = $_POST['hinh'];
                $gia = $_POST['gia'];
                $soluong = 1;

                if (!isset($_SESSION['mycart'])) {

                    $_SESSION['mycart'] = array();
                }
                if (isset($_SESSION['mycart'][$id])) {
                    // thêm số lượng, tính tổng giá tiền
                    $_SESSION['mycart'][$id]['soluong'] += 1;
                    $_SESSION['mycart'][$id]['thanhtien'] = (double) $_SESSION['mycart'][$id]['soluong'] * (double) $_SESSION['mycart'][$id]['gia'];

                } else {
                    // thêm sản phẩm mới 
                    $_SESSION['mycart'][$id] = array(
                        'name' => $namesp,
                        'gia' => $gia,
                        'soluong' => $soluong,
                        'hinh' => $hinh,
                        'iddm' => $iddm,
                        'thanhtien' => (double) $gia * (double) $soluong
                    );
                }



            }




            include "view/cart/viewcart.php";
            break;

        case 'delcart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }

            header('Location: index.php?act=viewcart');
            break;
        case 'viewcart':
            include "view/cart/viewcart.php";
            break;
        case 'bill':
            include "view/cart/bill.php";
            break;
        case 'billconfirm':
            if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                if (isset($_SESSION['user'])) {
                    $iduser = $_SESSION['user']['id'];
                } else {
                    $iduser = 0;
                }
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $pttt = $_POST['pttt'];
                $ngaydathang = date('h:i:sa d/m/Y');
                $tongdonhang = tongdonhang(); //ok




                $idbill = insert_bill($iduser, $name, $address, $email, $tel, $pttt, $ngaydathang, $tongdonhang);

                // insert into cart: session mycart và idbill

                foreach ($_SESSION['mycart'] as $id => $cart) {
                    insert_cart($_SESSION['user']['id'], $id, $cart['hinh'], $cart['name'], $cart['gia'], $cart['soluong'], $cart['thanhtien'], $idbill);
                }

                $_SESSION['cart'] = [];
            }
            $listbill = loadone_bill($idbill);
            $billct = loadall_cart($idbill);
            include "view/cart/billconfirm.php";
            break;
        case 'mybill':
            $listbill = loadall_bil($_SESSION['user']['id']);
            include "view/cart/mybill.php";
            break;
        case 'gioithieu':
            include "view/gioithieu.php";
            break;
        case 'gopy':
            include "view/gopy.php";
            break;
        case 'hoidap':
            include "view/hoidap.php";
            break;
        case 'lienhe':
            include "view/lienhe.php";
            break;


        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}


include "view/footer.php";
?>
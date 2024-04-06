<?php
include "../model/danhmuc.php";
include "../model/pdo.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";
include "header.php";
// controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            //ktra người dùng cps click vào add hay kh
            if (isset($_POST['themoi']) && ($_POST['themoi'])) {
                $tenloai = $_POST['tenloai'];
                insert_danhmuc($tenloai);
                $thongbao = "them thanh cong";
            }

            include "danhmuc/add.php";
            break;
        case 'listdm':
            $listdm = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            $listdm = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $listdm = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($id, $tenloai);
                $thongbao = "update thanh cong";
            }
            $listdm = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        /**controller sản phẩm */
        case 'addsp':
            //ktra người dùng cps click vào add hay kh
            if (isset($_POST['themoi']) && ($_POST['themoi'])) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $gia = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    //  echo "The file " . htmlspecialchars(basename($_FILES["hinh"]["name"])) . " has been uploaded.";
                } else {
                    //  echo "Sorry, there was an error uploading your file.";
                }
                insert_sanpham($tensp, $gia, $hinh, $mota, $iddm);
                $thongbao = "them thanh cong";
            }
            $listdm = loadall_danhmuc();
            include "sanpham/add.php";
            break;
        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = "";
                $iddm = 0;
            }
            $listdm = loadall_danhmuc();
            $listsp = loadall_sanpham($kyw, $iddm);

            include "sanpham/list.php";
            break;
        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listsp = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;
        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $listsp = loadone_sanpham($_GET['id']);
            }
            $listdm = loadall_danhmuc();
            include "sanpham/update.php";
            break;
        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $gia = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    //  echo "The file " . htmlspecialchars(basename($_FILES["hinh"]["name"])) . " has been uploaded.";
                } else {
                    //  echo "Sorry, there was an error uploading your file.";
                }

                update_sanpham($id, $iddm, $tensp, $gia, $hinh, $mota);
                $thongbao = "Cap nhat thanh cong";
            }
            $listdm = loadall_danhmuc();
            $listsp = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;
        // hết control sản phẩm

        // controller khách hàng
        case 'dskh':
            $listtk = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listtk = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'suatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $listdm = loadone_danhmuc($_GET['id']);
            }
            include "taikhoan/updatetk.php";
            break;
        case 'updatetk':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];

                update_tk($id, $user, $pass, $email, $address, $tel);
                $_SESSION['user'] = check_user($user, $pass);
                header('Location: index.php?act=updatetk');

            }
            include "taikhoan/list.php";
            break;

        // hết 

        case 'dsbl':
            $listbl = loadall_binhluan(0);
            include "binhluan/list.php";
            break;
        case 'xoabl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_binhluan($_GET['id']);
            }
            $listbl = loadall_binhluan($idpro);
            include "binhluan/list.php";
            break;
        case 'listbill':

            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            $listbill = loadall_bil($kyw, 0);
            include "bill/listbill.php";
            break;

        case 'editbill':
            if (isset($_GET['edit']) && (!empty($_GET['edit']))) {
                $bill = load_bill_edit($_GET['edit']);
            }
            include 'bill/editbill.php';
            break;
        case 'delbill':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_bill($_GET['id']);
            }
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            $listbill = loadall_bil($kyw, 0);
            include "bill/listbill.php";
            break;
        case 'updatebill':
            if (isset($_POST['update']) && ($_POST['update'])) {
                update_bill($_POST['id'], $_POST['ttdh']);
            }

            $id = 0;
            if (isset($_POST['listbillok']) && ($_POST['listbillok'])) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = '';
            }
            $listbill = loadall_bil($kyw, 0);
            include 'bill/listbill.php';
            break;
        case 'thongke':
            $listthongke = loadall_thongke();
            include "thongke/list.php";
            break;
        case 'bieudo':
            $listthongke = loadall_thongke();
            include "thongke/bieudo.php";
            break;
        default:
            include 'home.php';
            break;
    }
} else {
    include "home.php";
}



include "footer.php";
die();
?>
<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
$idpro = $_REQUEST['idpro'];

$dsbl = loadall_binhluan($idpro);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .binhluan table {
            width: 90%;
            margin-left: 5%;
        }

        .binhluan table td:nth-child(1) {
            width: 50%;
        }

        .binhluan table td:nth-child(2) {
            width: 20%;
        }

        .binhluan table td:nth-child(3) {
            width: 30%;
        }
    </style>
</head>

<body>


    <div class="row mb">
        <div class="boxtitle">BÌNH LUẬN</div>
        <div class="boxcontent binhluan">
            <table class="">

                <?php
                echo "nội dung binh luận ở đây: " . $idpro;
                foreach ($dsbl as $binhluan) {
                    extract($binhluan);
                    echo "<tr>";
                    echo "<td>'" . $noidung . "'</td>";
                    echo "<td>'" . $iduser . "'</td>";
                    echo "<td>'" . $ngaybinhluan . "'</td>";
                    echo "<?tr>";
                }
                ?>

            </table>
        </div>
        <div class="boxfooter binhluanform">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="hidden" name="idpro" value="<?= $idpro ?>">
                <!-- <input type="hidden" name="iduser" value="<?= $iduser ?>"> -->
                <input type="text" name="noidung" id="" placeholder="">
                <input type="submit" value="Gửi bình luận" name="guibinhluan">
            </form>
        </div>
        <?php
        if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
            $noidung = $_POST['noidung'];
            $idpro = $_POST['idpro'];
            $iduser = $_SESSION['user']['id'];
            $ngaybinhluan = date('h:i:sa d/m/Y');
            insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
        ?>
    </div>

</body>

</html>
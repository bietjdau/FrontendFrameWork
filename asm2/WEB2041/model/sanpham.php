<?php


function insert_sanpham($tensp, $gia, $hinh, $mota, $iddm)
{
    $sql = "INSERT INTO `sanpham`(`name`,`gia`,`img`,`mota`,`iddm`) values ('$tensp','$gia','$hinh','$mota','$iddm')";
    pdo_execute($sql);
}

function delete_sanpham($idsp)
{
    $sql = "delete from sanpham where idsp=" . $idsp;
    pdo_execute($sql);
}
function loadall_sanpham($kyw="", $iddm=0)
{
    $sql = "SELECT * FROM sanpham where 1 ";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and iddm ='" . $iddm . "'";
    }
    $sql .= " order by idsp desc";
    $listsp = pdo_query($sql);
    return $listsp;
}

function load_tendm($iddm)
{
    if($iddm>0){
        $sql = "SELECT * from danhmuc where  id = " . $iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    }else{
        return "";
    }
 
}
function loadall_sanpham_home()
{
    $sql = "SELECT * FROM sanpham where 1 order by idsp desc limit 0,9";
    $listsp = pdo_query($sql);
    return $listsp;
    
}
function loadall_sanpham_yeuthich()
{
    $sql = "SELECT * FROM sanpham where 1 order by view desc limit 0,10";
    $listsp = pdo_query($sql);
    return $listsp;
    
}
function loadone_sanpham($idsp)
{
    $sql = "SELECT * from sanpham where  idsp = " . $idsp;
    $listsp = pdo_query_one($sql);
    return $listsp;
}
function load_sanpham_cungloai($idsp,$iddm)
{
    $sql = "SELECT * from sanpham where iddm=".$iddm." AND idsp <>" . $idsp;
    $listsp = pdo_query($sql);
    return $listsp;
}
function update_sanpham($id, $iddm, $tensp, $gia, $hinh, $mota)
{
    if ($hinh != "")
        $sql = "UPDATE sanpham set iddm='" . $iddm . "',namesp='" . $tensp . "', gia='" . $gia . "', mota='" . $mota . "', img='" . $hinh . "' where idsp=" . $id;
    else
        $sql = "UPDATE sanpham set iddm='" . $iddm . "',namesp='" . $tensp . "', gia='" . $gia . "', mota='" . $mota . "' where idsp=" . $id;
    // echo $sql;

    pdo_execute($sql);

}

?>
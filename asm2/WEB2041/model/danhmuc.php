<?php


function insert_danhmuc($tenloai)
{
    $sql = "INSERT INTO danhmuc(name) values('$tenloai')";
    pdo_execute($sql);
}

function delete_danhmuc($id)
{
    $sql = "delete from danhmuc where id=" . $id;
    pdo_execute($sql);
}
function loadall_danhmuc()
{
    $sql = "SELECT * FROM danhmuc order by id desc";
    $listdm = pdo_query($sql);
    return $listdm;
}
/**
 * Summary of loadone_danhmuc
 * @param mixed $id
 * @return mixed
 */
function loadone_danhmuc($id)
{
    $sql = "SELECT * from danhmuc where  id =".$id;
    $listdm = pdo_query_one($sql);
    return $listdm;
}
function update_danhmuc($id, $tenloai)
{

    $sql = " UPDATE `danhmuc` SET `name`='" . $tenloai . "' WHERE id=" . $id;
    pdo_execute($sql);

}
?>
<?php 
function insert_taikhoan($email,$user,$pass)
{
    $sql = "INSERT INTO taikhoan(email,user,pass) values('$email','$user','$pass')";
    pdo_execute($sql);
}

function check_user($user,$pass)
{
    $sql = "SELECT * from taikhoan where user='".$user."' AND  pass='".$pass."'";
    $tk = pdo_query_one($sql);
    return $tk;
}
function check_emmail($email)
{
    $sql = "SELECT * from taikhoan where email='".$email."'";
    $tk = pdo_query_one($sql);
    return $tk;
}
function update_tk($id, $user, $pass, $email, $address, $tel)
{    
     
    $sql = "update taikhoan set user='" . $user . "',pass='" . $pass . "', email='" . $email . "', address='" . $address . "',tel='" . $tel . "' where id=" . $id;
   
    pdo_execute($sql);
}

function loadall_taikhoan()
{
    $sql = "SELECT * FROM taikhoan order by id desc";
    $listtk = pdo_query($sql);
    return $listtk;
}
function delete_taikhoan($id)
{
    $sql = "delete from taikhoan where id=" . $id;
    pdo_execute($sql);
}
function loadone_taikhoan($id)
{
    $sql = "SELECT * from taikhoan where  id =".$id;
    $listdm = pdo_query_one($sql);
    return $listdm;
}
?>
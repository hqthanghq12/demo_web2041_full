<?php
function loadall_taikhoan()
{
    $sql = "SELECT * FROM taikhoan";
    $tk = pdo_query($sql);
    return $tk;
}
function loadone_taikhoan($id){
    $sql = "SELECT * FROM taikhoan WHERE id='$id'";
    $tk = pdo_query($sql);
    return $tk;
}
function insert_taikhoan($user, $pass, $email)
{
    $sql = " INSERT INTO taikhoan(user,pass,email) VALUES('$user','$pass','$email')";
    pdo_execute($sql);
}
function check_user($user, $pass)
{
    $sql = "SELECT * FROM taikhoan WHERE user='$user' AND pass ='$pass'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function checkemail($email)
{
    $sql = "SELECT * FROM taikhoan WHERE email='$email'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function update_taikhoan($id,$user,$pass,$email, $address, $tel)
{
    $sql = " UPDATE taikhoan SET user='$user',pass='$pass', email='$email' , address='$address' , tel='$tel' WHERE id = '$id' ";
    pdo_execute($sql);
}
function update_mk($id,$user,$newpass)
{
    $sql = " UPDATE taikhoan SET user='$user',pass='$newpass' WHERE id = '$id'";
    pdo_execute($sql);
}
function loadone_tk($id){
    $sql = "SELECT * FROM taikhoan WHERE id='$id'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}
function delete_tk($id){
    $sql = "DELETE FROM taikhoan WHERE id='$id'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}
?>
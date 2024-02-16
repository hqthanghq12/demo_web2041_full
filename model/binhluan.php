<?php
    
function insert_bl($noidung, $iduser, $idpro, $ngaybl) { 
    $sql = "INSERT INTO binhluan(noidung, iduser, idpro, ngaybinhluan) values ('$noidung', '$iduser', '$idpro', '$ngaybl')";
    pdo_execute($sql);
}
function loadbl_binhluan($idpro){
    $sql ="SELECT * FROM binhluan where 1";
    if($idpro > 0 ){
        $sql .=" AND idpro='".$idpro."'";
    }
    else{
        $sql .=" ORDER BY id desc ";
    }
    $loadbl = pdo_query($sql);
    return $loadbl;
}
function xoa_bl($id) { 
    $sql = "DELETE FROM binhluan WHERE id=" .$id;
    pdo_execute($sql);
} 
?>


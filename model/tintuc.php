<?php
function loadall_tintuc()
{
    $sql = "SELECT tt.*, dm.ten_danhmuc FROM  tintuc AS tt INNER JOIN danhmuctintuc AS dm ON dm.id_danhmuc = tt.id_danh_muc";
    $list_tt = pdo_query($sql);
    return $list_tt;
}
function insert_tintuc($tieu_de, $noi_dung, $filename, $iddm)
{
    $sql = " INSERT INTO tintuc( tieu_de, noi_dung, hinh_anh, id_danh_muc) VALUES('$tieu_de','$noi_dung','$filename','$iddm')";
    pdo_execute($sql);
}
function loadone_tintuc($id)
{
    $sql = "SELECT * FROM tintuc WHERE id='$id'";
    $tintuc = pdo_query_one($sql);
    return $tintuc;
}
function update_tintuc($id,$tieu_de, $noi_dung, $filename, $iddm)
{
    if ($filename !="") {
        $sql = " UPDATE tintuc SET id_danh_muc='$iddm',tieu_de='$tieu_de',noi_dung='$noi_dung',hinh_anh='$filename'  WHERE id = ".$id;
    } else {
        $sql = " UPDATE tintuc SET id_danh_muc='$iddm',tieu_de='$tieu_de',noi_dung='$noi_dung' WHERE id = ".$id;
    }
    pdo_execute($sql);
}
function delete_tintuc($id)
{
    $sql = "DELETE FROM tintuc WHERE id=" . $id;
    pdo_execute($sql);
}
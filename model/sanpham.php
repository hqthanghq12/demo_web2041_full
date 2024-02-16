<?php
function insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm)
{
    $sql = " INSERT INTO sanpham(name,price,img,mota,iddm) VALUES('$tensp','$giasp','$hinh','$mota','$iddm')";
    pdo_execute($sql);
}

function delete_sanpham($id)
{
    $sql = "DELETE FROM sanpham WHERE id=" . $id;
    pdo_execute($sql);
}

function loadall_sanpham($kewword = " ", $iddm = 0)
{
    $sql = "SELECT * FROM sanpham WHERE 1";
    if ($kewword != "") {
        $sql .= " and name like '%" . $kewword . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and iddm ='" . $iddm . "'";
    }
    $sql .= " ORDER BY id desc";
    $list_sp = pdo_query($sql);
    return $list_sp;
}
function loadall_sanpham_home()
{
    $sql = "SELECT * FROM sanpham ORDER BY id DESC";
    $list_sp = pdo_query($sql);
    return $list_sp;
}
function loadall_sanpham_top10()
{
    $sql = "SELECT * FROM sanpham WHERE 1 ORDER BY luotxem DESC limit 0,10";
    $list_sp = pdo_query($sql);
    return $list_sp;
}
function loadall_sanpham_gia()
{
    $sql = "SELECT * FROM sanpham WHERE 1 ORDER BY luotxem DESC limit 0,10";
    $list_sp = pdo_query($sql);
    return $list_sp;
}
function loadone_sanpham($id)
{
    $sql = "SELECT * FROM sanpham WHERE id='$id'";
    $sanpham = pdo_query_one($sql);
    return $sanpham;
}
function load_ten_dm($id_danh_muc)
{
    if($id_danh_muc >0){
        $sql = "SELECT * FROM danhmuc WHERE id='$id_danh_muc'";
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    }else{
        return "";
    }
}
function load_sanpham_cungloai($id,$iddm)
{
    $sql = "SELECT * FROM sanpham WHERE iddm='$iddm' AND id !='$id'";
    $list_sp = pdo_query($sql);
    return $list_sp;
}
function update_sp($id,$iddm, $tensp, $giasp, $mota, $hinh)
{
    if ($hinh !="") {
        $sql = " UPDATE sanpham SET iddm='$iddm',name='$tensp',price='$giasp',img='$hinh' , mota='$mota' WHERE id = ".$id;
    } else {
        $sql = " UPDATE sanpham SET iddm='$iddm',name='$tensp',price='$giasp',mota='$mota' WHERE id = ".$id;
    }
    pdo_execute($sql);
}
?>
<?php
session_start();
if(isset($_SESSION["user"])&& $_SESSION["user"]['role']==1){
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/binhluan.php";
    include "../model/thongke.php";
    include "../model/tintuc.php";
    include "../model/danhmuctintuc.php";
    include "header.php";

    if (isset($_GET["act"]) && $_GET["act"] != "") {
        $act = $_GET["act"];
        switch ($act) {

            //==================== CONTROLLER DANH MỤC ========================//

            case 'adddm':
                if (isset($_POST["themmoi"])) {
                    $tenloai = $_POST["tenloai"];
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                }
                include "./danhmuc/add.php";
                break;
            case 'xoadm':
                if (isset($_GET["id"]) && $_GET["id"] > 0) {
                    delete_danhmuc($_GET["id"]);
                }
                $listdanhmuc = loadall_danhmuc();
                include "./danhmuc/list.php";
                break;
            case 'suadm':
                if (isset($_GET["id"]) && $_GET["id"] > 0) {
                    $dm = loadone_danhmuc($_GET["id"]);
                }
                include "./danhmuc/update.php";
                break;
            case 'updatedm':
                if (isset($_POST["capnhat"]) && $_POST["capnhat"]) {
                    $tenloai = $_POST["tenloai"];
                    $id_dm = $_POST["id_dm"];
                    update_dm($id_dm, $tenloai);
                    $thongbao = "Cập nhật thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                include "./danhmuc/list.php";
                break;
            case 'listdm':
                $listdanhmuc = loadall_danhmuc();
                include "./danhmuc/list.php";
                break;

            //==================== CONTROLLER SẢN PHẨM ========================//

            case 'addsp':
                if (isset($_POST["themmoi"]) && $_POST["themmoi"]) {
                    $iddm = $_POST["iddm"];
                    $tensp = $_POST["tensp"];
                    $giasp = $_POST["giasp"];
                    $mota = $_POST["mota"];
                    $filename = $_FILES["hinh"]["name"];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($filename);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        //echo "File" . htmlspecialchars(basename($_FILES["hinh"]["name"])) . " đã được up load.";
                    } else {
                        //echo "Lỗi up load file.";
                    }
                    insert_sanpham($tensp, $giasp, $filename, $mota, $iddm);
                    $thongbao = "Thêm thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                include "./sanpham/add.php";
                break;
            case 'listsp':
                if (isset($_POST["listok"]) && $_POST["listok"]) {
                    $kewword = $_POST["keyword"];
                    $iddm = $_POST["iddm"];
                } else {
                    $kewword = '';
                    $iddm = 0;
                }
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham($kewword, $iddm);
                include "./sanpham/list.php";
                break;
            case 'xoasp':
                if (isset($_GET["id"]) && $_GET["id"] > 0) {
                    delete_sanpham($_GET["id"]);
                }
                $list_sp = loadall_sanpham("", 0);
                include "./sanpham/list.php";
                break;

            case 'suasp':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $sanpham = loadone_sanpham($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "./sanpham/update.php";
                break;
            case 'updatesp':
                if (isset($_POST["capnhat_sp"]) && $_POST["capnhat_sp"]) {
                    $id = $_POST["id"];
                    $iddm = $_POST["iddm"];
                    $tensp = $_POST["tensp"];
                    $giasp = $_POST["giasp"];
                    $mota = $_POST["mota"];
                    $filename = $_FILES["hinh"]["name"];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($filename);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        //echo "File" . htmlspecialchars(basename($_FILES["hinh"]["name"])) . " đã được up load.";
                    } else {
                        //echo "Lỗi up load file.";
                    }
                    update_sp($id, $iddm, $tensp, $giasp, $mota, $filename);
                    $thongbao = "Cập nhật thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham("",0);
                include "./sanpham/list.php";

            //==================== CONTROLLER TÀI KHOẢN ========================//

            case 'dskh':
                $listtaikhoan = loadall_taikhoan();
                include "./taikhoan/list.php";
                break;
            case 'listtintuc':
                $listtintuc = loadall_tintuc();
                include "./tintuc/list.php";
                break;
            case 'addtintuc':
                unset($_SESSION['errors']);

                if (isset($_POST["themmoi"]) && $_POST["themmoi"]) {
                    $error = [];
                    if(empty($_POST["tieu_de"])){
                        $error[]= "Vui lòng nhập tiêu đề";
                    }
                    if(empty($_POST["noi_dung"])){
                        $error[]= "Vui lòng nhập nội dung";

                    }
                    if(empty($_FILES["hinh_anh"]["name"])){
                        $error[]= "Vui lòng chọn hình ảnh";
                    }
                    if(count($error)>=1){
                        $_SESSION['errors'] = $error;
                    }else{
                        $tieu_de = $_POST["tieu_de"];
                        $noi_dung = $_POST["noi_dung"];
                        $iddm = $_POST["iddm"];
                        $filename = $_FILES["hinh_anh"]["name"];
                        $target_dir = "../uploads/";
                        $target_file = $target_dir . basename($filename);
                        if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file)) {
                            //echo "File" . htmlspecialchars(basename($_FILES["hinh"]["name"])) . " đã được up load.";
                        } else {
                            //echo "Lỗi up load file.";
                        }
                        insert_tintuc($tieu_de, $noi_dung, $filename, $iddm);
                        $thongbao = "Thêm thành công";
                    }

                }
                $listdmtintuc = loadall_dmtintuc();
                include "./tintuc/add.php";
                break;
            case 'suatintuc':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $tintuc = loadone_tintuc($_GET['id']);
                }
                $listdmtintuc = loadall_dmtintuc();
                include "./tintuc/update.php";
                break;
            case 'updatetintuc':
                unset($_SESSION['errors']);
                if (isset($_POST["capnhat_tt"]) && $_POST["capnhat_tt"]) {
                    $error = [];
                    if(empty($_POST["tieu_de"])){
                        $error[]= "Vui lòng nhập tiêu đề";
                    }
                    if(empty($_POST["noi_dung"])){
                        $error[]= "Vui lòng nhập nội dung";

                    }
                    if(count($error)>=1){
                        $_SESSION['errors'] = $error;
                        header('Location: http://localhost/duanmau_fullcode/admin/index.php?act=suatintuc&id='.$_POST["id"]);
                    }else{
                        $id = $_POST["id"];
                        $tieu_de = $_POST["tieu_de"];
                        $noi_dung = $_POST["noi_dung"];
                        $iddm = $_POST["iddm"];
                        $filename = $_FILES["hinh_anh"]["name"];
                        $target_dir = "../uploads/";
                        $target_file = $target_dir . basename($filename);
                        if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file)) {
                            //echo "File" . htmlspecialchars(basename($_FILES["hinh"]["name"])) . " đã được up load.";
                        } else {
                            //echo "Lỗi up load file.";
                        }
                        update_tintuc($id,$tieu_de, $noi_dung, $filename, $iddm);
                        header('Location: http://localhost/duanmau_fullcode/admin/index.php?act=listtintuc');
                    }

                }
                $listdmtintuc = loadall_dmtintuc();
                include "./tintuc/add.php";
                break;
            case 'xoatintuc':
                if (isset($_GET["id"]) && $_GET["id"] > 0) {
                    delete_tintuc($_GET["id"]);
                }
                header('Location: http://localhost/duanmau_fullcode/admin/index.php?act=listtintuc');
                break;

            default:
                include "home.php";
                break;
        }
    } else {
        include "home.php";
    }
    include "footer.php";
}else{
    header('Location: http://localhost/duanmau_fullcode/index.php');
}

?>
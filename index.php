<?php
session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
include "model/binhluan.php";
include "view/header.php";
include "global.php";
$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$dstop10 = loadall_sanpham_top10();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {

        //==================== CONTROLLER TÀI KHOẢN ========================//

        case 'dangky':
            if (isset($_POST["dangky"]) && $_POST["dangky"]) {
                $email = $_POST["email"];
                $user = $_POST["user"];
                $pass = $_POST["pass"];
                insert_taikhoan($user, $pass, $email);
                $thongbao = "Đăng ký thành công . Vui lòng đăng nhập để bình luận hoặc mua hàng";
            }
            include "view/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if (isset($_POST["dangnhap"]) && $_POST["dangnhap"]) {
                $user = $_POST["user"];
                $pass = $_POST["pass"];
                $checkuser = check_user($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION["user"] = $checkuser;
                    header("location:index.php");
                } else {
                    $thongbao = "Tài khoản không tồn tại , vui lòng kiểm tra hoặc đăng ký !";
                }
            }
            include "view/taikhoan/dangky.php";
            break;
        case 'edit_taikhoan':
            if (isset($_POST["capnhat"]) && $_POST["capnhat"]) {
                $id = $_POST["id"];
                $email = $_POST["email"];
                $user = $_POST["user"];
                $pass = $_POST["pass"];
                $address = $_POST["address"];
                $tel = $_POST["tel"];
                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $_SESSION["user"] = check_user($user, $pass);
                $thongbao = "Cập nhật thành công";
            }
            include "view/taikhoan/edit_taikhoan.php";
            break;
        case 'quenmk':
            if (isset($_POST["guimk"]) && $_POST["guimk"]) {
                $email = $_POST["email"];
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là : " . $checkemail["pass"];
                } else {
                    $thongbao = "Email này không tồn tại";
                }
            }
            include "view/taikhoan/quenmk.php";
            break;
        case 'thoat':
            session_unset();
            header("location:index.php");
            break;
            
        //==================== CONTROLLER SẢN PHẨM ========================//

        case 'sanpham':
            if (isset($_POST["keyword"]) && $_POST["keyword"] != "") {
                $kyw = $_POST["keyword"];
            } else {
                $kyw = "";
            }
            if (isset($_GET["id"]) && $_GET["id"] > 0) {
                $id = $_GET["id"];

            } else {
                $id = 0;
            }
            $dssp = loadall_sanpham($kyw, $id);
            $tendm = load_ten_dm($id);
            include "view/sanpham.php";
            break;
        case 'sanphamct':
            if (isset($_GET["id"]) && $_GET["id"] > 0) {
                $id = $_GET["id"];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                $sp_cung_loai = load_sanpham_cungloai($id, $iddm);
            } else {
                include "view/main.php";
            }
            include "view/sanphamct.php";
            break;
        case 'gioithieu':
            include "view/gioithieu.php";
            break;
        case 'lienhe':
            include "view/lienhe.php";
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
?>
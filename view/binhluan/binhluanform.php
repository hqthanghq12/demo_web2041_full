<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
$idpro = $_REQUEST['idpro'];
$listbl = loadbl_binhluan($idpro);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .binhluan table {
            width: 90%;
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
    <div class="card">
        
        <div class="binhluan">
            <table>
                <?php
                foreach ($listbl as $bl) {
                    extract($bl);
                    echo '<tr><td>' . $noidung . '</td>';
                    echo '<td>' . $iduser . '</td>';
                    echo '<td>' . $ngaybinhluan . '</td></tr>';

                }
                ?>
            </table>
        </div>
        <div>
            <?php
            if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
                extract($_SESSION['user']);
                ?>
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="idpro" value="<?= $idpro ?>">
                    <input type="hidden" name="iduser" value="<?= $iduser ?>">
                    <input name="noidung" type="text" placeholder="Nhập bình luận...">
                    <div class="btn-cmt" style="padding-left: 10px;">
                        <input name="btn_guibl" type="submit" value="Bình luận">
                    </div>
                </form>
            <?php } else { ?>
                <p style=color:red;>Bạn phải đăng nhập để bình luận!</p>
            <?php } ?>
        </div>
        <?php
        if (isset($_POST['btn_guibl']) && $_POST['btn_guibl']) {
            $noidung = $_POST['noidung'];
            $idpro = $_POST['idpro'];
            $iduser = $_SESSION['user']['id'];
            $ngaybl = date("Y-m-d H:i:s");
            insert_bl($noidung, $iduser, $idpro, $ngaybl);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
        ?>
    </div>
</body>

</html>
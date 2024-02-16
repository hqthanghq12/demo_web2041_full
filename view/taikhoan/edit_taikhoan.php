<div class="box_title">CẬP NHẬT TÀI KHOẢN</div>
<div class="row mb dangky">
    <div class="box_content form_account boxleft">
        <?php
            if(isset($_SESSION["user"]) && is_array($_SESSION["user"])){
                extract($_SESSION["user"]);
            }
        ?>
        <form action="index.php?act=edit_taikhoan" method="POST">

            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email?>">

            <label>Tên đăng nhập</label>
            <input type="text" name="user" value="<?php echo $user?>">

            <label>Mật khẩu</label>
            <input type="password" name="pass" value="<?php echo $pass?>">

            <label>Địa chỉ</label>
            <input type="text" name="address" value="<?php echo $address?>">

            <label>Số điện thoại</label>
            <input type="text" name="tel" value="<?php echo $tel?>">

            <input type="hidden" name="id" value="<?php echo $id?>">
            <input type="submit" name="capnhat" value="Cập nhật">
            <input type="reset" value="Nhập lại">
        </form>
        <?php
            if(isset($thongbao) &&$thongbao!=""){
                echo $thongbao;
            }
        ?>
    </div>
    <?php include "view/boxright.php"?>
</div>

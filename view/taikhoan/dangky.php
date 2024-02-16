<div class="box_title">ĐĂNG KÝ TÀI KHOẢN</div>
<div class="row mb dangky">
    <div class="box_content form_account boxleft">
        <form action="index.php?act=dangky" method="POST">
            <label>Email</label>
            <input type="email" name="email">
            <label>Tên đăng nhập</label>
            <input type="text" name="user">
            <label>Mật khẩu</label>
            <input type="password" name="pass">
            <input type="submit" name="dangky" value="ĐĂNG KÝ">
            <input type="reset" value="NHẬP LẠI">
        </form>
        <?php
            if(isset($thongbao) &&$thongbao!=""){
                echo $thongbao;
            }
        ?>
    </div>
    <?php include "view/boxright.php"?>
</div>

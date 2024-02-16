<div class="box_title">QUÊN MẬT KHẨU</div>
<div class="row mb dangky">
    <div class="box_content form_account boxleft">
        <form action="index.php?act=quenmk" method="POST">
            <label>Email</label>
            <input type="email" name="email">
            <input type="submit" name="guimk" value="Gửi">
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

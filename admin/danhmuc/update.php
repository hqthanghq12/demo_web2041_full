<?php
    if(is_array($dm)){
        extract($dm);
    }
?>

<div class="row2">
    <div class="row2 font_title">
        <h1>CẬP NHẬT CÁC LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=updatedm" method="POST">
            <div class="row2 mb10 form_content_container">
                <label> Mã loại </label> <br>
                <input type="text" name="maloai" disabled value="<?php echo $id ?>">
            </div>
            <div class="row2 mb10">
                <label>Tên loại </label> <br>
                <input type="text" name="tenloai" value="<?php echo $name ?>">
            </div>
            <div class="row mb10 ">
                <input type="hidden" name="id_dm" value="<?php if(isset($id) && $id >0) echo $id;?>">
                <input class="mr20" type="submit" name="capnhat" value="CẬP NHẬT">
                <input class="mr20" type="reset" value="NHẬP LẠI">                
                <a href="index.php?act=danh_muc"><input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
            <?php
                if(isset($thongbao)&&$thongbao!=""){
                    echo $thongbao;
                }
            ?>
        </form>
    </div>
</div>
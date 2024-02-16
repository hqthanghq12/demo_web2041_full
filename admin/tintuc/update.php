<?php
if (is_array($tintuc)) {
    extract($tintuc);
}
$hinh_anh_path = "../uploads/" . $hinh_anh;
if (is_file($hinh_anh_path)) {
    $hinh = "<img src='$hinh_anh_path' height='80' width='80'>";
} else {
    $hinh = " không có hình";
}
?>
<div class="row2">
    <div class="row2 font_title">
        <h1>SỬA MỚI TIN TỨC</h1>
    </div>
    <div>
        <ul>
            <?php if(isset($_SESSION['errors'])){
                foreach ($_SESSION['errors'] as $er){
                    ?>
                    <li style="color: red"><?php echo $er;?></li>
                    <?php
                }
            } ?>
        </ul>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=updatetintuc" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <label>Danh mục</label>
                <select name="iddm" >
                    <?php
                    foreach($listdmtintuc as $dm){
                        extract($dm);
                       $e = $id_danhmuc == $id_danh_muc ? "selected" : "";
                        echo "<option value =".$id_danhmuc." $e>$ten_danhmuc</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="row2 mb10">
                <label>Tiêu đề </label> <br>
                <input type="text" value="<?php echo $tieu_de?>" name="tieu_de" >
            </div>

            <div class="row2 mb10">
                <label>Nội dung </label> <br>
                <input type="text" value="<?php echo $noi_dung?>" name="noi_dung" >
            </div>

            <div class="row2 mb10">
                <label>Hình ảnh </label> <br>
                <input type="file" name="hinh_anh" >
                <?php echo $hinh ?>
            </div>
            <div class="row mb10 ">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input class="mr20" type="submit" name="capnhat_tt" value="Cập nhập">
                <input class="mr20" type="reset" value="Nhập lại">
                <a href="index.php?act=listtintuc"><input class="mr20" type="button" value="Danh sách"></a>
            </div>
            <?php
            if(isset($thongbao) && $thongbao!=""){
                echo $thongbao;
            }
            ?>
        </form>
    </div>
</div>
<?php
if (is_array($sanpham)) {
    extract($sanpham);
}
$hinh_anh_path = "../uploads/" . $img;
if (is_file($hinh_anh_path)) {
    $hinh = "<img src='$hinh_anh_path' height='80' width='80'>";
} else {
    $hinh = " không có hình";
}
?>

<div class="row2">
    <div class="row2 font_title">
        <h1>CẬP NHẬT SẢN PHẨM</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <select name="iddm">
                    <option value="0">Tất cả</option>
                    <?php
                    foreach ($listdanhmuc as $dm) {
                        if($iddm==$dm['id']) $s="selected"; else $s="";
                        echo '<option value="'.$dm['id'].'"'.$s.'>'.$dm['name'].'</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="row2 mb10">
                <label>Tên sản phẩm </label> <br>
                <input type="text" name="tensp" value="<?php echo $sanpham['name']?>">
            </div>

            <div class="row2 mb10">
                <label>Giá </label> <br>
                <input type="text" name="giasp" value="<?php echo $sanpham['price'] ?>">
            </div>

            <div class="row2 mb10">
                <label>Hình ảnh </label> <br>
                <input type="file" name="hinh">
                <?php echo $hinh ?>
            </div>

            <div class="row2 mb10">
                <label>Mô tả </label> <br>
                <input type="text" name="mota" value="<?php echo $sanpham['mota'] ?>">
            </div>

            <div class="row mb10 ">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input class="mr20" type="submit" name="capnhat_sp" value="Cập nhật">
                <input class="mr20" type="reset" value="Nhập lại">
                <a href="index.php?act=san_pham"><input class="mr20" type="button" value="Danh sách"></a>
            </div>
            <?php
            if (isset($thongbao) && $thongbao != "") {
                echo $thongbao;
            }
            ?>
        </form>
    </div>
</div>
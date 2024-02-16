<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM MỚI TIN TỨC</h1>
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
        <form action="index.php?act=addtintuc" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <label>Danh mục</label>
                <select name="iddm" >
                    <?php
                    foreach($listdmtintuc as $dm){
                        extract($dm);
                        echo "<option value =$id_danhmuc>$ten_danhmuc</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="row2 mb10">
                <label>Tiêu đề </label> <br>
                <input type="text" name="tieu_de" >
            </div>

            <div class="row2 mb10">
                <label>Nội dung </label> <br>
                <input type="text" name="noi_dung" >
            </div>

            <div class="row2 mb10">
                <label>Hình ảnh </label> <br>
                <input type="file" name="hinh_anh" >
            </div>
            <div class="row mb10 ">
                <input class="mr20" type="submit" name="themmoi" value="Thêm mới">
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
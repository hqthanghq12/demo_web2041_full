<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM MỚI HÀNG HÓA</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <label>Danh mục</label>
                <select name="iddm" >
                    <?php
                        foreach($listdanhmuc as $dm){
                            extract($dm);
                            echo "<option value =$id>$name</option>";
                        }
                    ?>
                </select>
                <label> Mã sản phẩm </label> <br>
                <input type="text" name="masp" placeholder="nhập vào mã sản phẩm" disabled>
            </div>

            <div class="row2 mb10">
                <label>Tên sản phẩm </label> <br>
                <input type="text" name="tensp" >
            </div>

            <div class="row2 mb10">
                <label>Giá </label> <br>
                <input type="text" name="giasp" >
            </div>

            <div class="row2 mb10">
                <label>Hình ảnh </label> <br>
                <input type="file" name="hinh" >
            </div>

            <div class="row2 mb10">
                <label>Mô tả </label> <br>
                <input type="text" name="mota" >
            </div>
            <div class="row mb10 ">
                <input class="mr20" type="submit" name="themmoi" value="Thêm mới">
                <input class="mr20" type="reset" value="Nhập lại">
                <a href="index.php?act=listsp"><input class="mr20" type="button" value="Danh sách"></a>
            </div>
            <?php 
                if(isset($thongbao) && $thongbao!=""){
                    echo $thongbao;
                }
            ?>
        </form>
    </div>
</div>
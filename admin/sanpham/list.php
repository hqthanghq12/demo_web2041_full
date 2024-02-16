<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
    <form action="index.php?act=listsp" method="post">
        <input type="text" name="keyword" placeholder="Nhập tên/id danh mục">
        <select name="iddm" id="">
            <option value="0" selected>Tất cả</option>
            <?php
            foreach ($listdanhmuc as $dm) {
                extract($dm);
                echo "<option value =$id>$name</option>";
            }
            ?>
        </select>
        <input type="submit" name="listok" value="Lọc">
    </form>
    <div class="row2 form_content">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">

                <table>
                    <tr>
                        <th></th>
                        <th>MÃ SẢN PHẨM</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>HÌNH ẢNH</th>
                        <th>GIÁ</th>
                        <th>MÔ TẢ</th>
                        <th>LƯỢT XEM</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($listsanpham as $sanpham) {
                        extract($sanpham);
                        $suasp = "index.php?act=suasp&id=" . $id;
                        $xoasp = "index.php?act=xoasp&id=" . $id;
                        $hinh_anh_path = "../uploads/" . $img;
                        if (is_file($hinh_anh_path)) {
                            $hinh = "<img src='$hinh_anh_path' height='80' width='80'>";
                        } else {
                            $hinh = " không có hình";
                        }
                        echo '<tr>
              <td><input type="checkbox" name="" id="" /></td>
              <td>' . $id . '</td>
              <td>' . $name . '</td>
              <td>' . $hinh . '</td>
              <td>' . $price . '</td>
              <td>' . $mota . '</td>
              <td>' . $luotxem . '</td>
              <td>
                <a href="' . $suasp . '"><input type="button" value="Sửa" /></a>
                <a href="' . $xoasp . '"><input type="button" value="Xóa" /></a>
              </td>
            </tr>';
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10">
                <input class="mr20" type="button" value="CHỌN TẤT CẢ" />
                <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ" />
                <a href="index.php?act=addsp">
                    <input class="mr20" type="button" value="NHẬP THÊM" /></a>
            </div>
        </form>
    </div>
</div>
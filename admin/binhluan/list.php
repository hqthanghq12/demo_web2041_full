<?php
$loadbl = loadbl_binhluan(0);
?>
<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH BÌNH LUẬN</h1>
    </div>
    <div class="row2 form_content">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Nội dung</th>
                        <th>ID user</th>
                        <th>IDpro</th>
                        <th>Ngày bình luận</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($listbinhluan as $binhluan) {
                        extract($binhluan);
                        $xoa_bl = "index.php?act=xoa_bl&id=" . $id;
                        echo '<tr>
                <td><input type="checkbox" name="" id="" /></td>
                    <td>' . $id . '</td>
                    <td>' . $noidung . '</td>
                    <td>' . $iduser . '</td>
                    <td>' . $idpro . '</td>
                    <td>' . $ngaybinhluan . '</td>
                <td>
                    <a href="' . $xoa_bl . '"><input type="button" value="Xóa" /></a>
                </td>
            </tr>';
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10">
                <input class="mr20" type="button" value="CHỌN TẤT CẢ" />
                <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ" />
            </div>
        </form>
    </div>
</div>
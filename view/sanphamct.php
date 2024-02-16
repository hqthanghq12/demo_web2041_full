<main class="catalog  mb ">
    <div class="boxleft">
        <div class="mb">
            <div class="box_title">
                <?php extract($onesp);
                echo $name ?>
            </div>
            <div class="box_content">
                <?php
                $hinh = $img_path . $img;
                echo '<div class="spct"><img src="' . $hinh . '" width="400" height="400" ></div><br>';
                echo $mota;
                ?>
            </div>
        </div>
        <div class="mb">
            <div class="box_title">BÌNH LUẬN</div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script>
                $(document).ready(function () {

                    $("#binhluan").load("view/binhluan/binhluanform.php", {
                        idpro: <?= $id ?>
                    });
                });
            </script>

            <!-- card bình luận -->
            <div class="card" id="binhluan">

            </div>
        </div>
        <div class=" mb">
            <div class="box_title">SẢN PHẨM CÙNG LOẠI</div>
            <div class="box_content">
                <?php
                foreach ($sp_cung_loai as $sp_cung_loai) {
                    extract($sp_cung_loai);
                    $linksp = "index.php?act=sanphamct&id=" . $id;
                    echo '<li><a href="' . $linksp . '">' . $name . '</a></li>';
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    include "view/boxright.php";
    ?>

</main>
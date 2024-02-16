<main class="catalog  mb ">

    <div class="boxleft">
        <div class=" mb">
            <div class="box_title">SẢN PHẨM</div>
            <div class="box_content items">
                <?php
                $i = 0;

                foreach ($dssp as $dssp) {
                    extract($dssp);
                    $linksp = "index.php?act=sanphamct&id=" . $id;
                    if (($i == 2) || ($i == 5) || ($i == 8)) {
                        $mr = "";
                    } else {
                        $mr = "mr";
                    }
                    $hinh = $img_path . $img;
                    echo '<div class="box_items ' . $mr . '">
                        <div class="box_items_img">
                        <div><a class="item_name" href="' . $linksp . '"><img src="' . $hinh . '" alt=""></a></div>
                            <div class="add" href="">ADD TO CART</div>
                        </div>
                        <p class="price">' . $price . '</p>
                        <a class="item_name" href="' . $linksp . '">' . $name . '</a>
                    </div>';
                    $i += 1;
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    include "view/boxright.php";
    ?>

</main>
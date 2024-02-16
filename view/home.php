<main class="catalog  mb ">
    <div class="boxleft">
        <div class="banner">
            <img id="banner" src="img/anh0.jpg" alt="">
            <button class="pre" onclick="pre()">&#10094;</button>
            <button class="next" onclick="next()">&#10095;</button>
        </div>
        <div class="items">
            <?php
            $i = 0;
            foreach ($spnew as $sp) {
                if (($i == 2) || ($i == 5) || ($i == 8)) {
                    $mr = "";
                } else {
                    $mr = "mr";
                }
                extract($sp);
                $linksp = "index.php?act=sanphamct&id=" . $id;
                $hinh = $img_path . $img;
                echo '<div class="box_items ' . $mr . '">
                    <div class="box_items_img">
                        <a class="item_name" href="'.$linksp.'"><img src="' . $hinh . '" alt=""></a>
                        <div class="add"><a href="#">ADD TO CART</a></div>
                    </div>
                    <a class="item_name" href="">' . $name . '</a>
                    <p class="price">' . $price . '</p>
                    </div>';
                $i += 1;
            }
            ?>
        </div>
    </div>
        <?php include "view/boxright.php"?>
</main>
<!-- BANNER 2 -->
<div class="row mb ">
    <div class="boxleft mr">
        <div class="row mb">
            <div class="boxtitle">SẢN PHẨM <strong>
                    <?= $tendm ?>
                </strong></div>
            <div class="boxcontent row">
                <?php
                $i = 0;
                foreach ($dssp as $sp) {
                    extract($sp);
                    $linksp = "index.php?act=sanpham&iddm=" . $iddm;
                    $hinh = $hinhpath . $img;
                    if (($i == 2) || ($i == 5) || ($i == 8) || ($i == 11)) {
                        $mr = "";
                    } else {
                        $mr = "mr";
                    }
                    echo '<div class="boxsp ' . $mr . '">
                      <div class=" row img anhsp"><a href="' . $linksp . '">
                          <img src="' . $hinh . '" alt="">
                          </a></div>
                      <p>' . $gia . '</p>
                      <a href="' . $linksp . '">' . $name . '</a>
                  </div>';
                    $i += 1;
                }

                ?>
            </div>
        </div>


    </div>
    <div class="boxright">
        <?php
        include "boxright.php";
        ?>
    </div>
</div>
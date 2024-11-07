<?php
// print_r($chi_tiet_san_pham);
extract($productDetail);
// print_r($productDetail);
$showImage = !empty($hinh_anh) ? $imagePath . $hinh_anh : './uploads/noavatar.jpg';
// Làm tròn tiền tiết kiệm
$saveMoney = round($price / 1000);
// formatCurrency
$formatCurrencyPrice = formatCurrency($price);
// print_r($_SESSION['login']);
$trung_binh_danh_gia = trung_binh_danh_gia($_GET['id']);

?>

<main class="page-container">
    <div class="page-wrapper">
        <div class="breadcrumb">
            <ul class="breadcrumb-list">
                <li class=""><a href="index.php">Cooky</a></li>
                <li class="breadcrumb-item"><a href="#"><?= $categoryDetail['ten_danh_muc'] ?></a></li>
                <li class=""><span><?= $ten_san_pham ?></span></li>
            </ul>
        </div>
        <div class="product-detail-container">
            <div class="product-common">
                <div class="photo-container">
                    <div class="photo-box">
                        <div class="main-photo">
                            <div class="avaBox">
                                <img src="<?= $showImage ?>" width="100%" class="img-fit" loading="lazy"
                                    alt="<?= $ten_san_pham ?>">
                            </div>
                        </div>
                        <div class="side">
                            <div class="side-item is-main">
                                <img class="img-fit" src="<?= $showImage ?>">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="package-info">
                    <div class="basic-info-box">
                        <h1 class="name text-center fs-4"><?= $ten_san_pham ?></h1>
                        <div class="price-x mt-2">
                            <div class="price d-flex justify-content-between">
                                <?php
                                echo '
                                    <div><span class="h4 fw-bold" id="price">Giá : ' . $formatCurrencyPrice . ' </span> </div>';
                                ?>
                                <?php if (!empty($trung_binh_danh_gia)): ?>
                                    <div title="<?= $trung_binh_danh_gia['tong_danh_gia'] ?> đánh giá">
                                        <?php for ($i = 0; $i < 5; $i++):
                                            if ($i < round($trung_binh_danh_gia['trung_binh_danh_gia'])): ?>
                                                <span class="text-warning" style="font-size:10px"><i
                                                        class="fa-solid fa-star"></i></span>
                                            <?php else: ?>
                                                <span style="font-size:10px"><i class="fa-regular fa-star"></i></span>
                                            <?php endif;
                                        endfor ?>
                                    </div>
                                <?php else: ?>
                                    <div title="0 đánh giá">
                                        <?php for ($i = 0; $i < 5; $i++): ?>
                                            <span style="font-size:10px"><i class="fa-regular fa-star"></i></span>
                                        <?php endfor ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="extra-info-box">
                        <div class="display-flex btn-cart-box">
                            <form action="index.php?act=add-to-cart" method="POST">
                                <input type="hidden" name="id_san_pham" value="<?= $id_san_pham ?>"/>
                                <input type="hidden" name="id_khach_hang" value="<?php if (isset($_SESSION['login'])) {
                                    echo $_SESSION['login']['id_khach_hang'];
                                }
                                 ?>" />
                                <span class="mt-4">Khẩu phần :</span><br>
                                <?php foreach ($khau_phan as $value): ?>
                                    <label>
                                        <input type="radio" name="id_khau_phan" class="id_khau_phan" value="<?php
                                        $found = false;
                                        foreach ($chi_tiet_san_pham as $san_pham) {
                                            if($san_pham['display_detail_san_pham'] == 0){
                                                continue;
                                            }
                                            if ($san_pham['id_khau_phan'] == $value['id_khau_phan']) {
                                                echo $san_pham['id_khau_phan'];
                                                $found = true;
                                                break;
                                            }
                                        }
                                        if (!$found) {
                                            echo "";
                                        }
                                        ?>">
                                        <span class=""><?php echo $value['khau_phan']; ?></span>
                                    </label>
                                <?php endforeach; ?>

                                <br>
                                <script>
                                    document.querySelectorAll('.id_khau_phan[type="radio"]').forEach(function (radio) {
                                        radio.addEventListener('click', function () {
                                            if (this.value === "") {
                                                alert('Sản phẩm đã hết khẩu phần này!');
                                            }
                                        });
                                    });
                                </script>
                                <span>Đồ ăn thêm(chọn 1):</span> <br>
                                <?php foreach ($do_an_them as $value): ?>
                                    <label>
                                        <input type="radio" name="id_do_an_them" class="id_do_an_them" value="<?php
                                        $found = false;
                                        foreach ($chi_tiet_san_pham as $san_pham) {
                                            if($san_pham['display_detail_san_pham'] == 0){
                                                continue;
                                            }
                                            if ($san_pham['id_do_an_them'] == $value['id_do_an_them']) {
                                                echo $san_pham['id_do_an_them'];
                                                $found = true;
                                                break;
                                            }
                                        }
                                        if (!$found) {
                                            echo "";
                                        }
                                        ?>">
                                        <span><?php echo $value['do_an_them']; ?></span>
                                    </label>
                                <?php endforeach; ?>
                                <br>
                                <script>
                                    document.querySelectorAll('.id_do_an_them[type="radio"]').forEach(function (radio) {
                                        radio.addEventListener('click', function () {
                                            if (this.value === "") {
                                                alert('Sản phẩm đã hết đồ ăn thêm này!');
                                            }
                                        });
                                    });
                                </script> <br>
                                <div style="width: 123%;" class="text-end">
                                    <input class="text-white border rounded" type="submit" value="Thêm vào giỏ hàng"
                                        name="add-to-cart" class="border rounded"
                                        style="height:54px ;width: 60%; background-color: #0a8dd8;">
                                    </input>
                                </div>
                            </form>

                        </div>
                        <div class="promo-desc-box"><i class="fa-solid fa-pen-to-square"></i>
                            <div>Ưu đãi áp dụng cho đơn hàng
                                - Người dùng mới
                                - Tối thiểu 300k
                                - Tối đa 1 phần
                            </div>
                        </div>

                        <div class="brand-info-box">
                            <div class="brand-info-item">
                                <div class="brand-into-title">Danh mục</div>
                                <div class="brand-into-content"><?= $categoryDetail['ten_danh_muc'] ?></div>
                            </div>
                            <div class="brand-info-item" style="position: relative;">
                                <div class="brand-into-title">Thương hiệu</div>
                                <div class="brand-into-content"><a href="https://cooky.vn/brand/ozzy-fresh-123">Ozzy
                                        Fresh</a></div>
                            </div>
                            <div class="brand-info-item">
                                <div class="brand-into-title">Xuất xứ</div>
                                <div class="brand-into-content">Việt Nam</div>
                            </div>
                        </div>
                        <div class="overview"><label class="title"><b>Thành phần</b></label>
                            <div class="container">
                                <span class="fw-semibold fs-6">Có sẵn:</span>
                                <div class="option">- <?= $mo_ta ?> </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Comment box -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script>
                $(document).ready(function () {
                    $("#comment").load("view/comment-form.php", {
                        id_product: <?= $id ?>,
                        // Convert array to json
                        list_comment: <?= json_encode($list_comment) ?>
                    });
                });
            </script>
            <div id="comment">
                <?php include('./view/san-pham/binh-luan-danh-gia.php'); ?>
            </div>
            <!-- Product related -->
            <div class="group-product-content">
                <div class="title">Sản phẩm liên quan</div>
                <div class="content-product-container">
                    <div class="promotion-box">
                        <?php
                        foreach ($productRelated as $product) {
                            $linkProduct = "index.php?act=product-detail&id=" . $product['id_san_pham'];
                            $showImageRelated = !empty($product['hinh_anh']) ? $imagePath . $product['hinh_anh'] : './uploads/noavatar.jpg';

                            $formatCurrencyPriceRelated = formatCurrency($product['price']);
                            echo '
                                <div class="product-basic-info">
                                    <a class="link-absolute" title="' . $product['ten_san_pham'] . '" href="' . $linkProduct . '"></a>
                                    <div class="cover-box">
                                        <div class="promotion-photo">
                                            <div class="package-default">
                                                <img src="' . $showImageRelated . '" alt="' . $product['ten_san_pham'] . '" loading="lazy" class="img-fit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="promotion-name two-lines ">' . $product['ten_san_pham'] . '</div>
                                    <div class="product-weight">' . $product['ten_danh_muc'] . '</div>
                                    <div class="d-flex justify-content-end">
                                        <div class="price-action">
                                            <div class="d-flex-align-items-baseline">
                                            <div class="sale-price ">' . $formatCurrencyPriceRelated . '</div>';
                            echo '
                                            </div>
                                        </div>
                                        <div class="button-add-to-cart" title="Thêm vào giỏ hàng">
                                            <div>
                                            <i class="fa-solid fa-circle-info"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<?php
if (isset($_GET['thongbao']) && $_GET['thongbao'] == "error") {
    displayToastrMessageError("Combo khẩu phần và đồ ăn thêm này đã hết!");
}
if (isset($_GET['thongbao']) && ($_GET['thongbao'] == "success")) {
    if(isset($_SESSION['login'])){
        displayToastrMessageSuccess("Thêm vào giỏ hàng thành công!");
    } 
    else {
        displayToastrMessageWarning("Bạn cần đăng nhập để sử dụng giỏ hàng !");
    }
}
?>
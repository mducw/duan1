<main class="page-container">
    <div class="page-wrapper">
        <div class="home-page-container">
            <!-- Product List by search -->
            <div class="group-product-content">
                <div class="title">✨ Sản phẩm theo từ khóa ✨&nbsp;<small class="total-product">(Tìm thấy <b><?= count($productList) ?></b> kết quả với từ khóa '<span class="font-weight-bold"><?= $key ?></span>')</small></div>
                <div class="content-product-container">
                    <div class="promotion-box">
                        <?php
                        $productListLength = count($productList);
                        if ($productListLength == 0) {
                            echo '<div class="no-data-image">
                            <img src="./uploads/noavatar.jpg" width="505px" alt="No data" />
                            </div>';
                        } else {
                            foreach ($productList as $product) {
                                $linkProduct = "index.php?act=product-detail&id=" . $product['id_san_pham'];
                                $showImage = !empty($product['hinh_anh']) ? $imagePath . $product['hinh_anh'] : './uploads/noavatar.jpg';
                                $formatCurrencyPrice = formatCurrency($product['price']);

                                echo '
                                      <div class="product-basic-info">
                                    <a class="link-absolute" title="' . $product['ten_san_pham'] . '" href="' . $linkProduct . '"></a>
                                    <div class="cover-box">
                                        <div class="promotion-photo">
                                            <div class="package-default">
                                                <img src="' . $showImage . '" alt="' . $product['ten_san_pham'] . '" loading="lazy" class="img-fit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="promotion-name two-lines ">' . $product['ten_san_pham'] . '</div>
                                    <div class="product-weight">'.$product['ten_danh_muc'].'</div>
                                    <div class="d-flex justify-content-end">
                                        <div class="price-action">
                                            <div class="d-flex-align-items-baseline">
                                            <div class="sale-price ">' . $formatCurrencyPrice . '</div>';
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
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php include('./view/san-pham/san-pham-yeu-thich.php')?>
        </div>
    </div>
</main>

<!-- Món ăn yêu thích theo view -->
<div class="group-product-content">
                <div class="title">❤️️ Món ăn yêu thích ❤️️</div>
                <div class="content-product-container">
                    <div class="promotion-box">
                        <?php
                        foreach ($san_pham_yeu_thich as $product) {
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
                        ?>
                    </div>
                </div>
            </div>

<main class="page-container">
    <div class="page-wrapper">
        <div class="home-page-container">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="2000">
                        <img src="./assets/images/3b913681-79ef-49e5-afca-502686632208.png" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="./assets/images/600d94ae-f782-43ad-9c7a-e6c60f78ade5.png" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="./assets/images/bd6d53fa-c2e0-41ea-8549-804612e47770.png" class="d-block w-100"
                            alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="short-link-list">
                <div class="swiper-container swiper-container-pointer-events">
                    <div class="swiper-wrapper">
                        <div class="category-slider">
                            <?php
                            foreach ($listdanhmuc as $danhmuc) {
                                extract($danhmuc);
                                $showImage = !empty($anh_danh_muc) ? "uploads/" . $anh_danh_muc : './uploads/noavatar.jpg';
                                $linkCategory = "index.php?act=product&category_id=" . $id_danh_muc;
                                echo '<div class="category-item">
                                        <div class="icon">
                                            <a href="' . $linkCategory . '">
                                                <img class="img-fit" src="' . $showImage . '" alt="' . $anh_danh_muc . '">
                                            </a>
                                        </div>
                                        <div class="label text-ellipsis-two-lines">' . $ten_danh_muc . '</div>
                                    </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Món ăn yêu thích theo lượt xem -->
            <div class="group-product-content">
                <div class="title">🔥 Món Hot 🔥</div>
                <div class="content-product-container">
                    <div class="promotion-box">
                        <?php
                        foreach ($topViewProductList as $product) {
                            extract($product);
                            $linkProduct = "index.php?act=product-detail&id=" . $id_san_pham;
                            $showImage = !empty($hinh_anh) ? $imagePath . $hinh_anh : './uploads/noavatar.jpg';
                            $formatCurrencyPrice = formatCurrency($price);
                            echo '
                                <div class="product-basic-info">
                                    <a class="link-absolute" title="' . $ten_san_pham . '" href="' . $linkProduct . '"></a>
                                    <div class="cover-box">
                                        <div class="promotion-photo">
                                            <div class="package-default">
                                                <img src="' . $showImage . '" alt="' . $ten_san_pham . '" loading="lazy" class="img-fit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="promotion-name two-lines ">' . $ten_san_pham . '</div>
                                    <div class="product-weight">' . $ten_danh_muc . '</div>
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
             <!-- Món ăn yêu thích theo lượt xem -->
             <div class="group-product-content">
                <div class="title">❤️️ Món ăn yêu thích ❤️️</div>
                <div class="content-product-container">
                    <div class="promotion-box">
                        <?php
                        foreach ($san_pham_yeu_thich as $product) {
                            extract($product);
                            $linkProduct = "index.php?act=product-detail&id=" . $id_san_pham;
                            $showImage = !empty($hinh_anh) ? $imagePath . $hinh_anh : './uploads/noavatar.jpg';
                            $formatCurrencyPrice = formatCurrency($price);
                            echo '
                                <div class="product-basic-info">
                                    <a class="link-absolute" title="' . $ten_san_pham . '" href="' . $linkProduct . '"></a>
                                    <div class="cover-box">
                                        <div class="promotion-photo">
                                            <div class="package-default">
                                                <img src="' . $showImage . '" alt="' . $ten_san_pham . '" loading="lazy" class="img-fit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="promotion-name two-lines ">' . $ten_san_pham . '</div>
                                    <div class="product-weight">' . $ten_danh_muc . '</div>
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
            <!-- Sản phẩm mới nhất -->
            <div class="group-product-content">
                <div class="title">✨ Món ăn mới nhất ✨</div>
                <div class="content-product-container">
                    <div class="promotion-box">
                        <?php
                        foreach ($newProductList as $product) {
                            extract($product);
                            $linkProduct = "index.php?act=product-detail&id=" . $id_san_pham;
                            $showImage = !empty($hinh_anh) ? $imagePath . $hinh_anh : './uploads/noavatar.jpg';
                            $formatCurrencyPrice = formatCurrency($price);
                            echo '
                                <div class="product-basic-info">
                                    <a class="link-absolute" title="' . $ten_san_pham . '" href="' . $linkProduct . '"></a>
                                    <div class="cover-box">
                                        <div class="promotion-photo">
                                            <div class="package-default">
                                                <img src="' . $showImage . '" alt="' . $ten_san_pham . '" loading="lazy" class="img-fit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="promotion-name two-lines ">' . $ten_san_pham . '</div>
                                    <div class="product-weight me-2">' . $ten_danh_muc . '</div>
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
           
        </div>
    </div>

</main>
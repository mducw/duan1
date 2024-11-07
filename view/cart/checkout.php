<?php
$ma_giam_gia = select_giam_gia();
?>
<main class="page-container">
    <div class="page-wrapper">
        <div class="home-page-container">
            <h1 class="title-user">Thanh toán</h1>
            <form action="index.php?act=complete" method="POST">
                <div class="checkout-page">
                    <div class="form-container checkout-page-form">
                        <h2 class="title-user">Thông tin giao hàng</h2>
                        <?php
                        $ho_ten = isset($_SESSION['login']['ho_ten']) ? $_SESSION['login']['ho_ten'] : "";
                        $email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : "";
                        $dia_chi = isset($_SESSION['login']['dia_chi']) ? $_SESSION['login']['dia_chi'] : "";
                        $phone = isset($_SESSION['login']['phone']) ? $_SESSION['login']['phone'] : "";
                        $tong_so_luong = implode(sum_so_luong_gio_hang($id_khach_hang));
                        // echo $tong_so_luong;
                        ?>
                        <form action="index.php?act=profile-edit" class="form" method="POST">
                            <input type="hidden" name="id" value="<?= $id ?>" />
                            <div class="row">
                                <input class="input" type="text" name="ho_ten" id="ho_ten" placeholder="Họ tên"
                                    value="<?= $ho_ten ?>" />
                            </div>
                            <div class="row">
                                <input class="input" type="email" name="email" id="email" placeholder="Email"
                                    value="<?= $email ?>" />
                            </div>
                            <div class="row">
                                <input class="input" type="text" name="dia_chi_giao" id="dia_chi"
                                    placeholder="Địa chỉ chi tiết" value="<?= $dia_chi ?>" />
                            </div>
                            <div class="row">
                                <input class="input" type="text" name="phone" id="phone" placeholder="Số điện thoại"
                                    value="<?= $phone ?>" />
                            </div>
                            <div class="row">
                                <textarea class="input" name="note" id="note" cols="30" rows="10"
                                    placeholder="Ghi chú (ví dụ như số nhà, địa chỉ cụ thể..)"></textarea>
                            </div>
                        </form>
                        <h2 class="title-user title-pay-method">Phương thức thanh toán</h2>
                        <div class="radio-list">
                            <div class="radio-item">
                                <input type="radio" name="payment_method" id="pay-method-1" value="1" checked>
                                <label for="pay-method-1">Thanh toán khi nhận hàng (COD)</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" name="payment_method" id="pay-method-2" value="2">
                                <label for="pay-method-2">Thanh toán trực tuyến</label>
                            </div>
                        </div>
                    </div>
                    <div class="order-form">
                        <h2 class="title-user order-title">Đơn hàng của bạn</h2>
                        <div class="grand-total order-content">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title">Tổng số giỏ hàng: <?= $tong_so_luong ?></h4>
                            </div>
                            <h5>Món ăn của bạn 💝</h5>
                            <?php
                            $totalAllCart = 0;
                            $totalPayPriceOriginal = 0;
                            $formatTotalAllCart = 0;
                            $tong = 0;
                            ?>
                            <?php foreach ($gio_hang_all as $gio_hang):
                                extract($gio_hang);
                                // print_r($gio_hang);
                                $showImage = $imagePath . $hinh_anh;
                                // Format money
                                $formatPrice = formatCurrency($don_gia);
                                $totalPrice = $don_gia * $so_luong;
                                $formatTotalMoney = formatCurrency($totalPrice);
                                $tong += $totalPrice;
                                $formatTotalAllCart = formatCurrency($tong);
                                $tong_tien = 0;

                                ?>
                                <div class="item-cart-product">
                                    <div class="item-image-order">
                                        <img src="<?= $showImage ?>" alt="Sản phẩm giỏ hàng" width="40px" height="40px">
                                    </div>
                                    <div class="item-name-order">
                                        <p><?= $ten_san_pham ?></p>
                                        <p style="font-size: 10px;"><?= $khau_phan ?> & <?= $do_an_them ?> </p>
                                    </div>
                                    <div class="item-quantity-order">x<?= $so_luong ?></div>
                                    <div class="item-price-order">
                                        <span><?= $formatPrice ?></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id_chi_tiet_san_pham[]"
                                    value="<?= htmlspecialchars($gio_hang['id_chi_tiet_san_pham']) ?>">
                                <input type="hidden" name="so_luong[]"
                                    value="<?= htmlspecialchars($gio_hang['so_luong']) ?>">

                            <?php endforeach; ?>
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Mã giảm giá
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <ul class="list-group">
                                            <?php foreach ($ma_giam_gia as $giam_gia): ?>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <div class="">
                                                        <img src="./assets/images/sale.png" style="height: 40px;" alt="">
                                                        <?= $giam_gia['giam_gia'] ?>%
                                                    </div>
                                                    <form method="POST">
                                                        <?php if (isset($giam_gia['ngay_het_han']) && $giam_gia['ngay_het_han'] < date('Y-m-d')): ?>
                                                            <input type="hidden" name="id_ma_giam_gia1" value="">
                                                            <input type="hidden" name="selected_giam_gia"
                                                                value="<?= $giam_gia['giam_gia'] ?>">
                                                            <div class="bg-danger border text-center rounded-pill"
                                                                style="width: 62px; height:22px">
                                                                <p style="font-size: 12px; color:white;">Hết hạn</p>
                                                            </div>
                                                        <?php elseif (isset($giam_gia['display_gg']) && $giam_gia['display_gg'] == 0): ?>
                                                            <input type="hidden" name="id_ma_giam_gia1" value="">
                                                            <input type="hidden" name="selected_giam_gia"
                                                                value="<?= $giam_gia['giam_gia'] ?>">
                                                            <div class="bg-warning border text-center rounded-pill"
                                                                style="width: 62px; height:22px">
                                                                <p style="font-size: 12px; color:white;">Đã hết</p>
                                                            </div>
                                                        <?php else: ?>
                                                            <input type="hidden" name="id_ma_giam_gia1"
                                                                value="<?= $giam_gia['id_ma_giam_gia'] ?>">
                                                            <input type="hidden" name="selected_giam_gia"
                                                                value="<?= $giam_gia['giam_gia'] ?>">
                                                            <input type="submit" style="font-size: 12px;"
                                                                class="bg-success text-white border rounded-pill"
                                                                name="submit_giam_gia" value="Sử dụng">
                                                        <?php endif; ?>
                                                    </form>

                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <h4 class="grand-total-title mt-3">Tổng cộng:
                                    <span>
                                        <?php
                                        if (isset($_POST['submit_giam_gia']) && isset($_POST['selected_giam_gia'])) {
                                            $id_ma_giam_gia = $_POST['id_ma_giam_gia1'];
                                            $ma_giam_gia = (int) $_POST['selected_giam_gia'] / 100;

                                            if (isset($ma_giam_gia)) {
                                                $tong_giam_gia = $tong * $ma_giam_gia;
                                                $tong_tien = $tong - $tong_giam_gia;
                                                $tong_tien_all = formatCurrency($tong_tien);
                                                echo '
                                            <span class="ms-2">' . $tong_tien_all . '</span> <span class="text-decoration-line-through" style="font-size:15px; color:gray;">' . $formatTotalAllCart . '</span> 
                                            ';
                                            }
                                        } else {
                                            $id_ma_giam_gia = "";
                                            echo $formatTotalAllCart;
                                        }
                                        ?>
                                    </span>
                                </h4>
                                <input type="id_ma_giam_gia" name="id_ma_giam_gia" value="<?= $id_ma_giam_gia ?>"
                                    hidden>
                                <input type="hidden" name="tong_gia_tien" value="<?php if ($tong_tien == 0) {
                                    echo $tong;
                                } else {
                                    echo $tong_tien;
                                }
                                ?>">
                                <input type="submit" value="Tiến hành đặt hàng" class="order-button"
                                    name="agree-to-order" />
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</main>
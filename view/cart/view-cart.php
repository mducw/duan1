<?php
// print_r($gio_hang_all);
?>
<main class="page-container">
    <div class="page-wrapper">
        <div class="home-page-container">
            <?php if (isset($gio_hang_all) && !empty($gio_hang_all)) { ?>
                <div class="title">🧡 Giỏ hàng của bạn 🧡</div>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên món</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Tạm tính</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $totalAllCart = 0;
                        $totalPayPriceOriginal = 0;
                        $formatTotalAllCart = 0;
                        $tong = 0;
                ?>
                  <?php foreach ($gio_hang_all as $gio_hang) :
                            extract($gio_hang);
                            $showImage = $imagePath . $hinh_anh;
                            // Format money
                            $formatPrice = formatCurrency($don_gia);
                            $totalPrice = $don_gia * $so_luong;
                            $formatTotalMoney = formatCurrency($totalPrice);
                            $tong += $totalPrice;
                            $formatTotalAllCart = formatCurrency($tong);
                            $deleteItemCart = '<a title="Xóa" onclick="return confirm(\'Bạn có muốn xóa không?\');" href="index.php?act=delete-cart&id-cart=' . $id_chi_tiet_san_pham . '"><button class="remove-item-cart" value="Xóa khỏi giỏ hàng"><i class="fa-solid fa-trash-can"></i></button></a>';
                            $fixItem = '<a title="Cập nhập" href="index.php?act=fix-cart&id-cart=' . $id_chi_tiet_san_pham . '"><i class="fa-solid fa-wrench"></i></a>';
                    ?>      
                        <tr>
                                <td scope="row">
                                    <img src="<?=$showImage?>" alt="Ảnh sản phẩm" width="100" height="100">
                                </td>
                                <td class="product-name"><strong><?=$ten_san_pham ?></strong> <br>
                                <p style="font-size: 10px;"><?=$khau_phan ?> & <?= $do_an_them ?> </p>
                                </td>
                                <td class="price-product"><?= $formatPrice ?></td>
                                <form action="index.php?act=fix-cart" method="post">
                                <td class="quantity-product">
                                <input type="hidden" name="id_gio_hang" value="<?=$id_gio_hang?>">
                                <?php if($so_luong == 1) {
                                    echo "";
                                }else {
                                    echo '<input type="submit" title="giảm" name="fix_giam" class="border bg-white rounded-start-pill" value="-">';
                                }
                                ?>
                                <?=$so_luong?>
                                <input type="submit" title="tăng" class="border bg-white rounded-end-circle" name="fix_tang" value="+">
                                </form>
                                </td>
                                <td><?= $formatTotalMoney ?></td>
                                <td><?= $deleteItemCart ?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <div class="shopping-cart-wrapper">
                    <div class="continue-shopping">
                        <a href="index.php?act=home">Tiếp tục mua hàng</a>
                    </div>
                    <div class="clear-cart-all">
                        <a onclick="return confirm('Bạn muốn xóa tất cả giỏ hàng ?')" href="index.php?act=delete-cart">Xóa
                            giỏ hàng</a>
                    </div>
                </div>
                <div class="grand-total">
                    <div class="title-wrap">
                        <h4 class="cart-bottom-title">Tổng tiền giỏ hàng</h4>
                    </div>
                    <h4 class="grand-total-title">Tổng cộng: <span><?= $formatTotalAllCart ?></span></h4>
                    <a href="index.php?act=checkout">Đặt hàng</a>
                </div>
            <?php } else { ?>
                <div class="no-cart"><img
                        src="./uploads/giohang.jpg"
                        alt="Hình ảnh giỏ hàng trống">
                    <div class="title">🖤 Giỏ hàng của bạn đang trống 🖤</div>
                    <p>Quay lại <a href="index.php">trang chủ</a> để lựa chọn món ăn</p>
                </div>
            <?php } ?>
        </div>
    </div>
</main>
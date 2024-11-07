<?php
$image = isset($_SESSION['login']['hinh_anh']) ? $imagePath . $_SESSION['login']['hinh_anh'] : "";
$ho_ten = isset($_SESSION['login']['ho_ten']) ? $_SESSION['login']['ho_ten'] : "";
$email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : ""; // Sửa lỗi thiếu biến email
$phone = isset($_SESSION['login']['phone']) ? $_SESSION['login']['phone'] : "";
$dia_chi = isset($_SESSION['login']['dia_chi']) ? $_SESSION['login']['dia_chi'] : "";
$id_khach_hang = $_SESSION['login']['id_khach_hang'];
$id_don_hang = $_GET['id-don-hang'];
$don_hang_all = select_don_hang_by_id($id_khach_hang);
$chi_tiet_don_hang = select_chi_tiet_don_hang($id_don_hang);
$tong_gia_tien = tong_tien($id_don_hang);
?>
<div class="d-flex align-items-center" style="height: 55px; background-color: #f9f9f9;">
    <div class="container">
        <a class="text-decoration-none" href="index.php"><span class="text-black">Cooky</span> </a> /
        <a href="index.php?act=order-history" class="text-decoration-none">
            <span class="text-black">Xem lịch sử đơn hàng</span></a> /
        <span class="text-danger">Chi tiết đơn hàng</span>
    </div>
</div>
<div class="container">
    <div class="row mt-4">
        <div class="col-3 border border-secondary-subtle rounded p-3" style="height: 200px;">
            <div class="d-flex align-items-center">
                <img class="rounded-circle" src="<?= $image ?>" alt="" height="40px">
                <h6 class="ms-2"><?= $_SESSION['login']['ten_dang_nhap'] ?></h6>
            </div>
            <hr class="mt-2">
            <div class="mt-2">
                <div class="d-flex">
                    <span class="fw-bold">Họ tên:</span><span><?= $ho_ten ?></span>
                </div>
                <div class="d-flex">
                    <span class="fw-bold">Email:</span><span><?= $email ?></span> <!-- Sửa lỗi email -->
                </div>
                <div class="d-flex">
                    <span class="fw-bold">Số điện thoại:</span><span><?= $phone ?></span>
                </div>
                <div class="d-flex">
                    <span class="fw-bold">Địa chỉ:</span><span><?= $dia_chi ?></span>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="d-flex justify-content-between">
                <h4>Chi tiết đơn hàng: <?= $id_don_hang ?></h4>
                
                <?php
                $kiem_tra = false;
                $kiem_tra2 = false;
                foreach ($chi_tiet_don_hang as $don_hang) {
                    if ($don_hang['id_trang_thai_don'] == 1) {
                        $kiem_tra = true;
                        break;
                    }
                    if ($don_hang['id_trang_thai_don'] == 7) {
                        $kiem_tra2 = true;
                        break;
                    }
                }
                ?>
                <?php if ($kiem_tra): ?>
                    <a onclick="return confirm('Bạn có muốn hủy đơn hàng này không ?')"
                        href="index.php?act=huy-don-hang&id-don-hang=<?= $id_don_hang ?>" class="btn btn-danger">Hủy đơn
                        hàng</a>
                <?php endif; ?>
                <?php if ($kiem_tra2): ?>
                    <a onclick="return confirm('Bạn có muốn thanh toán đơn hàng này không ?')"
                        href="index.php?act=thanh-toan&id-don-hang=<?= $id_don_hang ?>" class="btn btn-info">Thanh toán</a>
                <?php endif; ?>
            </div>
            <?php foreach ($chi_tiet_don_hang as $chi_tiet):
                extract($chi_tiet);
                $hinh_anh_san_pham = $imagePath . $hinh_anh;
                ?>
                <div class="mt-2">
                    <div class="d-flex p-3" style="background-color: #f3f3f3; height: 130px; width: 100%;">
                        <img src="<?= $hinh_anh_san_pham ?>" alt="" height="80px">
                        <div class="ms-2" style="width: 100%;">
                            <span class="fw-bold fs-6"><?= $ten_san_pham ?></span> <br>
                            <span style="font-size: 13px;">Khẩu phần: <?= $khau_phan ?>, <?= $do_an_them ?></span> <br>
                            <span class="fw-bold">x<?= $so_luong ?></span>
                            <div style="width: 100%;" class="text-end">
                                <?php
                                $tong_tien = $price * $so_luong;
                                ?>
                                <span class="text-danger"><?= formatCurrency($tong_tien) ?></span>
                            </div>
                            <hr class="mt-1">
                        </div>
                    </div>
                    <?php if ($id_trang_thai_don == 5): ?>
                        <div class="d-flex justify-content-end mt-2"><a
                                href="?act=feedback-order&id=<?php echo $id_chi_tiet_don_hang ?>"
                                class="btn btn-outline-danger p-1 ">Viết đánh giá</a>
                        </div>
                    <?php endif ?>
                </div>
            <?php endforeach; ?>
            <div class="mt-2">
                <span class="fw-bold fs-5">Giá tiền thanh toán: <span
                        class="text-danger"><?= formatCurrency($tong_gia_tien) ?></span></span>
            </div>
        </div>
    </div>
</div>
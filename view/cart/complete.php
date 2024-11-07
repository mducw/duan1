<?php
if (isset($_GET['id_don_hang'])) {
    $id_don_hang = $_GET['id_don_hang'];
}
$don_hang = select_don_hang($id_don_hang);
$chi_tiet_don_hang = select_chi_tiet_don_hang($id_don_hang);
// print_r($chi_tiet_don_hang);

$tong_gia_tien = tong_tien($id_don_hang);
extract($don_hang);
delete_gio_hang_all($_SESSION['login']['id_khach_hang']);
if (isset($_GET['status']) && $_GET['status'] == 1) {
    doi_trang_thai_onlline($id_don_hang);
}
?>
<h1 class="title-user">❤️️ Cảm ơn bạn ❤️️</h1>
<p class="content-thanks">Cảm ơn quý khách hàng đã lựa chọn <strong class="refuse">CookyFood</strong> để mua sắm đồ ăn!
    Chúng tôi rất trân trọng sự ủng hộ của quý vị và hy vọng rằng quý vị sẽ thưởng thức những sản phẩm tuyệt vời mà
    chúng tôi cung cấp. Nếu quý vị có bất kỳ câu hỏi hoặc phản hồi nào, xin đừng ngần ngại liên hệ với chúng tôi. Chúng
    tôi luôn sẵn sàng để phục vụ quý vị. Cảm ơn một lần nữa và chúc quý vị có một trải nghiệm mua sắm thú vị cùng
    <strong class="refuse">CookyFood</strong>! Dưới đây là <span class="processing">hóa đơn chi tiết</span> của bạn.❤️️
</p>
<div class="invoice-detail">
    <h1 class="title-user">Hóa đơn chi tiết</h1>
    <div class="form-invoice">
        <table border="1">
            <tr>
                <td colspan="2" class="col-2">Mã đơn: <strong><?= $id_don_hang ?></strong></td>
                <td colspan="2" class="col-2 text-right"><strong>Thời gian đặt:
                        <?= $ngay_tao ?></strong>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="text-center"><img
                        src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1697033902/cooky%20market%20-%20PHP/sri9li0oetshdwb4esa4.jpg"
                        alt="Logo cooky.vn" width="150px" class="logo-cooky">
                    <p class="font-weight-bold"> Thực Phẩm Tươi Sống & Pack Món Nấu Ngay</p>
                    <p>Phố Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội</p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p><strong>Tên khách hàng:</strong>
                        <?= $ho_ten ?></p>
                    <p><strong>Số điện thoại:</strong>
                        <?= $phone ?></p>
                    <p><strong>Địa chỉ:</strong>
                        <?= $dia_chi ?></p>
                    <p><strong>Hình thức thanh toán:</strong>
                        <?= $payment_method == 1 ? 'Thanh toán khi nhận hàng' : 'Thanh toán online' ?></p>
                </td>
            </tr>
            <tr class="text-center">
                <td class="font-weight-bold">STT</td>
                <td class="font-weight-bold">Món ăn</td>
                <td class="font-weight-bold">Số lượng</td>
                <td class="font-weight-bold">Giá</td>
            </tr>
            <?php
            $STT = 0;
            foreach ($chi_tiet_don_hang as $chi_tiet) {
                $STT += 1;
                update_so_luong($chi_tiet['id_chi_tiet_san_pham']);
                $tong_tien = $chi_tiet['price'] * $chi_tiet['so_luong'];
                echo '<tr class="text-center">
                    <td>' . $STT . '</td>
                    <td>' . $chi_tiet['ten_san_pham'] . '</td>
                    <td>' . $chi_tiet['so_luong'] . '</td>
                    <td>' . formatCurrency($tong_tien) . '</td>
                </tr>';
            }
            ?>
            <tr>
                <td colspan="2" class="text-center"><strong>Tổng đơn</strong></td>
                <td colspan="2" class="text-center">
                    <strong><?= formatCurrency($tong_gia_tien['tong_gia_tien']) ?></strong>
                </td>
            </tr>
        </table>
    </div>
    <div class="btn-print-invoice">

        <button class="back-home bg-danger"><a class="text-white" href="index.php">Về trang chủ</a></button>
    </div>
</div>
<canvas id="canvas"></canvas>
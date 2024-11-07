<?php $don_hang_all = loadall_don_hang(); ?>
<div class="main-content">
    <div class="page-content pt-4">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Quản lý đơn hàng</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Quản lý đơn hàng</a>
                                </li>
                                <li class="breadcrumb-item active">Tất cả đơn hàng</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tất cả đơn hàng</h4>

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ giao</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Ghi chú</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($don_hang_all as $value): ?>
                                        <tr>
                                            <td class="text-primary font-weight-normal"><?php echo $value['id_don_hang'] ?>
                                            </td>
                                            <td><?php echo $value['ho_ten'] ?></td>
                                            <td><?php echo $value['phone'] ?></td>
                                            <td><?php echo $value['dia_chi_giao'] ?></td>
                                            <td>
                                                <?php if ($value['id_trang_thai_don'] == 6) {
                                                    echo '<span class="badge badge-pill badge-danger">' .
                                                        $value['ten_trang_thai_don'] . '</span>';
                                                } else if ($value['id_trang_thai_don'] == 5) {
                                                    echo '<span class="badge badge-pill badge-success">' .
                                                        $value['ten_trang_thai_don'] . '</span>';
                                                } else {
                                                    echo '<span class="badge badge-pill badge-info">' .
                                                        $value['ten_trang_thai_don'] . '</span>';
                                                } ?>

                                                <input type="text" hidden value="<?php echo $value['id_trang_thai_don'] ?>"
                                                    name="status_order">
                                            </td>
                                            <td><?php echo $value['ngay_tao'] ?></td>
                                            <td class="text-info">
                                                <?php
                                                if ($value['payment_method'] == 1) {
                                                    echo "Thanh toán khi nhận hàng";
                                                } else {
                                                    echo "Thanh toán onlline";
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $value['note'] ?></td>
                                            <td class="order-btn">
                                                <a href="?act=list-detail-order&id=<?php echo $value['id_don_hang'] ?>"
                                                    class="btn btn-light text-center p-2 " data-toggle="tooltip"
                                                    data-placement="top" title="Xem chi tiết"><i
                                                        class="bx bx-show font-weight-bold"></i></a>
                                                <?php if ($value['id_trang_thai_don'] == 6 || $value['id_trang_thai_don'] == 5): ?>
                                                    <a href="" class="btn btn-light text-center p-2 " data-toggle="tooltip"
                                                        data-placement="top" title="Khóa"> <i class='bx bxs-lock-alt' ></i></a>
                                                <?php else: ?>
                                                    <a href="?act=update-order&id=<?php echo $value['id_don_hang'] ?>"
                                                        class="btn btn-light text-center p-2 " data-toggle="tooltip"
                                                        data-placement="top" title="Chỉnh sửa"> <i
                                                            class="bx bx-pencil font-weight-bold"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- end card-body-->
                    </div>
                </div>
            </div>
            <!-- end page title -->

        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">2024 © Mai Đức Công.</div>
                <div class="col-sm-6">
                    <div class="text-sm-right d-none d-sm-block">
                        Quản lý Website
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
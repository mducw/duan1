<?php $history_mh = don_hang_select_by_user() ?>
<div class="main-content">
    <div class="page-content pt-4">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Quản lý khách hàng</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Quản lý khách hàng</a>
                                </li>
                                <li class="breadcrumb-item active">Lịch sử mua sắm của khách hàng</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Lịch sử mua sắm của khách hàng</h4>

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Họ tên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ giao</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Số lượng</th>
                                        <th>Tổng số tiền</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($history_mh as $value) : ?>
                                        <tr>
                                            <td class="font-weight-bolder text-primary"><?php echo $value['ho_ten'] ?></td>
                                            <td><?php echo $value['email'] ?></td>
                                            <td><?php echo $value['phone'] ?></td>
                                            <td><?php echo $value['dia_chi_giao'] ?></td>
                                            <td><?php echo $value['id_don_hang'] ?></td>
                                            <td><?php echo $value['ngay_tao'] ?></td>
                                            <td><?php echo $value['tong_so_luong'] ?></td>
                                            <td><?php echo $value['tong_gia_tien'] ?>đ</td>
                                            <td>
                                                <a href="?act=detail-history-mh&id=<?php echo $value['id_don_hang'] ?>" class="btn btn-light text-center p-2 " data-toggle="tooltip" data-placement="top" title="Xem chi tiết"><i class="bx bx-show font-weight-bold"></i></a>
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
<?php
$history_dh_home = don_hang_history_home();
$thong_ke_home = don_hang_thong_ke_home();
$tong_don = don_hang_count();
?>
<div class="main-content">
    <div class="page-content pt-4">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Trang chủ</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Admin</a>
                                </li>
                                <li class="breadcrumb-item active">Trang chủ</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <i class="bx bx-layer float-right m-0 h2 text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Đơn đặt hàng</h6>
                            <h3 class="mb-3" data-plugin="counterup">
                                <?php
                                echo $tong_don['don_dat_hang'];
                                ?>
                            </h3>

                        </div>
                    </div>
                </div>
                <?php if (isset($_SESSION['login']['id_roles']) && $_SESSION['login']['id_roles'] == 3): ?>
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <i class="bx bx-dollar-circle float-right m-0 h2 text-muted"></i>
                                <h6 class="text-muted text-uppercase mt-0">Doanh thu</h6>
                                <h3 class="mb-3">
                                    <span
                                        data-plugin="counterup"><?php echo isset($thong_ke_home['total_price']) ? number_format($thong_ke_home['total_price']) : 0 ?></span>
                                    VNĐ
                                </h3>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <i class="bx bx-bx bx-analyse float-right m-0 h2 text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">
                                Giá trung bình
                            </h6>
                            <h3 class="mb-3">
                                <?php
                                $gia_trung_binh = $thong_ke_home['total_price'] / $tong_don['don_dat_hang'];
                                ?>
                                <span
                                    data-plugin="counterup"><?php echo $gia_trung_binh ? number_format($gia_trung_binh) : 0 ?></span>
                                VNĐ
                            </h3>

                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <i class="bx bx-basket float-right m-0 h2 text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">
                                Sản phẩm đã bán
                            </h6>
                            <h3 class="mb-3" data-plugin="counterup">
                                <?php echo isset($thong_ke_home['da_ban']) ? number_format($thong_ke_home['da_ban']) : 0 ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- end row-->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title overflow-hidden">
                                Người mua gần đây
                            </h4>

                            <div class="table-responsive">
                                <table class="table table-centered table-hover table-xl mb-0" id="recent-orders">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Khách hàng</th>
                                            <th class="border-top-0">Sản phẩm</th>
                                            <th class="border-top-0">Thể loại</th>
                                            <th class="border-top-0">Khẩu phần</th>
                                            <th class="border-top-0">Số lượng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($history_dh_home as $value): ?>
                                            <tr>
                                                <td class="text-truncate"><?php echo $value['ho_ten'] ?></td>
                                                <td class="text-truncate"><?php echo $value['ten_san_pham'] ?></td>
                                                <td>
                                                    <span
                                                        class="badge badge-soft-success p-2"><?php echo $value['ten_danh_muc'] ?></span>
                                                </td>
                                                <td class="text-truncate">
                                                    <span><?php echo $value['khau_phan'] ?> & <?php echo $value['do_an_them'] ?></span>
                                                </td>
                                                <td class="text-truncate"><?php echo $value['so_luong'] ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end card-body-->
                    </div>
                    <!-- end card-->
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

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
<!-- end main content-->
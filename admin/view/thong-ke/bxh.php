<?php $bxh_mua = luot_mua_sp();
$bxh_xem = san_pham_hot();
$bieudo = thong_ke_bieu_do() ?>
<div class="main-content">
    <div class="page-content pt-4">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Thống kê</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Thống kê</a>
                                </li>
                                <li class="breadcrumb-item active">Bảng xếp hạng sản phẩm</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Bảng xếp hạng sản phẩm theo lượt mua</h4>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Lượt mua</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($bxh_mua as $value): ?>
                                    <tr>
                                        <td><?php echo $value['ten_san_pham']?></td>
                                        <td><?php echo $value['so_luot']?></td>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Bảng xếp hạng sản phẩm theo lượt xem</h4>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Lượt xem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($bxh_xem as $value): ?>
                                    <tr>
                                        <td><?php echo $value['ten_san_pham']?></td>
                                        <td><?php echo $value['luot_xem']?></td>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
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
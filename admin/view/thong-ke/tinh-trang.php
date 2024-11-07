<?php $tinh_trang = thong_ke_tinh_trang(); ?>
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
                                <li class="breadcrumb-item active">Tình trạng đơn hàng</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tình trạng đơn hàng</h4>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Số đơn hàng chờ xác nhận</th>
                                        <th>Số đơn hàng đã xác nhận</th>
                                        <th>Số đơn hàng đang xử lý</th>
                                        <th>Số đơn hàng đã giao hàng</th>
                                        <th>Số đơn hàng đã hủy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $tinh_trang['so_don_hang_cho_xac_nhan'] ?></td>
                                        <td><?php echo $tinh_trang['so_don_hang_da_xac_nhan'] ?></td>
                                        <td><?php echo $tinh_trang['so_don_hang_dang_xu_ly'] ?></td>
                                        <td><?php echo $tinh_trang['so_don_hang_da_giao_hang'] ?></td>
                                        <td><?php echo $tinh_trang['so_don_hang_da_huy'] ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Biểu đồ</h4>
                            <div id="piechart" style="width: 100%; height: 500px;"></div>
                            <script type="text/javascript">
                            google.charts.load('current', {
                                'packages': ['corechart']
                            });
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {

                                var data = google.visualization.arrayToDataTable([
                                    ['Task', 'Hours per Day'],
                                    ['Số đơn hàng chờ xác nhận', <?=$tinh_trang['so_don_hang_cho_xac_nhan'] ?>],
                                    ['Số đơn hàng đã xác nhận', <?=$tinh_trang['so_don_hang_da_xac_nhan'] ?>],
                                    ['Số đơn hàng đang xử lý', <?=$tinh_trang['so_don_hang_dang_xu_ly'] ?>],
                                    ['Số đơn hàng đã giao hàng', <?=$tinh_trang['so_don_hang_da_giao_hang'] ?>],
                                    ['Số đơn hàng đã hủy', <?=$tinh_trang['so_don_hang_da_huy'] ?>]
                                ]);

                                var options = {
                                    title: ''
                                };

                                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                                chart.draw(data, options);
                            }
                            </script>
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
<?php $doanh_thu_dm = thong_ke_doanh_thu_dm();
$doanh_thu_kh = thong_ke_doanh_thu_kh();
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
                                <li class="breadcrumb-item active">Doanh thu</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Doanh thu</h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Doanh thu theo danh mục </h4>
                                        </div>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Danh mục sản phẩm</th>
                                                    <th>Doanh thu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($doanh_thu_dm as $value) : ?>
                                                    <tr>
                                                        <td><?php echo $value['ten_danh_muc'] ?></td>
                                                        <td><?php echo number_format($value['total_dh']) ?>đ</td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Doanh thu theo khách hàng</h4>
                                        </div>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Khách hàng</th>
                                                    <th>Doanh thu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($doanh_thu_kh as $value) : ?>
                                                    <tr>
                                                        <td><?php echo $value['ho_ten'] ?></td>
                                                        <td><?php echo number_format($value['total_dh']) ?>đ</td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class=" p-3">
                                    <span class="font-weight-bolder">Tổng doanh thu: </span>
                                    <?php $thong_ke_home = don_hang_thong_ke_home();
                                    echo isset($thong_ke_home['total_price']) ? number_format($thong_ke_home['total_price']) : 0 ?>đ
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Biểu đồ</h4>
                            <div id="curve_chart" style="width: 100%; height: 400px"></div>
                            <script type="text/javascript">
                                google.charts.load('current', {
                                    'packages': ['corechart']
                                });
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Ngày tháng', 'Doanh thu'],
                                        <?php foreach ($bieudo as $i) : ?>['<?= $i['ngay_tao'] ?>',
                                                <?= $i['total_dh'] ?>],
                                        <?php endforeach; ?>
                                    ]);

                                    var options = {

                                        curveType: 'function',
                                        legend: {
                                            position: 'bottom'
                                        }
                                    };

                                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

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
<?php $danh_gia_all = danh_gia_select_thong_ke_all(); ?>
<div class="main-content">
    <div class="page-content pt-4">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Quản lý đánh giá</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Quản lý đánh giá</a>
                                </li>
                                <li class="breadcrumb-item active">Tất cả đánh giá</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card"> 
                        <div class="card-body">
                            <h4 class="card-title">Tất cả đánh giá</h4>

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Số đánh giá</th>
                                        <th>Đánh giá trung bình</th>
                                        <th>Mới nhất</th>
                                        <th>Cũ nhất</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($danh_gia_all as $value) : ?>
                                        <tr>
                                            <td><?php echo $value['ten_san_pham'] ?></td>
                                            <td><?php echo $value['tong_danh_gia'] ?></td>
                                            <td>
                                                <?php for ($i = 0; $i < 5; $i++) : if ($i < round($value['trung_binh'])) : ?>
                                                <i class="bx bxs-star text-warning"></i>
                                                <?php else : ?>
                                                <i class="bx bxs-star "></i>
                                                <?php endif;
                                                    endfor ?>
                                            </td>
                                            <td><?php echo $value['ngay_moi'] ?></td>
                                            <td><?php echo $value['ngay_cu'] ?></td>
                                            <td>
                                                <a href="?act=detail-danh-gia&id=<?php echo $value['id_san_pham'] ?>" class="btn btn-light text-center p-2 " data-toggle="tooltip" data-placement="top" title="Xem chi tiết"><i class="bx bx-show font-weight-bold"></i></a>
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
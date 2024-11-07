<?php $ma_giam_gia_all = select_giam_gia()?>
<div class="main-content">
    <div class="page-content pt-4">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Quản lý mã giảm giá</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Quản lý mã giảm giá</a>
                                </li>
                                <li class="breadcrumb-item active">Danh sách mã giảm giá</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="?act=delete-gg" method="post">
                            <div class="card-body">
                                <h4 class="card-title">Danh sách bình luận</h4>

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Mã code</th>
                                            <th>Giảm</th>
                                            <th>Số lượng</th>
                                            <th>Ngày hết hạn</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ma_giam_gia_all as $value) : if ($value['display_gg'] == 0) {
                                                continue;
                                            } ?>
                                            <tr>
                                                <td><input type="checkbox" value="<?php echo $value['id_ma_giam_gia'] ?>" <?php echo isset($_GET['checkAll']) ? 'checked' : '' ?> name="checkAll[]"></td>
                                                <td><?php echo $value['id_ma_giam_gia'] ?></td>
                                                <td><?php echo $value['code'] ?></td>
                                                <td class="text-primary"><?php echo $value['giam_gia'] ?>%</td>
                                                <td><?php echo $value['so_luong'] ?></td>
                                                <td><?php echo $value['ngay_het_han'] ?></td>
                                                <td>
                                                    <a href="?act=update-gg&id=<?php echo $value['id_ma_giam_gia'] ?>" class="btn btn-light text-center p-2 " data-toggle="tooltip" data-placement="top" title="Sửa"><i class="bx bx-pencil font-weight-bold"></i></a>
                                                    <a href="?act=delete-gg&id=<?php echo $value['id_ma_giam_gia'] ?>" class="btn btn-light text-center p-2" data-toggle="tooltip" data-placement="top" title="Xoá" onclick="return confirm('Bạn chắc chắc muốn xoá chứ?')"><i class="bx bx-x font-weight-bold"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
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
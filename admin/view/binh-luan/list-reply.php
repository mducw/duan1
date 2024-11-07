<?php $reply_comment_all =   select_reply_binh_luan(); ?>
<div class="main-content">
    <div class="page-content pt-4">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Quản lý bình luận</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Quản lý bình luận</a>
                                </li>
                                <li class="breadcrumb-item active">Tất cả bình luận đã trả lời</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tất cả bình luận đã trả lời</h4>

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Khách hàng</th>
                                        <th>Nội dung bình luận</th>
                                        <th>Ngày bình luận</th>
                                        <th>Nội dung phản hồi</th>
                                        <th>Ngày phản hồi</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($reply_comment_all as $value) :
                                        ?>
                                    <tr>
                                        <td><?php echo $value['ho_ten'] ?></td>
                                        <td style="max-width: 500px;"><?php echo $value['noi_dung'] ?></td>
                                        <td><?php echo $value['ngay_binh_luan'] ?></td>
                                        <td><?php echo $value['content'] ?></td>
                                        <td><?php echo $value['ngay_reply'] ?></td>
                                        <td>
                                            <a href="?act=update-reply&id=<?php echo $value['id_reply_comment'] ?>"
                                                class="btn btn-light text-center p-2 " data-toggle="tooltip"
                                                data-placement="top" title="Sửa"><i
                                                    class="bx bx-pencil font-weight-bold"></i></a>
                                            <a onclick="return confirm('Bạn có chắc muốn xóa không ?')" href="?act=delete-reply&id=<?php echo $value['id_reply_comment'] ?>"
                                                class="btn btn-light text-center p-2 " data-toggle="tooltip"
                                                data-placement="top" title="Xoá"><i
                                                    class="bx bx-x font-weight-bold"></i></a>
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
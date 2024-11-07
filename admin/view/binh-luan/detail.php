<?php $detail_binh_luan = binh_luan_select_by_id($_GET['id']);
$imagePath = "../uploads/";
?>
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
                                <li class="breadcrumb-item active">Chi tiết bình luận</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="?act=delete-binhluan" method="post">
                            <div class="card-body">
                                <h4 class="card-title">Chi tiết bình luận
                                    <a href="?act=list-comment" class="btn btn-success float-right "
                                        style="transform: translateY(-30%);">Danh sách bình luận</a>
                                </h4>

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Họ tên</th>
                                            <th>Tên đăng nhập</th>
                                            <th>Nội dung</th>
                                            <th>Ngày bình luận</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($detail_binh_luan as $value) : if ($value['display_binh_luan'] = 0) {
                                                continue;
                                            } ?>
                                        <tr>
                                            <td><input type="checkbox" value="<?php echo $value['id_binh_luan'] ?>"
                                                    <?php echo isset($_GET['checkAll']) ? 'checked' : '' ?>
                                                    name="checkAll[]"></td>
                                            <td class="d-flex">
                                                <?php 
                                                $img = $imagePath.$value['hinh_anh'];
                                                ?>
                                                <img src="<?php echo $img?>"
                                                    alt="" width="50px" height="50px"
                                                    style="border-radius: 50%; object-fit: cover;">
                                                <div class="p-2">
                                                    <h6 class="mb-0 text-primary"><?php echo $value['ho_ten'] ?></h6>
                                                    <p class=""><?php echo $value['email'] ?></p>
                                                </div>
                                            </td>
                                            <td><?php echo $value['ten_dang_nhap'] ?></td>
                                            <td style="max-width: 400px;"><?php echo $value['noi_dung'] ?></td>
                                            <td><?php echo $value['ngay_binh_luan'] ?></td>
                                            <td>
                                                <a href="?act=reply-comment&id=<?php echo $value['id_binh_luan'] ?>"
                                                    class="btn btn-light text-center p-2 " data-toggle="tooltip"
                                                    data-placement="top" title="Trả lời"><i
                                                        class="bx bx-comment-dots"></i></a>
                                                <a href="?act=delete-binhluan&id=<?=$value['id_binh_luan']?>
                                                &idsp=<?=$value['id_san_pham'] ?>" class="btn btn-light text-center p-2" data-toggle="tooltip"
                                                    data-placement="top" title="Xoá"
                                                    onclick="return confirm('Bạn chắc chắc muốn xoá chứ?')"><i
                                                        class="bx bx-x font-weight-bold"></i></a>
                                            </td>

                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                           
                            <!-- end card-body-->
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
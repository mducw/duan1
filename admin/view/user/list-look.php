<?php $khach_hang_all = user_select_all(); ?>
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
                                <li class="breadcrumb-item active">Thông tin khách hàng</li>
                                <li class="breadcrumb-item active">Tài khoản khóa</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="?act=delete-kh" method="post">
                            <div class="card-body">
                                <h4 class="card-title">Tất cả khách hàng
                                    <a href="?act=listkh" class="btn btn-info float-right "
                                        style="transform: translateY(-30%);">Danh sách khách hàng</a>
                                </h4>

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Họ tên</th>
                                            <th>Tên đăng nhập</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Trạng thái</th>
                                            <th>Vai trò</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($khach_hang_all as $value) :
                                         if ($value['display_user'] == 0)   {
                                                continue;
                                            }
                                            if ($value['kich_hoat'] == 1)   {
                                                continue;
                                            }
                                            ?>
                                        <tr>
                                            <td><input type="checkbox" value="<?php echo $value['id_khach_hang'] ?>"
                                                    <?php echo isset($_GET['checkAll']) ? 'checked' : '' ?>
                                                    name="checkAll[]"></td>
                                            <td class="font-weight-bolder text-primary"><?php echo $value['id_khach_hang'] ?>
                                            </td>
                                            <td class="d-flex">
                                                <img src="../uploads/<?php echo $value['hinh_anh'] ?>"
                                                    alt="" width="40px" height="40px"
                                                    style="border-radius: 50%; object-fit: cover;">
                                                <div class="pl-2">
                                                    <h6 class="mb-0 text-primary"><?php echo $value['ho_ten'] ?></h6>
                                                    <p class=""><?php echo $value['email'] ?></p>
                                                </div>
                                            </td>
                                            <td><?php echo $value['ten_dang_nhap'] ?></td>
                                            <td><?php echo $value['phone'] ?></td>
                                            <td><?php echo $value['dia_chi'] ?></td>
                                            <td><?php if ($value['trang_thai'] = 1) : ?>
                                                <span class="badge badge-danger">Khóa</span>
                                                <?php else : ?>
                                                <span class="badge badge-success">Online</span>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge badge-success"><?php echo $value['ten_vai_tro'] ?></span>
                                            </td>
                                            <td>
                                                <a href="?act=update-kh&id=<?php echo $value['id_khach_hang'] ?>"
                                                    class="btn btn-light text-center p-2 " data-toggle="tooltip"
                                                    data-placement="top" title="Sửa"><i
                                                        class="bx bx-pencil font-weight-bold"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer bg-transparent ">
                                <div class="float-right m-2">
                                    <a href="?act=addkh" class="btn btn-success "> <i class="bx bx-plus pr-1"></i>Thêm
                                        khách hàng </a>
                                </div>
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
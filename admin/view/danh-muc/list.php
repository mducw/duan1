<?php
$list_danh_muc = loai_select_all();
$target_dir = "../uploads/";
?>

<div class="main-content">
    <div class="page-content pt-4">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Quản lý danh mục</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Quản lý danh mục</a>
                                </li>
                                <li class="breadcrumb-item active">Danh sách danh mục</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="?act=delete-dm" method="post">
                            <div class="card-body">
                                <h4 class="card-title">Tất cả danh mục
                                    <a href="?act=adddm" class="btn btn-success float-right "
                                        style="transform: translateY(-30%);">
                                        <i class="bx bx-plus pr-1"></i> Thêm danh mục
                                    </a>
                                </h4>

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Tên danh mục</th>
                                            <th>Hình ảnh</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($list_danh_muc as $danh_muc):
                                            extract($danh_muc)
                                                ?>
                                            <?php if ($danh_muc['display_danh_muc'] == 0):
                                                continue; endif ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" value="<?php echo $danh_muc['id_danh_muc'] ?>"
                                                        <?php echo isset($_GET['checkAll']) ? 'checked' : '' ?>
                                                        name="checkAll[]">
                                                </td>
                                                <td class="font-weight-bolder text-primary">
                                                    <?php echo $danh_muc['id_danh_muc'] ?>
                                                </td>
                                                <td><?php echo $danh_muc['ten_danh_muc'] ?></td>
                                                <td>
                                                    <?php
                                                    $image = $target_dir . $danh_muc['anh_danh_muc'];
                                                    ?>
                                                    <img height="70px" src="<?= $image ?>" alt="">
                                                </td>
                                                <td>
                                                    <a href="?act=update-dm&id-dm=<?php echo $danh_muc['id_danh_muc'] ?>"
                                                        class="btn btn-light text-center p-2" title="Sửa">
                                                        <i class="bx bx-pencil font-weight-bold"></i>
                                                    </a>
                                                    <a href="?act=delete-dm&id-dm=<?php echo $danh_muc['id_danh_muc'] ?>"
                                                        class="btn btn-light text-center p-2" title="Xóa"
                                                        onclick="return confirm('<?php echo (loai_exist($danh_muc['id_danh_muc'])) ? 'Danh mục này đang được sử dụng bạn vẫn muốn xoá chứ?' : 'Bạn muốn xoá danh mục này chứ?' ?>')">
                                                        <i class="bx bx-x font-weight-bold"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer bg-transparent ">
                                <div class="float-right m-2">
                                   
                                    <a href="?act=adddm" class="btn btn-success "> <i class="bx bx-plus pr-1"></i>Thêm
                                        danh mục</a>
                                </div>
                            </div>
                        </form>
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
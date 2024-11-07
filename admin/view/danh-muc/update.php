<div class="main-content">
    <div class="page-content pt-4 ">
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
                                <li class="breadcrumb-item active">Sửa danh mục</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Sửa danh mục</h4>
                            <form action="?act=update-dm" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="example-password">Mã danh mục</label>
                                    <input type="text" id="example-password" class="form-control" value="" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="simpleinput">Tên danh mục</label>
                                    <input type="text" id="simpleinput" class="form-control" placeholder="Nhập tên danh mục" name="ten_danh_muc" value="<?php echo $danh_muc_one['ten_danh_muc'] ?>">
                                    <input type="text" value="<?php echo $danh_muc_one['id_danh_muc'] ?>" name="id_danh_muc" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="simpleinput"> Ảnh danh mục</label>
                                    <input type="file" id="simpleinput" class="form-control" name="anh_danh_muc">
                                    <?php
                                    $target_dir = "../uploads/";
                                    $image = $target_dir.$danh_muc_one['anh_danh_muc'];
                                    ?>
                                    <img src="<?=$image?>" height="80px" alt="">
                                    <input type="text" value="<?php echo $danh_muc_one['id_danh_muc'] ?>" name="id_danh_muc" hidden>
                                </div>
                                <div class="float-right">
                                    <a href="?act=listdm" class="btn btn-outline-success">Danh sách danh mục</a>
                                    <input type="submit" class="btn btn-success" value="Sửa danh mục" name="update-dm">
                                </div>
                            </form>
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
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
                                <li class="breadcrumb-item active">Thêm danh mục</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thêm danh mục</h4>
                            <form action="?act=adddm" method="post" enctype="multipart/form-data" id="myForms" >
                                <div class="form-group">
                                    <label for="example-password">Mã danh mục</label>
                                    <input type="text" id="example-password" class="form-control " value="" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="simpleinput">Tên danh mục</label>
                                    <input type="text" id="simpleinput" class="form-control " placeholder="Nhập tên danh mục" name="ten_danh_muc">
                                </div>
                                <div class="form-group">
                                    <label for=""> Ảnh danh mục</label>
                                    <input type="file" id="anhdanhmucinput" name="anh_danh_muc" class="form-control " placeholder="Nhập tên danh mục" name="ten_danh_muc">
                                </div>
                                <div class="float-right ">
                                    <a href="?act=listdm" class="btn btn-outline-success">Danh sách danh mục</a>
                                    <input type="submit" id="inputError" class="btn btn-success" value="Thêm danh mục" name="add-dm">
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
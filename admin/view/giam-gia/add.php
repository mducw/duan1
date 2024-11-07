<div class="main-content">
    <div class="page-content pt-4 ">
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
                                <li class="breadcrumb-item active">Thêm mã giảm giá</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thêm mã giảm giá</h4>
                            <form action="?act=add-gg" method="post" enctype="multipart/form-data" id="myForms">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-password">Mã giảm giá</label>
                                            <input type="text" id="example-password" class="form-control" value=""
                                                name="code">
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleinput">Giảm giá</label>
                                            <input type="text" id="simpleinput" class="form-control" name="giam_gia">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Số lượng</label>
                                            <input type="number" id="" class="form-control" name="so_luong">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Ngày hết hạn</label>
                                            <input type="date" id="" class="form-control" name="ngay_het_han">
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <a href="?act=list-gg" class="btn btn-outline-success">Danh sách giảm giá</a>
                                    <input type="submit" class="btn btn-success" value="Thêm giảm giá" name="addgg">
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
<?php 
$list_danh_muc = loai_select_all();
?>
<div class="main-content">
    <div class="page-content pt-4 ">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Quản lý sản phẩm</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Quản lý sản phẩm</a>
                                </li>
                                <li class="breadcrumb-item active">Thêm sản phẩm</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thêm sản phẩm</h4>
                            <form action="?act=addsp" method="post" enctype="multipart/form-data" id="myForms" >
                                <div class="form-group">
                                    <label for="simpleinput">Tên sản phẩm</label>
                                    <input type="text" id="simpleinput" class="form-control " placeholder="Nhập tên sản phẩm" name="ten_san_pham">
                                </div>
                                <div class="form-group">
                                    <label for="simpleinput">Gía sản phẩm</label>
                                    <input type="number" id="simpleinput" class="form-control " placeholder="Nhập giá sản phẩm" name="price">
                                </div>
                                <div class="form-group">
                                    <label for="simpleinput">Mo ta</label>
                                    <input type="text" id="simpleinput" class="form-control " placeholder="Nhập mô tả" name="mo_ta">
                                </div>
                                <div class="form-group">
                                    <label for=""> Ảnh sản phẩm</label>
                                    <input type="file" id="anhdanhmucinput" name="hinh_anh" class="form-control ">
                                </div>
                                <div class="form-group">
                                    <label for="simpleinput">Danh mục</label>
                                    <select name="id_danh_muc" class="form-control" id="">
                                        <?php 
                                        foreach($list_danh_muc as $danh_muc) :
                                            extract($danh_muc);
                                        ?>
                                        <option value="<?=$danh_muc['id_danh_muc']?>"><?=$danh_muc['ten_danh_muc']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="float-right ">
                                    <a href="?act=listsp" class="btn btn-outline-success">Danh sách sản phẩm</a>
                                    <input type="submit" id="inputError" class="btn btn-success" value="Thêm sản phẩm" name="add-sp">
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
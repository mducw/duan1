<?php 
$roles = roles_select();
$user_by_id= select_user_by_id($_GET['id']);
// print_r($user_by_id);
 ?>
<div class="main-content">
    <div class="page-content pt-4 ">
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
                                <li class="breadcrumb-item active">Thêm khách hàng</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thêm khách hàng</h4>
                            <form action="?act=update-kh" method="post" enctype="multipart/form-data" id="myForms">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ho_ten">Họ tên</label>
                                            <input type="text" id="ho_ten" class="form-control" placeholder="Họ tên"
                                                name="ho_ten" value="<?=$user_by_id['ho_ten']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="tenDN">Tên đăng nhập</label>
                                            <input type="text" id="tenDN" class="form-control"
                                                placeholder="Tên đăng nhập" name="ten_dang_nhap" value="<?=$user_by_id['ten_dang_nhap']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Mật khẩu</label>
                                            <input type="text" id="password" class="form-control" placeholder="Mật khẩu"
                                                name="mat_khau" value="<?=$user_by_id['mat_khau']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" class="form-control" placeholder="Nhập Email"
                                                name="email" value="<?=$user_by_id['email']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Số điện thoại</label>
                                            <input type="text" id="phone" class="form-control"
                                                placeholder="Nhập Số điện thoại" name="phone" value="<?=$user_by_id['phone']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="img">Hình ảnh</label>
                                            <input type="file" id="img" class="form-control" name="hinh_anh">
                                            <?php
                                            $img = "../uploads/".$user_by_id['hinh_anh'];
                                            ?>
                                            <img src="<?=$img?>" height="70px" alt="">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Địa chỉ</label>
                                            <input type="text" id="address" class="form-control"
                                                placeholder="Nhập Địa chỉ" name="dia_chi" value="<?=$user_by_id['dia_chi']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="kich_hoat">Kích hoạt</label>
                                            <select name="kich_hoat" id="kich_hoat" class="form-control">
                                            <option value="" hidden>--Chọn kích hoạt--</option>
                                            <option value="0" <?= isset($user_by_id['kich_hoat']) && $user_by_id['kich_hoat'] == 0 ? 'selected' : '' ?>>Khoá</option>
                                            <option value="1" <?= isset($user_by_id['kich_hoat']) && $user_by_id['kich_hoat'] == 1 ? 'selected' : '' ?>>Kích hoạt</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="vai_tro">Vai trò</label>
                                            <select name="id_roles" id="vai_tro" class="form-control">
                                                <option value="" hidden>--Chọn vai trò--</option>
                                                <?php foreach ($roles as $value) : ?>
                                                <option value="<?php echo $value['id_roles'] ?>"
                                                <?php if($value['id_roles'] == $user_by_id['id_roles']){
                                                 echo "selected";   
                                                }?>
                                                ><?php echo $value['ten_vai_tro'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <input type="hidden" value="<?=$user_by_id['id_khach_hang']?>" name="id_khach_hang">
                                    </div> 
                                </div>

                                <div class="float-right">
                                    <a href="?act=listkh" class="btn btn-outline-success">Danh sách khách hàng</a>
                                    <input type="submit" class="btn btn-success" value="Cập nhập khách hàng" name="update-kh">
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
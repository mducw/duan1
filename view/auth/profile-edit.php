<main class="page-container">
    <div class="page-wrapper">
        <h1 class="title-user">Thông tin cá nhân</h1>
        <div class="form-container">
            <?php
            if(isset($_SESSION['login'])&& (is_array($_SESSION['login']))){
                extract($_SESSION['login']);
                // Preview image
                // echo $hinh_anh;
                $pathImage = isset($hinh_anh) ? "./uploads/{$hinh_anh}" : "./uploads/noavatar.jpg";
            }
            ?>
            <form action="index.php?act=profile-edit" class="form" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_khach_hang" value="<?= $id_khach_hang ?>" />
                <div class="row">
                    <label class="label" for="username">Họ tên:</label>
                    <input class="input" type="text" name="ho_ten" id="ho_ten" placeholder="Họ tên" value="<?= $ho_ten ?>" />
                </div>
                <div style="margin-left: 150px;">
                    <small class="message-error"><?= isset($error['username']) ? $error['username'] : "" ?></small>
                </div>
                <div class="row">
                    <label class="label" for="username">Ảnh đại diện:</label>
                    <div class="form-group">
                        <img class='border rounded' id="preview-image" src="<?= $pathImage ?>" height='115' width='115' />
                        <input class="form-control form-control" type="file" id="hinh_anh" name="hinh_anh">
                    </div>
                </div>
                <div class="row">
                    <label class="label" for="email">Email:</label>
                    <input class="input" type="text" name="email" id="email" placeholder="Email" value="<?= $email ?>" />
                </div>
                <div style="margin-left: 150px;">
                    <small class="message-error"><?= isset($error['email']) ? $error['email'] : "" ?></small>
                </div>
                <div class="row">
                    <label class="label" for="dia_chi">Địa chỉ:</label>
                    <input class="input" type="text" name="dia_chi" id="dia_chi" placeholder="Địa chỉ chi tiết" value="<?= $dia_chi ?>" />
                </div>
                <div class="row">
                    <label class="label" for="phone">Điện thoại:</label>
                    <input class="input" type="text" name="phone" id="phone" placeholder="Số điện thoại" value="<?= $phone ?>" />
                </div>
                <div class="form-group-button">
                    <input name="submit" class="btn btn-info" type="submit" value="Cập nhật" />
                    <a class="btn btn-danger" href="index.php?act=form_account">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('#image').on('change', function() {
            previewImage(this);
        });
    });
</script>
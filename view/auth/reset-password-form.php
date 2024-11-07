<?php if (isset($_SESSION['email'])) {
    $ten_dang_nhap = check_email($_SESSION['email']);
} else {
 $ten_dang_nhap= "";   
}?>

<div class="container_login">
    <div class="box_login3">
        <div class="title_login">
            <a href="#"><button class="box_dangnhap3 text-black"><?= $ten_dang_nhap['ten_dang_nhap']?></button></a>
        </div>
        <div class="formtaikhoan">
            <form action="index.php?act=reset-password" id="resetPasswordForm" method="POST">
                <div class="form-group input-login getPassword">
                    <h5 class="text-start">Nhập mật Khẩu Mới*</h5>
                    <input class="login_user" type="password" id="newPassword" placeholder="Mật khẩu mới"
                        name="newPassword">
                </div>
                <input type="submit" class="button_submit3" value="Xác nhận" name="submit">
                <a class="btn-return" style="color:black;margin-top:10px;" href="index.php?act=login" role="button">Về
                    trang đăng nhập!</a>
            </form>
        </div>
    </div>
</div>
</div>
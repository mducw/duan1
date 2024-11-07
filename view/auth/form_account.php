<?php
if (isset($_SESSION['login'])) {
    extract($_SESSION['login']);
}
?>
<main class="page-container">
    <div class="page-wrapper">
        <h1 class="title-user">Tài khoản : <?=$ho_ten?>  </h1>
        <div class="content-profile">

            <div class="interlist">
                <div class="inter-title">👻 Thông tin tài khoản</div>
                <div class="inter-info-rank"><i class="fa-solid fa-ranking-star"></i> Cấp độ khách hàng:
                    <strong>💎</strong></div>
                <div class="inter-info"><a href="index.php?act=profile-edit"><i class="fa-solid fa-arrows-rotate"></i>
                        Thay đổi thông tin tài khoản</a></div>
                <div class="inter-info"><a href="index.php?act=forgot-password"><i class="fa-solid fa-wrench"></i> Thay
                        đổi mật khẩu</a></div>
                <?php if ($id_roles == 3 || $id_roles = 2) { ?>
                    <div class="inter-info"><a href="admin/index.php"><i class="fa-solid fa-key"></i> Trang quản trị</a>
                    </div>
                <?php } ?>
                <div class="inter-info"><a href="index.php?act=logout"><i class="fa-solid fa-right-from-bracket"></i>
                        <strong>Đăng xuất</strong></a>
                </div>
            </div>
            <div class="interlist">
                <div class="inter-title">💝 Sản phẩm </div>
                <div class="inter-info"><a href="index.php?act=order-history"><i
                            class="fa-solid fa-clock-rotate-left"></i> Lịch sử đơn hàng</a></div>
            </div>
        </div>
    </div>
</main>
<?php
$list_binh_luan = select_binh_luan($_GET['id']);
$list_danh_gia = danh_gia_select_by_id($_GET['id']);
?>
<div class="border border-secondary-subtle p-4">
  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button"
        role="tab" aria-controls="nav-home" aria-selected="true">
        <span class="fs-5 fw-medium">Bình luận</span>
      </button>
      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button"
        role="tab" aria-controls="nav-profile" aria-selected="false">
        <span class="fs-5 fw-medium">Đánh giá</span>
      </button>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <!-- Tab Bình luận -->
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
      <?php if (isset($_SESSION['login']) && $_SESSION['login']):
        extract($_SESSION['login']);
        $logo = !empty($hinh_anh) ? $imagePath . $hinh_anh : './uploads/noavatar.jpg';
        ?>
        <form action="index.php?act=add-comment" method="post">
          <div class="mt-4 mb-5 d-flex justify-content-between">
            <img src="<?= $logo ?>" alt="<?= $ho_ten ?>" name="hinh_anh" class="rounded-circle" height="45px">
            <input type="hidden" name="id_khach_hang" value="<?= $id_khach_hang ?>">
            <input type="hidden" name="id_san_pham" value="<?= $_GET['id'] ?>">
            <input type="text" class="form-control ms-2" name="noi_dung" placeholder="Viết bình luận...">
            <input style="width: 100px;" type="submit" name="submit" class="btn btn-info ms-2">
          </div>
        </form>
      <?php else: ?>
        <div class="no-login"><i class="fa-solid fa-circle-exclamation"></i> Vui lòng <a href="index.php?act=login">đăng
            nhập</a> để bình luận!</div>
      <?php endif; ?>

      <?php foreach ($list_binh_luan as $binh_luan):
        $logo_user = $imagePath . $binh_luan['hinh_anh'];
        ?>
        <div class="d-flex">
          <img src="<?= $logo_user ?>" alt="<?= $binh_luan['ho_ten'] ?>" class="rounded-circle" height="45px">
          <div class="ms-2">
            <span class="fw-semibold"><?= $binh_luan['ho_ten'] ?></span><br>
            <p><?= $binh_luan['noi_dung'] ?></p>
            <p class="text-muted" style="font-size:10px; margin-top:-10px;"><?= $binh_luan['ngay_binh_luan'] ?></p>
          </div>
        </div>
        <?php
        $list_reply = select_reply_by_id_binh_luan($binh_luan['id_binh_luan']);
        ?>
        <?php if (!empty($list_reply)): ?>
          <?php foreach ($list_reply as $reply): ?>
            <?php $logo_reply = $imagePath . $reply['hinh_anh'] ?>
            <div class="d-flex ms-5 mt-1">
              <img src="<?= $logo_reply ?>" alt="<?= $reply['ho_ten'] ?>" class="rounded-circle" height="35px">
              <div class="ms-2">
                <span class="fw-semibold"><?= $reply['ho_ten'] ?></span><br>
                <p><?= $reply['content'] ?></p>
                <p class="text-muted" style="font-size:10px; margin-top:-10px;"><?= $reply['ngay_reply'] ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
        <hr class="text-secondary" style="margin-top:3px;">
      <?php endforeach; ?>
    </div>

    <!-- Tab Đánh giá -->
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
      <?php foreach ($list_danh_gia as $danh_gia): ?>
        <div class="review_address_inner mt-30">
          <div class="pro_review">
            <div class="review_thumb">
              <?php
              $logo_danh_gia = $imagePath . $danh_gia['hinh_anh'];
              ?>
              <img src="<?= $logo_danh_gia ?>" alt="name" class="rounded-circle" height="45px">
            </div>
            <div class="review_details ms-2">
              <div class="review_info mb-10">
                <h6><?= $danh_gia['ho_ten'] ?></h6>
                <?php for ($i = 0; $i < 5; $i++):
                  if ($i < round($danh_gia['danh_gia'])): ?>
                    <span class="text-warning" style="font-size:15px"><i class="fa-solid fa-star"></i></span>
                  <?php else: ?>
                    <span style="font-size:15px;"><i class="fa-regular fa-star"></i></span>
                  <?php endif;
                endfor ?>
                <p class="text-muted" style="font-size:10px;"><?=$danh_gia['ngay_danh_gia']?></p>
              </div>
              <p><?=$danh_gia['noi_dung']?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
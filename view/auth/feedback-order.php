<?php 
$chi_tiet_don_hang = chi_tiet_don_hang_by_id($_GET['id']);
$image = $imagePath.$chi_tiet_don_hang['hinh_anh'];
$id_khach_hang= $_SESSION['login']['id_khach_hang'];
$id_san_pham = $chi_tiet_don_hang['id_san_pham'];
$check_danh_gia = kiem_tra_danh_gia($id_khach_hang,$id_san_pham);
?>
<style>
    .star-danh_gia {
        direction: rtl;
        font-size: 24px;
        unicode-bidi: bidi-override;
        display: inline-block;
    }

    .star-danh_gia input {
        display: none;
    }

    .star-danh_gia label {
        color: #ddd;
        cursor: pointer;
    }
    .star-danh_gia input:checked~label,
    .star-danh_gia label:hover,
    .star-danh_gia label:hover~label {
        color: #f5b301;
    }
</style>
<div class="d-flex align-items-center" style="height: 55px; background-color: #f9f9f9;">
    <div class="container">
        <a class="text-decoration-none" href="index.php"><span class="text-black">Cooky</span> </a> /
        <span class="text-danger">Đánh giá đơn hàng</span>
    </div>
</div>
<div class="container border border-black mt-4 rounded p-3" style="height: 100%;">
    <div class="d-flex">
        <img src="<?=$image?>" alt="" style="height: 130px;">
        <div class="m-3">
            <h5><?=$chi_tiet_don_hang['ten_san_pham']?></h5>
            <span style="color:gray">Khẩu phần: <?=$chi_tiet_don_hang['khau_phan']?>,<?=$chi_tiet_don_hang['do_an_them']?></span>
        </div>
    </div>
    <?php if(empty($check_danh_gia)) : ?>
    <div class="text-center mt-2">
        <form action="index.php?act=feedback-order&id=<?=$_GET['id']?>" method="post" id="danh_giaForm">
            <div class="star-danh_gia">
                <input type="radio" id="star5" name="danh_gia" value="5"><label for="star5">&#9733;</label>
                <input type="radio" id="star4" name="danh_gia" value="4"><label for="star4">&#9733;</label>
                <input type="radio" id="star3" name="danh_gia" value="3"><label for="star3">&#9733;</label>
                <input type="radio" id="star2" name="danh_gia" value="2"><label for="star2">&#9733;</label>
                <input type="radio" id="star1" name="danh_gia" value="1"><label for="star1">&#9733;</label>
            </div>
            <div class="mt-2">
                <span class="mt-2">Đánh giá sản phẩm này <span style="color:red">*</span></span><br>
                <textarea class="form-control mt-2" id="comment" name="noi_dung" rows="4" cols="50"
                    placeholder="Viết bình luận của bạn tại đây..."></textarea>
            </div>
            <input type="text" name="id_khach_hang" value="<?=$_SESSION['login']['id_khach_hang']?>" hidden>;
            <input type="text" name="id_san_pham" value="<?=$chi_tiet_don_hang['id_san_pham']?>" hidden>
            <div class="text-start ">
                <input class="btn btn-success" name="submit_danh_gia" type="submit" value="Gửi đánh giá">
            </div>
        </form>
    </div>
    <?php else :?>
        <div class="text-center">
        <span class="badge text-bg-success">Bạn đã đánh giá sản phẩm này</span>
        </div>
    <?php endif;?>
</div>

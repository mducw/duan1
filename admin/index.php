<?php
session_start();
ob_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
include_once("../global.php");
include_once("./assets/model.php");
include_once("./view/header.php");
include_once("./view/sidebar.php");

$ngay_nhap_str = '19/08/2024 21:03:02';
if (isset($_GET['act']) && $_GET['act']) {
    $act = $_GET['act'];
    switch ($act) {
        // Quản lý danh mục start
        case 'adddm':
            if (isset($_POST['add-dm']) && $_POST['add-dm']) {
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $anh_danh_muc = $_FILES['anh_danh_muc']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["anh_danh_muc"]["name"]);
                if (move_uploaded_file($_FILES["anh_danh_muc"]["tmp_name"], $target_file)) {
                    loai_insert($ten_danh_muc, $anh_danh_muc);
                }
                showSuccessToast('Bạn đã thêm danh mục sản phẩm thành công!');
            }

            include_once 'view/danh-muc/add.php';
            break;
        case 'listdm':
            $list_danh_muc = loai_select_all();
            include_once 'view/danh-muc/list.php';
            break;
        case 'delete-dm':
            if (isset($_GET['id-dm'])) {
                //   san_pham_delete_by_danh_muc_none($_GET['id-dm']);
                loai_delete($_GET['id-dm']);
                showSuccessToast('Bạn đã xoá danh mục sản phẩm thành công!');
            }
            include_once 'view/danh-muc/list.php';
            break;
        // end delete danh mục
        case 'update-dm':
            if (isset($_GET['id-dm'])) {
                $danh_muc_one = loai_select_by_id($_GET['id-dm']);
            }
            if (isset($_POST['update-dm']) && $_POST['update-dm']) {
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $id_danh_muc = $_POST['id_danh_muc'];
                $anh_danh_muc = $_FILES['anh_danh_muc']['name'];
                if (!empty($ten_danh_muc)) {
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["anh_danh_muc"]["name"]);
                    if (move_uploaded_file($_FILES["anh_danh_muc"]["tmp_name"], $target_file)) {
                        loai_update($id_danh_muc, $ten_danh_muc, $anh_danh_muc);
                        showSuccessToast('Bạn đã sửa danh mục sản phẩm thành công!');
                        $list_danh_muc = loai_select_all();
                        include_once 'view/danh-muc/list.php';
                    }
                }
            } else
                include_once 'view/danh-muc/update.php';
            break;
        case 'addsp':
            if (isset($_POST['add-sp']) && $_POST['add-sp']) {
                $ten_san_pham = $_POST['ten_san_pham'];
                $price = $_POST['price'];
                $mo_ta = $_POST['mo_ta'];
                $ngay_nhap = date('Y-m-d H:i:s');
                $id_danh_muc = $_POST['id_danh_muc'];
                $hinh_anh = $_FILES['hinh_anh']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["hinh_anh"]["name"]);
                if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file)) {
                    them_moi_san_pham($ten_san_pham, $price, $mo_ta, $hinh_anh, 0, $ngay_nhap, $id_danh_muc);
                }

                showSuccessToast('Bạn đã thêm sản phẩm thành công!');
            }

            include_once 'view/san-pham/add.php';
            break;
        case 'listsp':
            $list_san_pham = loadall_san_pham();
            include_once 'view/san-pham/list.php';
            break;
        case 'delete-sp':
            if (isset($_GET['id-sp'])) {
                // echo $_GET['id-sp'];
                xoa_san_pham($_GET['id-sp']);
                showSuccessToast('Bạn đã xoá sản phẩm thành công!');
            }
            $list_san_pham = loadall_san_pham();
            include_once 'view/san-pham/list.php';
            break;
        case 'update-sp':
            if (isset($_GET['id-sp'])) {
                $san_pham = load_san_pham_id($_GET['id-sp']);
            }
            if (isset($_POST['update-sp']) && $_POST['update-sp']) {
                $id_san_pham = $_POST['id_san_pham'];
                $ten_san_pham = $_POST['ten_san_pham'];
                $price = $_POST['price'];
                $mo_ta = $_POST['mo_ta'];
                $id_danh_muc = $_POST['id_danh_muc'];
                $hinh_anh = $_FILES['hinh_anh']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["hinh_anh"]["name"]);
                move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file);
                update_san_pham($id_san_pham, $ten_san_pham, $price, $mo_ta, $hinh_anh, $id_danh_muc);
                showSuccessToast('Bạn đã cập nhập sản phẩm thành công!');
                $list_san_pham = loadall_san_pham();
                include_once 'view/san-pham/list.php';
            } else
                include_once 'view/san-pham/update.php';
            break;
        case 'add-detail-sp':
            if (isset($_POST['add-detail-sp']) && $_POST['add-detail-sp']) {
                $id_san_pham = $_POST['id_san_pham'];
                $so_luong = $_POST['so_luong'];
                $id_khau_phan = $_POST['id_khau_phan'];
                $id_do_an_them = $_POST['id_do_an_them'];
                $ngay_nhap = date('Y-m-d');
                insert_chi_tiet_sp($so_luong, $ngay_nhap, $id_san_pham, $id_khau_phan, $id_do_an_them);
                showSuccessToast('Bạn đã thêm mới thành công!');
            }
            $list_san_pham = loadall_san_pham();
            $list_khau_phan = loadall_khau_phan();
            $list_do_an_them = loadall_do_an_them();
            include_once 'view/san-pham/add-detail.php';
            break;
        case 'list-detail':
            if (isset($_GET['id'])) {
                $list_detail_sp = select_chi_tiet_san_pham($_GET['id']);
            }
            include_once 'view/san-pham/list-detail.php';
            break;
        case 'delete-detail-sp':
            if (isset($_GET['id'])) {
                $id_detail = $_GET['idsp'];
                delete_chi_tiet_san_pham($_GET['id']);
                showSuccessToast('Bạn đã xóa thành công!');
            }
            header('location: index.php?act=list-detail&id=' . $id_detail);
            break;
        case 'update-detail-sp':
            if (isset($_GET['id'])) {
                $detail_by_id = select_chi_tiet_san_pham_by_id($_GET['id']);
            }
            if (isset($_POST['update-detail-sp']) && $_POST['update-detail-sp']) {
                $id_chi_tiet_san_pham = $_POST['id_chi_tiet_san_pham'];
                $id_san_pham = $_POST['id_san_pham'];
                $so_luong = $_POST['so_luong'];
                $id_khau_phan = $_POST['id_khau_phan'];
                $id_do_an_them = $_POST['id_do_an_them'];
                update_chi_tiet_san_pham($id_chi_tiet_san_pham, $so_luong, $id_khau_phan, $id_do_an_them);
                showSuccessToast('Bạn đã cập nhập thành công!');
                header('location: index.php?act=list-detail&id=' . $id_san_pham);
            }
            $list_san_pham = loadall_san_pham();
            $list_khau_phan = loadall_khau_phan();
            $list_do_an_them = loadall_do_an_them();
            include_once 'view/san-pham/update-detail.php';
            break;
        case 'addkh':
            if (isset($_POST['addkh']) && $_POST['addkh']) {
                $ho_ten = $_POST['ho_ten'];
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $mat_khau = $_POST['mat_khau'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $dia_chi = $_POST['dia_chi'];
                $kich_hoat = $_POST['kich_hoat'];
                $id_roles = $_POST['id_roles'];
                $hinh_anh = $_FILES['hinh_anh']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["hinh_anh"]["name"]);
                move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file);
                user_insert($ho_ten, $ten_dang_nhap, $mat_khau, $email, $phone, $hinh_anh, $kich_hoat, $dia_chi, $id_roles);
                showSuccessToast('Bạn đã thêm mới thành công!');
            }
            include_once 'view/user/add.php';
            break;
        case 'listkh':
            include_once 'view/user/list.php';
            break;
        case 'list-look':
            include_once 'view/user/list-look.php';
            break;
        case 'look-kh':
            if (isset($_GET['id']) && $_GET['id']) {
                look_user($_GET['id']);
                showSuccessToast('Bạn đã khóa tài khoản thành công!');
            }
            include_once 'view/user/list.php';
            break;
        case 'update-kh':
            if (isset($_POST['update-kh']) && $_POST['update-kh']) {
                $id_khach_hang = $_POST['id_khach_hang'];
                $ho_ten = $_POST['ho_ten'];
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $mat_khau = $_POST['mat_khau'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $dia_chi = $_POST['dia_chi'];
                $kich_hoat = $_POST['kich_hoat'];
                $id_roles = $_POST['id_roles'];
                $hinh_anh = $_FILES['hinh_anh']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["hinh_anh"]["name"]);
                move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file);
                update_user($id_khach_hang, $ho_ten, $ten_dang_nhap, $mat_khau, $email, $phone, $hinh_anh, $kich_hoat, $dia_chi, $id_roles);
                showSuccessToast('Bạn đã cập nhập thành công!');
                $khach_hang_all = user_select_all();
                include_once 'view/user/list.php';
            } else {
                include_once 'view/user/update.php';
            }
            break;
        case 'list-comment':
            include('./view/binh-luan/list.php');
            break;
        case 'detail-comment':
            include('./view/binh-luan/detail.php');
            break;
        case 'add-gg':
            if (isset($_POST['addgg']) && $_POST['addgg']) {
                $code = $_POST['code'];
                $giam_gia = $_POST['giam_gia'];
                $so_luong = $_POST['so_luong'];
                $ngay_het_han = $_POST['ngay_het_han'];
                if (empty($code)) {
                    displayToastrMessageError("Vui lòng không bỏ trống code !");
                }
                if (empty($giam_gia)) {
                    displayToastrMessageError("Vui lòng không bỏ trống giảm giá !");
                }
                if (empty($so_luong)) {
                    displayToastrMessageError("Vui lòng không bỏ trống số lượng !");
                }
                if (empty($ngay_het_han)) {
                    displayToastrMessageError("Vui lòng không bỏ trống ngày hết hạn !");
                }
                if (!empty($code) && !empty($giam_gia) && !empty($so_luong) && !empty($ngay_het_han)) {
                    insert_giam_gia($code, $giam_gia, $so_luong, $ngay_het_han);
                    displayToastrMessageSuccess("Tạo mã giảm giá thành công !");
                }
            }
            include('./view/giam-gia/add.php');
            break;
        case 'list-gg':
            include('./view/giam-gia/list.php');
            break;
        case 'delete-gg':
            if (isset($_GET['id']) && $_GET['id']) {
                $id_ma_giam_gia = $_GET['id'];
                delete_giam_gia($id_ma_giam_gia);
                displayToastrMessageSuccess("Xóa mã giảm giá thành công !");
            }
            include('./view/giam-gia/list.php');
            break;
        case 'update-gg':
            if (isset($_POST['update-gg']) && $_POST['update-gg']) {
                $code = $_POST['code'];
                $giam_gia = $_POST['giam_gia'];
                $so_luong = $_POST['so_luong'];
                $ngay_het_han = $_POST['ngay_het_han'];
                $id_ma_giam_gia = $_POST['id_ma_giam_gia'];
                if (empty($code)) {
                    displayToastrMessageError("Vui lòng không bỏ trống code !");
                }
                if (empty($giam_gia)) {
                    displayToastrMessageError("Vui lòng không bỏ trống giảm giá !");
                }
                if (empty($so_luong)) {
                    displayToastrMessageError("Vui lòng không bỏ trống số lượng !");
                }
                if (empty($ngay_het_han)) {
                    displayToastrMessageError("Vui lòng không bỏ trống ngày hết hạn !");
                }
                if (!empty($code) && !empty($giam_gia) && !empty($so_luong) && !empty($ngay_het_han)) {
                    update_ma_giam_gia($id_ma_giam_gia, $code, $giam_gia, $so_luong, $ngay_het_han);
                    header('location: index.php?act=update-gg&id=' . $id_ma_giam_gia . '&thongbao=success');
                }
            }
            include('./view/giam-gia/update.php');
            break;
        case 'list-order':
            include('./view/don-hang/list.php');
            break;
        case 'list-detail-order':
            include('./view/don-hang/detail.php');
            break;
        case 'update-order':
            include('./view/don-hang/update.php');
            break;
        case 'edit-order':
            if (isset($_GET['id_don_hang']) && $_GET['id_don_hang']) {
                $id_don_hang = $_GET['id_don_hang'];
                $id_trang_thai_don = $_POST['id_trang_thai_don'];
                $ngay_update = date('Y-m-d');
                update_don_hang($id_don_hang, $id_trang_thai_don, $ngay_update);
                showSuccessToast("Cập nhập trạng thái thành công!");
                include('./view/don-hang/list.php');
            }
            break;
        case 'order-confirm':
            include('./view/don-hang/list-confirm.php');
            break;
        case 'history-mh':
            include('./view/user/history-mh.php');
            break;
        case 'detail-history-mh':
            include('./view/user/detail-history-mh.php');
            break;
        case 'reply-comment':
            if (isset($_POST['reply']) && $_POST['reply']) {
                $id_binh_luan = $_POST['id_binh_luan'];
                $content = $_POST['content'];
                $id_khach_hang = $_POST['id_khach_hang'];
                $ngay_reply = date('Y-m-d');
                insert_reply_binh_luan($id_binh_luan, $content, $id_khach_hang, $ngay_reply);
                showSuccessToast("Trả lời thành công!");
                include('./view/binh-luan/list-reply.php');
                break;
            }
            include('./view/binh-luan/reply.php');
            break;
        case 'list-reply':
            include('./view/binh-luan/list-reply.php');
            break;
        case 'delete-reply':
            if (isset($_GET['id'])) {
                $id_reply_comment = $_GET['id'];
                delete_reply_binh_luan($id_reply_comment);
                showSuccessToast("Xóa thành công!");
            }
            include('./view/binh-luan/list-reply.php');
            break;
        case 'update-reply':
            if (isset($_POST['reply']) && $_POST['reply']) {
                $id_reply_comment = $_POST['id_reply_comment'];
                $content = $_POST['content'];
                $ngay_reply = date('Y-m-d');
                update_binh_luan_by_id($id_reply_comment, $content, $ngay_reply);
                showSuccessToast("Cập nhập thành công !");
                include('./view/binh-luan/list-reply.php');
                break;
            }
            include('./view/binh-luan/update-reply.php');
            break;
        case 'list-danh-gia':
            include('./view/danh-gia/list.php');
            break;
        case 'detail-danh-gia':
            include('./view/danh-gia/detail.php');
            break;
        case 'delete-danhgia':
            if (isset($_GET['id']) && isset($_GET['idsp'])) {
                $id_danh_gia = $_GET['id'];
                $id_san_pham = $_GET['idsp'];
                delete_danh_gia($id_danh_gia, $id_san_pham);
                showSuccessToast("Xóa thành công !");
            }
            include('./view/danh-gia/detail.php');
            break;
        case 'thong-ke-dt':
            include('./view/thong-ke/doanhthu.php');
            break;
        case 'thong-ke-slspbd';
            include('./view/thong-ke/sl-sp-ban-duoc.php');
            break;
        case 'thong-ke-ttdh':
            include('./view/thong-ke/tinh-trang.php');
            break;
        case 'thong-ke-bxh':
            include('./view/thong-ke/bxh.php');
            break;
    }
} else {
    include_once './view/home.php';
}

include("./view/footer.php");
?>
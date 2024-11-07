<?php
include_once('./assets/model.php');
include_once("./global.php");
include_once("./view/header-site.php");

$listdanhmuc = loadall_danhmuc_trangchu();
$listdanhmuc_all = loai_select_all();
$newProductList = san_pham_select_moi_nhat();
$topViewProductList = san_pham_hot();
$san_pham_yeu_thich = san_pham_yeu_thich();
if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'home':
            include_once './view/homepage.php';
             break;
        //Đăng nhập
        case 'login':
            $kiem_tra_tai_khoan = "";
            if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $mat_khau = $_POST['mat_khau'];
                if (empty($ten_dang_nhap)) {
                    displayToastrMessageError("Tên người dùng không được bỏ trống!");
                }
                // Kiểm tra trường mật khẩu
                if (empty($mat_khau)) {
                    displayToastrMessageError("Mật khẩu không được bỏ trống");
                } elseif (strlen($mat_khau) < 6) {
                    displayToastrMessageError("Mật khẩu phải chứa ít nhất 6 ký tự!");
                }
                // Nếu cả hai trường đều không rỗng, tiến hành kiểm tra người dùng
                if (!empty($ten_dang_nhap) && !empty($mat_khau) && strlen($mat_khau) >= 6) {
                    // Tiếp tục kiểm tra người dùng
                    // kiểm tra người dùng ở đây
                    $checkuser = checkuser($ten_dang_nhap, $mat_khau);
                    if (is_array($checkuser)) {
                        $_SESSION['login'] = $checkuser;
                        extract($_SESSION['login']);
                        if ($kich_hoat == 0) {
                            displayToastrMessageWarning("Đăng nhập thất bại .Tài khoản của bạn đã bị khóa");
                        } else {
                            header('Location: index.php');
                            exit;
                        }
                    } else {
                        displayToastrMessageError("Tên đăng nhập hoặc mật khẩu không chính xác!");
                    }
                }
            }
            include_once './view/auth/login.php';
            break;
        //Đăng ký
        case 'register':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $mat_khau = $_POST['mat_khau'];
                $ho_ten = $_POST['ho_ten'];
                if (empty($ho_ten)) {
                    displayToastrMessageError("Họ tên không được bỏ trống!");
                }
                if (empty($ten_dang_nhap)) {
                    displayToastrMessageError("Tên người dùng không được bỏ trống!");
                } else {
                    $user_exists = kiem_tra_nguoi_dung_ton_tai($ten_dang_nhap);
                    if ($user_exists) {
                        displayToastrMessageError("Tên người dùng đã tồn tại!");
                    }
                }
                if (empty($mat_khau) || strlen($mat_khau) < 6) {
                    displayToastrMessageError("Mật khẩu không được bỏ trống và >= 6 kí tự!");
                }
                if (empty($email)) {
                    displayToastrMessageError("Vui lòng nhập email!");
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    displayToastrMessageError("Email không hợp lệ!");
                } else {
                    $email_exists = kiem_tra_email_ton_tai($email);
                    if ($email_exists) {
                        displayToastrMessageError("Email đã tồn tại!");
                    }
                }
                if (!empty($ten_dang_nhap) && !empty($mat_khau) && strlen($mat_khau) >= 6 && !empty($email) && !$user_exists && !$email_exists) {
                    insert_tai_khoan($ho_ten, $ten_dang_nhap, $mat_khau, $email);
                    displayToastrMessageSuccess("Đã đăng ký thành công. Vui lòng đăng nhập!");
                }
            }
            include_once "view/auth/register.php";
            break;
        case 'form_account':
            include_once 'view/auth/form_account.php';
            break;
        //Đăng xuất
        case 'logout':
            session_unset();
            header('Location: index.php');
            include_once 'view/auth/login.php';
            break;
        //Chỉnh sửa thông tin user
        case 'profile-edit':
            $error = [];
            if (isset($_POST['submit']) && ($_POST['submit'])) {
                $ho_ten = $_POST['ho_ten'];
                $email = $_POST['email'];
                $dia_chi = $_POST['dia_chi'];
                $phone = $_POST['phone'];
                if (empty($ho_ten)) {
                    $error[] = "sai";
                    displayToastrMessageError("Tên người dùng không được để trống");
                }
                if (empty($email)) {
                    $error[] = "sai";
                    displayToastrMessageError("Email không được để trống");
                } else if (!preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $email)) {
                    $error[] = "sai";
                    displayToastrMessageError(" Vui lòng nhập lại, email không đúng định dạng");
                }
                if (empty($dia_chi)) {
                    $error[] = "sai";
                    displayToastrMessageError(" Địa chỉ người dùng không được để trống");
                }
                if (empty($phone)) {
                    $error[] = "sai";
                    displayToastrMessageError("Số điện thoại không được để trống");
                } else if (!preg_match('/(84|0[3|5|7|8|9])+([0-9]{8})\b/', $phone)) {
                    $error[] = "sai";
                    displayToastrMessageError("Vui lòng nhập lại, số điện thoại không đúng định dạng");
                }
                if (!$error) {
                    $id_khach_hang = $_POST['id_khach_hang'];
                    $ho_ten = $_POST['ho_ten'];
                    $email = $_POST['email'];
                    $dia_chi = $_POST['dia_chi'];
                    $phone = $_POST['phone'];
                    $hinh_anh = $_FILES['hinh_anh']['name'];
                    $target_dir = "./uploads/";
                    $target_file = $target_dir . basename($_FILES["hinh_anh"]["name"]);
                    move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file);
                    account_update($id_khach_hang, $ho_ten, $email, $phone, $hinh_anh, $dia_chi, );
                    displayToastrMessageSuccess("Cập nhật thông tin thành công");
                    $_SESSION['login'] = taikhoan_select_by_id($id_khach_hang);
                    header('Location: index.php?act=profile-edit');
                    exit;
                }
            }
            include_once 'view/auth/profile-edit.php';
            break;
        //SẢN PHẨM
        case 'product':
            if (isset($_GET['category_id'])) {
                $category_id = $_GET['category_id'];
                if ($category_id == 1) {
                    $categoryDetail['ten_danh_muc'] = 'Tất cả';
                    $productList = san_pham_select_all_no_param();
                    include_once 'view/san-pham/product-list.php';
                } elseif ($category_id > 0) {
                    $categoryDetail = loai_select_by_id($category_id);
                    $productList = hang_hoa_select_all("", $category_id);
                    include_once './view/san-pham/product-list.php';
                }
            } else {
                include_once 'view/homepage.php';
            }
            break;
        //Sản phẩm chi tiết
        case 'product-detail':
            $id_san_pham = $_GET['id'];
            update_luot_xem($id_san_pham);
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id_san_pham = $_GET['id'];
                $productDetail = load_san_pham_id($id_san_pham);
                if ($productDetail) {
                    extract($productDetail);
                    $categoryDetail = loai_select_by_id($id_danh_muc); // Sửa tham số truyền vào từ $id thành $iddm
                    $productRelated = san_pham_lien_quan($id_san_pham, $id_danh_muc);
                    $khau_phan = loadall_khau_phan();
                    $do_an_them = loadall_do_an_them();
                    $chi_tiet_san_pham = select_chi_tiet_san_pham($id_san_pham);
                    // $list_comment = comment_select_all($id);
                    include_once 'view/san-pham/product-detail.php';
                } else {
                    include_once 'view/homepage.php';
                }
            } else {
                include_once 'view/homepage.php';
            }
            break;
        //Bình luận
        case 'add-comment':
            if (isset($_POST['submit']) && $_POST['submit']) {
                $id_khach_hang = $_POST['id_khach_hang'];
                $id_san_pham = $_POST['id_san_pham'];
                $noi_dung = $_POST['noi_dung'];
                $ngay_binh_luan = date('Y-m-d');
                insert_binh_luan($id_khach_hang, $id_san_pham, $noi_dung, $ngay_binh_luan);
                header("Location: index.php?act=product-detail&id=$id_san_pham");
            }
            break;
        //Tìm kiếm 
        case 'search':
            if (isset($_GET['keyword']) && $_GET['keyword'] != "") {
                $key = $_GET['keyword'];
                $productList = product_search_by_keyword($key);
                include('./view/san-pham/search.php');
                break;
            }
            include_once './view/homepage.php';
            break;
        //Thêm giỏ hàng
        case 'add-to-cart':
            if (isset($_POST['add-to-cart']) && $_POST['add-to-cart']) {
                $id_san_pham = $_POST['id_san_pham'];
                $id_khau_phan = $_POST['id_khau_phan'];
                $id_do_an_them = $_POST['id_do_an_them'];
                $id_san_pham= $_POST['id_san_pham'];
                $check_id = check_id_chi_tiet_san_pham($id_san_pham,$id_khau_phan, $id_do_an_them);
                if (empty($check_id)) {
                    $thongbao = "error";
                    header("Location: index.php?act=product-detail&id=$id_san_pham&thongbao=" . urlencode($thongbao));
                    exit();
                } else {
                    extract($check_id);
                    $so_luong = 1;
                    gio_hang_insert_and_update($id_khach_hang, $id_chi_tiet_san_pham, $so_luong);
                    $thongbao = "success";
                    header("Location: index.php?act=product-detail&id=$id_san_pham&thongbao=" . urlencode($thongbao));
                }
            }
            break;
        //View giỏ hàng
        case 'view-cart':
            if (!isset($_SESSION['login'])) {
                displayToastrMessageError("Bạn cần đăng nhập để sử dụng chức năng giỏ hàng!");
                include_once 'view/auth/login.php';
                break;
            } else
                $id_khach_hang = $_SESSION['login']['id_khach_hang'];
            $gio_hang_all = select_gio_hang_by_id($id_khach_hang);
            include_once 'view/cart/view-cart.php';
            break;
        //Xoá giỏ hàng
        case 'delete-cart':
            if (isset($_GET['id-cart'])) {
                // Delete 1 item cart
                $id_chi_tiet_san_pham = $_GET['id-cart'];
                delete_gio_hang_by_id($id_chi_tiet_san_pham);
            } else {
                // Delete all cart
                $id_khach_hang = $_SESSION['login']['id_khach_hang'];
                delete_gio_hang_all($id_khach_hang);
            }
            header('Location: index.php?act=view-cart');
            break;
        //Tăng giảm số lượng sản phẩm ở giỏ hàng
        case 'fix-cart':
            if (isset($_POST['fix_tang']) && $_POST['fix_tang']) {
                $id_gio_hang = $_POST['id_gio_hang'];
                tang_so_luong_gio_hang($id_gio_hang);
            }
            if (isset($_POST['fix_giam']) && $_POST['fix_giam']) {
                $id_gio_hang = $_POST['id_gio_hang'];
                giam_so_luong_gio_hang($id_gio_hang);
            }
            header('Location: index.php?act=view-cart');
            break;
        //Form mua hàng
        case 'checkout':
            $id_khach_hang = $_SESSION['login']['id_khach_hang'];
            $gio_hang_all = select_gio_hang_by_id($id_khach_hang);
            include_once './view/cart/checkout.php';
            break;
        //Thông tin mua hàng
        case 'complete':
            $id_khach_hang = $_SESSION['login']['id_khach_hang'];
            if (isset($_POST['agree-to-order']) && $_POST['agree-to-order']) {
                $phone = $_POST['phone'];
                $dia_chi_giao = $_POST['dia_chi_giao'];
                $ngay_tao = date('Y-m-d');
                $payment_method = $_POST['payment_method'];
                $note = $_POST['note'];
                $id_trang_thai_don = 0;
                $id_ma_giam_gia = $_POST['id_ma_giam_gia'];
                //Cập nhập só lượng mã giảm giá
                if(!empty($id_ma_giam_gia)){
                    update_so_luong_giam_gia($id_ma_giam_gia);
                }
                if (empty($phone)) {
                    displayToastrMessageError("Vui lòng không để trống số điện thoại !");
                }
                if (empty($dia_chi_giao)) {
                    displayToastrMessageError("Vui lòng không để trống địa chỉ giao !");
                }
                if (empty($note)) {
                    displayToastrMessageError("Vui lòng không để trống ghi chú !");
                }
                if (!empty($phone) && !empty($dia_chi_giao) && !empty($note)) {
                    $id_don_hang = insert_don_hang($id_khach_hang, $phone, $dia_chi_giao, $id_trang_thai_don, $ngay_tao, $payment_method, $note);
                    $id_chi_tiet_san_pham = $_POST['id_chi_tiet_san_pham'];
                    $so_luong = $_POST['so_luong'];
                    $tong_gia_tien = $_POST['tong_gia_tien'];
                    if (isset($_POST['id_chi_tiet_san_pham']) && isset($_POST['so_luong'])) {
                        $id_chi_tiet_san_pham_list = $_POST['id_chi_tiet_san_pham'];
                        $so_luong_list = $_POST['so_luong'];
                        $tong_gia_tien = $_POST['tong_gia_tien'];

                        foreach ($id_chi_tiet_san_pham_list as $index => $id_chi_tiet_san_pham) {
                            $so_luong = $so_luong_list[$index];
                            $tong_gia_tien = $_POST['tong_gia_tien'];
                            insert_chi_tiet_don_hang($id_don_hang, $id_chi_tiet_san_pham, $so_luong, $tong_gia_tien);
                        }
                        if ($payment_method == 2) {
                            include_once('./payment.php');
                            break;
                        }
                    }
                } else {
                    $id_khach_hang = $_SESSION['login']['id_khach_hang'];
                    $gio_hang_all = select_gio_hang_by_id($id_khach_hang);
                    include_once './view/cart/checkout.php';
                    break;
                }
            }
            include_once './view/cart/complete.php';
            break;
        //Lịch sử mua hàng
        case 'order-history':
            include_once './view/auth/order-history.php';
            break;
        //Chi tiết đơn hàng
        case 'detail-don-hang':
            include_once './view/auth/detail-don-hang.php';
            break;
        //Hủy đơn hàng
        case 'huy-don-hang':
            if (isset($_GET['id-don-hang']) && $_GET['id-don-hang']) {
                $id_don_hang = $_GET['id-don-hang'];
                huy_don_hang($id_don_hang);
                displayToastrMessageSuccess("Bạn đã hủy thành công!");
            }
            include_once './view/auth/order-history.php';
            break;
        //Đánh giá sản phẩm
        case 'feedback-order':
            if (isset($_POST['submit_danh_gia']) && $_POST['submit_danh_gia']) {
                $id_khach_hang = $_POST['id_khach_hang'];
                $id_san_pham = $_POST['id_san_pham'];
                $danh_gia = $_POST['danh_gia'];
                $noi_dung = $_POST['noi_dung'];
                $ngay_danh_gia = date('Y-m-d');
                insert_danh_gia($id_khach_hang, $id_san_pham, $danh_gia, $noi_dung, $ngay_danh_gia);
                displayToastrMessageSuccess("Bạn đã đánh giá thành công!");
            }
            include_once './view/auth/feedback-order.php';
            break;
        //Lấy lại mật khẩu user
        case 'forgot-password':
            if (isset($_POST['submit'])) {
                $email = isset($_POST['email']) ? $_POST['email'] : "";
                // Nếu không có lỗi
                if (empty($email)) {
                    displayToastrMessageError("Vui lòng nhập email!");
                }
                if (!empty($email)) {
                    $email = $_POST['email'];
                    $resetCode = substr(md5(rand(10000, 99999)), 0, 8); // Tạo mã reset ngẫu nhiên
                    $emailSent = user_send_reset_password($email, $resetCode);
                    if ($emailSent) {
                        // Lưu thông tin trong phiên và chuyển hướng
                        $_SESSION['email'] = $email;
                        $_SESSION['reset_code'] = $resetCode;
                        header('Location: index.php?act=reset-code');
                        exit();
                    } else {
                        displayToastrMessageError("Lỗi gửi email!");
                    }
                }
            }
            include_once './view/auth/forgot-password.php';
            break;
        //So sánh code confirm
        case 'reset-code':
            if (isset($_POST['submit']) && ($_POST['submit'])) {
                $code = isset($_POST['resetCode']) ? $_POST['resetCode'] : "";
                if (empty($code)) {
                    displayToastrMessageError("* Mã xác nhận không được để trống");
                } else if ($code != $_SESSION['reset_code']) {
                    displayToastrMessageWarning("Mã xác nhận không chính xác !");
                }
                if (!empty($code) && ($code == $_SESSION['reset_code'])) {
                    header('Location: index.php?act=reset-password');
                    exit();
                }
            }
            include_once './view/auth/reset-code-form.php';
            break;
        //Đặt lại mật khẩu
        case 'reset-password':
            if (isset($_POST['submit']) && ($_POST['submit'])) {
                $email = $_SESSION['email'];
                $mat_khau = $_POST['newPassword'];
                if (empty($email)) {
                    displayToastrMessageError("Email không được để trống");
                }
                if (empty($mat_khau)) {
                    displayToastrMessageError("Mật khẩu không được để trống");
                }
                if (!empty($email) && !empty($mat_khau)) {
                    update_pass($email, $mat_khau);
                    unset($_SESSION['email']);
                    unset($_SESSION['reset_code']);
                    displayToastrMessageSuccess("Thay mật khẩu thành công!");
                    include_once './view/auth/login.php';
                    break;
                }
            }
            include_once 'view/auth/reset-password-form.php';
            break;
        //Xử lý thanh toán ở lịch sử
        case 'thanh-toan':
            include_once('./payment.php');
            break;
    }
} else {
    include_once './view/homepage.php';
}
include_once 'view/footer-site.php';
?>
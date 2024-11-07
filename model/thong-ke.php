<?php
include_once("pdo.php");
function thong_ke_doanh_thu_dm()
{
    $sql = "SELECT danh_muc.ten_danh_muc , SUM(san_pham.price * chi_tiet_don_hang.so_luong) as total_dh FROM `chi_tiet_don_hang` JOIN chi_tiet_san_pham ON chi_tiet_don_hang.id_chi_tiet_san_pham = chi_tiet_san_pham.id_chi_tiet_san_pham JOIN san_pham ON san_pham.id_san_pham = chi_tiet_san_pham.id_san_pham JOIN don_hang ON don_hang.id_don_hang = chi_tiet_don_hang.id_don_hang JOIN danh_muc ON danh_muc.id_danh_muc = san_pham.id_danh_muc WHERE don_hang.id_trang_thai_don = 5 GROUP BY danh_muc.ten_danh_muc";
    return pdo_query($sql);
}
function thong_ke_doanh_thu_kh()
{
    $sql = "SELECT user.ho_ten,SUM(san_pham.price * chi_tiet_don_hang.so_luong) as total_dh FROM `chi_tiet_don_hang` JOIN don_hang ON don_hang.id_don_hang = chi_tiet_don_hang.id_don_hang JOIN chi_tiet_san_pham ON chi_tiet_san_pham.id_chi_tiet_san_pham = chi_tiet_don_hang.id_chi_tiet_san_pham JOIN san_pham ON san_pham.id_san_pham = chi_tiet_san_pham.id_san_pham JOIN user ON user.id_khach_hang = don_hang.id_khach_hang WHERE don_hang.id_trang_thai_don =5 GROUP BY user.ho_ten";
    return pdo_query($sql);
}
function thong_ke_bieu_do()
{
    $sql = "SELECT user.ho_ten, danh_muc.ten_danh_muc, don_hang.ngay_tao, SUM( chi_tiet_don_hang.so_luong * san_pham.price ) AS total_dh FROM don_hang JOIN chi_tiet_don_hang ON don_hang.id_don_hang = chi_tiet_don_hang.id_don_hang JOIN chi_tiet_san_pham ON chi_tiet_don_hang.id_chi_tiet_san_pham = chi_tiet_san_pham.id_chi_tiet_san_pham JOIN san_pham ON chi_tiet_san_pham.id_san_pham = san_pham.id_san_pham JOIN danh_muc ON san_pham.id_danh_muc= danh_muc.id_danh_muc JOIN user ON don_hang.id_khach_hang = user.id_khach_hang GROUP BY user.ho_ten, danh_muc.ten_danh_muc, don_hang.ngay_tao";
    return pdo_query($sql);
}
function don_hang_thong_ke_home()
{
    $sql = "SELECT SUM(chi_tiet_don_hang.so_luong) as da_ban, SUM(san_pham.price * chi_tiet_don_hang.so_luong) as total_price FROM `chi_tiet_don_hang` JOIN chi_tiet_san_pham ON chi_tiet_san_pham.id_chi_tiet_san_pham = chi_tiet_don_hang.id_chi_tiet_san_pham JOIN san_pham ON san_pham.id_san_pham = chi_tiet_san_pham.id_san_pham JOIN don_hang ON chi_tiet_don_hang.id_don_hang = don_hang.id_don_hang WHERE don_hang.id_trang_thai_don=5";
    return pdo_query_one($sql);
}
function thong_ke_da_ban()
{
    $sql = "SELECT san_pham.ten_san_pham, don_hang.ngay_tao, SUM(chi_tiet_don_hang.so_luong) AS so_luong FROM `san_pham` JOIN chi_tiet_san_pham ON san_pham.id_san_pham = chi_tiet_san_pham.id_san_pham JOIN chi_tiet_don_hang ON chi_tiet_san_pham.id_chi_tiet_san_pham = chi_tiet_don_hang.id_chi_tiet_san_pham JOIN don_hang ON chi_tiet_don_hang.id_don_hang = don_hang.id_don_hang WHERE don_hang.id_trang_thai_don = 5 GROUP BY san_pham.ten_san_pham, don_hang.ngay_tao";
    return pdo_query($sql);
}
function thong_ke_tinh_trang()
{
    $sql = "SELECT (SELECT COUNT(id_don_hang) FROM don_hang WHERE id_trang_thai_don = '1') AS so_don_hang_cho_xac_nhan, (SELECT COUNT(id_don_hang) FROM don_hang WHERE id_trang_thai_don = '2') AS so_don_hang_da_xac_nhan, (SELECT COUNT(id_don_hang) FROM don_hang WHERE id_trang_thai_don = '3') AS so_don_hang_dang_xu_ly, (SELECT COUNT(id_don_hang) FROM don_hang WHERE id_trang_thai_don = '5') AS so_don_hang_da_giao_hang, (SELECT COUNT(id_don_hang) FROM don_hang WHERE id_trang_thai_don = '6') AS so_don_hang_da_huy";
    return pdo_query_one($sql);
}
function luot_mua_sp(){
    $sql ="SELECT san_pham.ten_san_pham , SUM(chi_tiet_don_hang.so_luong) AS so_luot FROM `chi_tiet_don_hang`JOIN chi_tiet_san_pham ON chi_tiet_san_pham.id_chi_tiet_san_pham = chi_tiet_don_hang.id_chi_tiet_san_pham JOIN san_pham ON san_pham.id_san_pham = chi_tiet_san_pham.id_san_pham GROUP BY san_pham.ten_san_pham ORDER BY so_luot DESC";
    return pdo_query($sql);
}
function don_hang_count(){
    $sql ="SELECT MAX(id_don_hang) as don_dat_hang FROM `don_hang`";
    return pdo_query_one($sql);
}
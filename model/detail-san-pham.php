<?php
include_once("pdo.php");
function insert_chi_tiet_sp($so_luong, $ngay_nhap, $id_san_pham, $id_khau_phan, $id_do_an_them)
{
    $sql = "INSERT INTO chi_tiet_san_pham(so_luong,ngay_nhap,id_san_pham,id_khau_phan,id_do_an_them) VALUES (?,?,?,?,?)";
    pdo_execute($sql, $so_luong, $ngay_nhap, $id_san_pham, $id_khau_phan, $id_do_an_them);
}
function select_chi_tiet_san_pham($id_san_pham)
{
    $sql = "SELECT chi_tiet_san_pham.id_khau_phan,chi_tiet_san_pham.id_do_an_them,chi_tiet_san_pham.id_san_pham, chi_tiet_san_pham.id_chi_tiet_san_pham, chi_tiet_san_pham.so_luong,chi_tiet_san_pham.display_detail_san_pham,san_pham.ten_san_pham AS ten_san_pham,khau_phan.khau_phan,do_an_them.do_an_them FROM chi_tiet_san_pham JOIN san_pham ON san_pham.id_san_pham = chi_tiet_san_pham.id_san_pham JOIN khau_phan ON khau_phan.id_khau_phan=chi_tiet_san_pham.id_khau_phan JOIN do_an_them ON do_an_them.id_do_an_them= chi_tiet_san_pham.id_do_an_them WHERE chi_tiet_san_pham.id_san_pham = ?";
    return pdo_query($sql, $id_san_pham);
}
function delete_chi_tiet_san_pham($id_chi_tiet_san_pham)
{
    $sql = "DELETE FROM chi_tiet_san_pham WHERE id_chi_tiet_san_pham = ?";
    pdo_execute($sql, $id_chi_tiet_san_pham);
}
function select_chi_tiet_san_pham_by_id($id_chi_tiet_san_pham)
{
    $sql = "SELECT * FROM chi_tiet_san_pham WHERE id_chi_tiet_san_pham = ?";
    return pdo_query_one($sql, $id_chi_tiet_san_pham);
}
function update_chi_tiet_san_pham($id_chi_tiet_san_pham, $so_luong, $id_khau_phan, $id_do_an_them)
{
    // Sửa câu lệnh SQL để đúng cú pháp
    $sql = "UPDATE chi_tiet_san_pham SET so_luong = ?, id_khau_phan = ?, id_do_an_them = ? WHERE id_chi_tiet_san_pham = ?";
    pdo_execute($sql, $so_luong, $id_khau_phan, $id_do_an_them, $id_chi_tiet_san_pham);
}
function check_id_chi_tiet_san_pham($id_san_pham,$id_khau_phan, $id_do_an_them)
{
    $sql = "SELECT * FROM chi_tiet_san_pham WHERE id_san_pham= ? AND id_khau_phan = ? AND id_do_an_them = ? ";
    return pdo_query_one($sql,$id_san_pham, $id_khau_phan, $id_do_an_them);
}
function update_so_luong($id_chi_tiet_san_pham)
{
    $kiem_tra = kiem_tra_so_luong($id_chi_tiet_san_pham);
    if ($kiem_tra['so_luong'] == 1) {
        $sql = "UPDATE chi_tiet_san_pham SET so_luong = 0, display_detail_san_pham = 0 WHERE id_chi_tiet_san_pham=?";
        pdo_execute($sql, $id_chi_tiet_san_pham);
    } else if ($kiem_tra['so_luong'] > 1) {
        $sql = "UPDATE chi_tiet_san_pham SET so_luong = so_luong - 1 WHERE id_chi_tiet_san_pham=?";
        pdo_execute($sql, $id_chi_tiet_san_pham);
    }
}
function kiem_tra_so_luong($id_chi_tiet_san_pham)
{
    $sql = "SELECT so_luong FROM chi_tiet_san_pham WHERE id_chi_tiet_san_pham = ?";
    return pdo_query_one($sql, $id_chi_tiet_san_pham);
}
?>
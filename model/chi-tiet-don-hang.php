<?php 
include_once ("pdo.php");
function insert_chi_tiet_don_hang($id_don_hang,$id_chi_tiet_san_pham,$so_luong,$tong_gia_tien){
    $sql= "INSERT INTO chi_tiet_don_hang(id_don_hang,id_chi_tiet_san_pham,so_luong,tong_gia_tien) VALUES (?,?,?,?)";
    pdo_execute($sql,$id_don_hang,$id_chi_tiet_san_pham,$so_luong,$tong_gia_tien);
}
function select_chi_tiet_don_hang($id_don_hang){
$sql ="SELECT chi_tiet_don_hang.*,san_pham.ten_san_pham,san_pham.hinh_anh,san_pham.price,khau_phan.khau_phan,don_hang.id_trang_thai_don,do_an_them.do_an_them FROM `chi_tiet_don_hang` JOIN chi_tiet_san_pham ON chi_tiet_don_hang.id_chi_tiet_san_pham = chi_tiet_san_pham.id_chi_tiet_san_pham JOIN don_hang ON chi_tiet_don_hang.id_don_hang = don_hang.id_don_hang JOIN san_pham ON chi_tiet_san_pham.id_san_pham = san_pham.id_san_pham JOIN khau_phan ON chi_tiet_san_pham.id_khau_phan = khau_phan.id_khau_phan JOIN do_an_them ON do_an_them.id_do_an_them= chi_tiet_san_pham.id_do_an_them WHERE chi_tiet_don_hang.id_don_hang = ?";
return pdo_query($sql,$id_don_hang);
}
function tong_tien($id_don_hang){
    $sql="SELECT DISTINCT tong_gia_tien FROM chi_tiet_don_hang WHERE id_don_hang= ?";
    return pdo_query_one($sql,$id_don_hang);
}
function chi_tiet_don_hang_by_id($id_chi_tiet_don_hang){
    $sql ="SELECT chi_tiet_don_hang.*,san_pham.hinh_anh,chi_tiet_san_pham.id_san_pham,san_pham.ten_san_pham,khau_phan.khau_phan,do_an_them.do_an_them FROM chi_tiet_don_hang JOIN chi_tiet_san_pham ON chi_tiet_don_hang.id_chi_tiet_san_pham = chi_tiet_san_pham.id_chi_tiet_san_pham JOIN san_pham ON san_pham.id_san_pham = chi_tiet_san_pham.id_san_pham JOIN khau_phan ON khau_phan.id_khau_phan = chi_tiet_san_pham .id_khau_phan JOIN do_an_them ON do_an_them.id_do_an_them = chi_tiet_san_pham.id_do_an_them WHERE chi_tiet_don_hang.id_chi_tiet_don_hang = ?";
    return pdo_query_one($sql,$id_chi_tiet_don_hang);
}
?>
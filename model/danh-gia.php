<?php 
include_once ("pdo.php");
function insert_danh_gia($id_khach_hang,$id_san_pham,$danh_gia,$noi_dung,$ngay_danh_gia){
    $sql = "INSERT INTO danh_gia (id_khach_hang,id_san_pham,danh_gia,noi_dung,ngay_danh_gia) VALUES (?,?,?,?,?)";
    pdo_execute($sql,$id_khach_hang,$id_san_pham,$danh_gia,$noi_dung,$ngay_danh_gia);
}
function kiem_tra_danh_gia($id_khach_hang,$id_san_pham){
    $sql = "SELECT * FROM danh_gia WHERE id_khach_hang=? and id_san_pham = ? ";
    return pdo_query($sql,$id_khach_hang,$id_san_pham);
}
function danh_gia_select_thong_ke_all(){
    $sql = "SELECT danh_gia.id_san_pham,MAX(danh_gia.ngay_danh_gia) AS ngay_moi ,MIN(danh_gia.ngay_danh_gia) AS ngay_cu, san_pham.ten_san_pham,SUM(1) AS tong_danh_gia ,(SELECT AVG(danh_gia.danh_gia) FROM danh_gia WHERE danh_gia.id_san_pham = danh_gia.id_san_pham GROUP BY danh_gia.id_san_pham) as trung_binh FROM danh_gia JOIN san_pham ON san_pham.id_san_pham = danh_gia.id_san_pham GROUP BY san_pham.ten_san_pham, danh_gia.id_san_pham";
    return pdo_query($sql);
}
function danh_gia_select_by_id($id_san_pham){
    $sql ="SELECT danh_gia.id_danh_gia,danh_gia.id_san_pham,danh_gia.noi_dung,user.ho_ten,user.hinh_anh,user.email,user.ten_dang_nhap,danh_gia.danh_gia,danh_gia.ngay_danh_gia,danh_gia.display_danh_gia FROM danh_gia JOIN user ON danh_gia.id_khach_hang= user.id_khach_hang WHERE danh_gia.id_san_pham= ?";
    return pdo_query($sql,$id_san_pham);
}
function delete_danh_gia($id_danh_gia,$id_san_pham){
    $sql = "UPDATE danh_gia SET display_danh_gia = 0 WHERE id_danh_gia = ? AND id_san_pham = ?";
    pdo_execute($sql,$id_danh_gia,$id_san_pham);
}
function trung_binh_danh_gia($id_san_pham){
    $sql ="SELECT AVG(danh_gia.danh_gia) AS trung_binh_danh_gia ,SUM(1) as tong_danh_gia FROM danh_gia WHERE danh_gia.id_san_pham = ? GROUP BY danh_gia.id_san_pham";
    return pdo_query_one($sql,$id_san_pham);
}
?>
<?php 
require_once("pdo.php");

function them_moi_san_pham($ten_san_pham,$price,$mo_ta,$hinh_anh,$luot_xem,$ngay_nhap,$id_danh_muc){
    $sql="INSERT INTO san_pham(ten_san_pham,price,mo_ta,hinh_anh,luot_xem,ngay_nhap,id_danh_muc) VALUES(?,?,?,?,?,?,?)";
    pdo_execute($sql,$ten_san_pham,$price,$mo_ta,$hinh_anh,$luot_xem,$ngay_nhap,$id_danh_muc);
}
function loadall_san_pham(){
    $sql="SELECT san_pham.id_san_pham, san_pham.ten_san_pham,san_pham.price,san_pham.mo_ta,san_pham.hinh_anh,san_pham.luot_xem,san_pham.display_san_pham,san_pham.ngay_nhap,danh_muc.ten_danh_muc AS ten_danh_muc FROM san_pham JOIN danh_muc ON san_pham.id_danh_muc = danh_muc.id_danh_muc";
    return pdo_query($sql);
}
function xoa_san_pham($id_san_pham){
    $sql="DELETE FROM san_pham WHERE id_san_pham=?";
    pdo_query($sql,$id_san_pham);
}
function load_san_pham_id($id_san_pham){
    $sql= "SELECT * FROM san_pham WHERE id_san_pham = ?";
   return pdo_query_one($sql,$id_san_pham);
}
function update_san_pham($id_san_pham, $ten_san_pham, $price, $mo_ta, $hinh_anh, $id_danh_muc) {
    if ($hinh_anh != "") {
        $sql = "UPDATE san_pham SET ten_san_pham=?, price=?, mo_ta=?, hinh_anh=?, id_danh_muc=? WHERE id_san_pham=?";
        pdo_execute($sql, $ten_san_pham, $price, $mo_ta, $hinh_anh, $id_danh_muc, $id_san_pham);
    } else {
        $sql = "UPDATE san_pham SET ten_san_pham=?, price=?, mo_ta=?, id_danh_muc=? WHERE id_san_pham=?";
        pdo_execute($sql, $ten_san_pham, $price, $mo_ta, $id_danh_muc, $id_san_pham);
    }
}
function san_pham_select_moi_nhat(){
    $sql = "SELECT  san_pham.id_san_pham,san_pham.ten_san_pham,san_pham.hinh_anh,san_pham.price,danh_muc.ten_danh_muc FROM san_pham
    JOIN danh_muc ON san_pham.id_danh_muc = danh_muc.id_danh_muc ORDER BY san_pham.id_san_pham DESC LIMIT 12";
    return pdo_query($sql);
}

function san_pham_hot(){
    $sql ="SELECT san_pham.id_san_pham,san_pham.ten_san_pham,san_pham.hinh_anh,san_pham.luot_xem,san_pham.price,danh_muc.ten_danh_muc FROM san_pham
    JOIN danh_muc ON san_pham.id_danh_muc = danh_muc.id_danh_muc ORDER BY san_pham.luot_xem DESC LIMIT 12";
    return pdo_query($sql);
}
function san_pham_yeu_thich(){
    $sql ="SELECT san_pham.ten_san_pham,san_pham.id_san_pham,san_pham.hinh_anh,san_pham.price,danh_muc.ten_danh_muc ,SUM(chi_tiet_don_hang.so_luong) AS so_luot FROM `chi_tiet_don_hang`JOIN chi_tiet_san_pham ON chi_tiet_san_pham.id_chi_tiet_san_pham = chi_tiet_don_hang.id_chi_tiet_san_pham JOIN san_pham ON san_pham.id_san_pham = chi_tiet_san_pham.id_san_pham  JOIN danh_muc ON san_pham.id_danh_muc = danh_muc.id_danh_muc GROUP BY san_pham.ten_san_pham,san_pham.id_san_pham,san_pham.hinh_anh,san_pham.price,danh_muc.ten_danh_muc ORDER BY so_luot DESC LIMIT 12";
    return pdo_query($sql);
}
function san_pham_lien_quan($id_san_pham, $id_danh_muc)
{
    $sql = "SELECT san_pham.id_danh_muc,san_pham.id_san_pham, san_pham.ten_san_pham,san_pham.price,san_pham.mo_ta,san_pham.hinh_anh,san_pham.luot_xem,san_pham.display_san_pham,san_pham.ngay_nhap,danh_muc.ten_danh_muc AS ten_danh_muc FROM san_pham JOIN danh_muc ON san_pham.id_danh_muc = danh_muc.id_danh_muc WHERE san_pham.id_danh_muc = ? AND san_pham.id_san_pham <> ? LIMIT 0,6";
    return  pdo_query($sql,$id_danh_muc,$id_san_pham);
}
function san_pham_select_all_no_param()
{
    $sql = "SELECT * FROM san_pham ORDER BY id_san_pham DESC";
    return pdo_query($sql);
}
function hang_hoa_select_all($keyword, $category_id)
{
    $sql = "SELECT * FROM san_pham WHERE 1";
    if ($keyword != "") {
        $sql .= " AND ten_san_pham LIKE '%" . $keyword . "%'";
    }
    if ($category_id > 0) {
        $sql .= " AND id_danh_muc = '" . $category_id . "'";
    }
    $sql .= " ORDER BY id_san_pham DESC";
    return pdo_query($sql);
}
function product_search_by_keyword($keyword){
    $sql = "SELECT san_pham.id_danh_muc,san_pham.id_san_pham, san_pham.ten_san_pham,san_pham.price,san_pham.mo_ta,san_pham.hinh_anh,san_pham.luot_xem,san_pham.display_san_pham,san_pham.ngay_nhap,danh_muc.ten_danh_muc AS ten_danh_muc FROM san_pham JOIN danh_muc ON san_pham.id_danh_muc = danh_muc.id_danh_muc ";
    if($keyword != ""){
        $sql.= "WHERE ten_san_pham LIKE '%".$keyword."%'";
    }
    $sql .=" ORDER BY id_san_pham DESC";
    // echo $sql;
    // die;
    return pdo_query($sql);
}
function update_luot_xem($id_san_pham){
    $sql = "UPDATE san_pham SET luot_xem = luot_xem + 1 WHERE id_san_pham =?";
    pdo_execute($sql,$id_san_pham);
}

?>
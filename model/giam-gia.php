<?php 
include_once ("pdo.php");
function insert_giam_gia($code,$giam_gia,$so_luong,$ngay_het_han){
    $sql ="INSERT INTO ma_giam_gia (code,giam_gia,so_luong,ngay_het_han) VALUES (?,?,?,?)";
    pdo_execute($sql,$code,$giam_gia,$so_luong,$ngay_het_han);
}
function select_giam_gia(){
    $sql = "SELECT * FROM ma_giam_gia ORDER BY id_ma_giam_gia DESC";
    return pdo_query($sql);
}
function delete_giam_gia($id_ma_giam_gia){
    $sql ="DELETE FROM ma_giam_gia WHERE id_ma_giam_gia= ?";
    pdo_execute($sql,$id_ma_giam_gia);
}
function giam_gia_select_by($id_ma_giam_gia){
    $sql ="SELECT * FROM ma_giam_gia WHERE id_ma_giam_gia= ?";
    return pdo_query_one($sql,$id_ma_giam_gia);
}
function update_ma_giam_gia($id_ma_giam_gia,$code,$giam_gia,$so_luong,$ngay_het_han){
    $sql ="UPDATE ma_giam_gia SET code=?, giam_gia=?,so_luong=?,ngay_het_han=? WHERE id_ma_giam_gia =?";
    pdo_execute($sql,$code,$giam_gia,$so_luong,$ngay_het_han,$id_ma_giam_gia);
}
function update_so_luong_giam_gia($id_ma_giam_gia)
{
    $kiem_tra = kiem_tra_so_luong_giam_gia($id_ma_giam_gia);
    if ($kiem_tra['so_luong'] == 1) {
        $sql = "UPDATE ma_giam_gia SET so_luong = 0, display_gg = 0 WHERE id_ma_giam_gia=?";
        pdo_execute($sql, $id_ma_giam_gia);
    } else if ($kiem_tra['so_luong'] > 1) {
        $sql = "UPDATE ma_giam_gia SET so_luong = so_luong - 1 WHERE id_ma_giam_gia=?";
        pdo_execute($sql, $id_ma_giam_gia);
    }
}
function kiem_tra_so_luong_giam_gia($id_ma_giam_gia)
{
    $sql = "SELECT so_luong FROM ma_giam_gia WHERE id_ma_giam_gia = ?";
    return pdo_query_one($sql, $id_ma_giam_gia);
}
?>
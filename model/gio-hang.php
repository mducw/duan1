<?php 
  include_once ("pdo.php");
  function gio_hang_insert_and_update($id_khach_hang, $id_chi_tiet_san_pham, $so_luong)
{
    if (gio_hang_exist($id_chi_tiet_san_pham)) {
        gio_hang_update_so_luong($so_luong, $id_chi_tiet_san_pham, $id_khach_hang);
    } else {
      $sql ="INSERT INTO gio_hang (id_khach_hang,id_chi_tiet_san_pham,so_luong) VALUES (?,?,?)";
      pdo_execute($sql,$id_khach_hang,$id_chi_tiet_san_pham,$so_luong);
    }
  }
  function insert_gio_hang($id_khach_hang,$id_chi_tiet_san_pham,$so_luong){
    $sql ="INSERT INTO gio_hang (id_khach_hang,id_chi_tiet_san_pham,so_luong) VALUES (?,?,?)";
    pdo_execute($sql,$id_khach_hang,$id_chi_tiet_san_pham,$so_luong);
  }
  function select_gio_hang_by_id($id_khach_hang){
    $sql = "SELECT gio_hang.id_gio_hang,gio_hang.id_chi_tiet_san_pham,gio_hang.so_luong,san_pham.hinh_anh,san_pham.ten_san_pham,san_pham.price AS don_gia,(san_pham.price * gio_hang.so_luong) AS price ,do_an_them.do_an_them,khau_phan.khau_phan FROM gio_hang JOIN chi_tiet_san_pham ON gio_hang.id_chi_tiet_san_pham = chi_tiet_san_pham.id_chi_tiet_san_pham JOIN san_pham ON san_pham.id_san_pham = chi_tiet_san_pham.id_san_pham JOIN do_an_them ON do_an_them.id_do_an_them = chi_tiet_san_pham.id_do_an_them JOIN khau_phan ON khau_phan.id_khau_phan = chi_tiet_san_pham.id_khau_phan WHERE gio_hang.id_khach_hang = ?";
    return pdo_query($sql,$id_khach_hang);
  }
  function delete_gio_hang_by_id($id_chi_tiet_san_pham){
    $sql ="DELETE FROM gio_hang WHERE id_chi_tiet_san_pham =?";
    pdo_execute($sql,$id_chi_tiet_san_pham);
  }
  function delete_gio_hang_all($id_khach_hang){
    $sql ="DELETE FROM gio_hang WHERE id_khach_hang =?";
    pdo_execute($sql,$id_khach_hang);
  }
  function dem_gio_hang($id_khach_hang){
    $sql ="SELECT DISTINCT id_chi_tiet_san_pham FROM gio_hang WHERE id_khach_hang =?";
    return pdo_query($sql,$id_khach_hang);
  }
  function gio_hang_exist($id_chi_tiet_san_pham)
{
    $sql = "SELECT count(*) FROM gio_hang WHERE id_chi_tiet_san_pham=?";
    return pdo_query_value($sql, $id_chi_tiet_san_pham) > 0;
}
function gio_hang_update_so_luong($so_luong, $id_chi_tiet_san_pham, $id_khach_hang)
{
    $sql = "UPDATE gio_hang SET so_luong=so_luong+? WHERE id_chi_tiet_san_pham=? AND id_khach_hang = ?";
    pdo_execute($sql, $so_luong, $id_chi_tiet_san_pham, $id_khach_hang);
}
function tang_so_luong_gio_hang($id_gio_hang){
  $sql ="UPDATE gio_hang SET so_luong= so_luong + 1  WHERE id_gio_hang=?";
  pdo_execute($sql,$id_gio_hang);
}
function giam_so_luong_gio_hang($id_gio_hang){
  $sql ="UPDATE gio_hang SET so_luong= so_luong -1  WHERE id_gio_hang=?";
  pdo_execute($sql,$id_gio_hang);
}
function sum_so_luong_gio_hang($id_khach_hang){
  $sql ="SELECT SUM(so_luong) FROM gio_hang WHERE id_khach_hang =?";
  return pdo_query_one($sql,$id_khach_hang);
}
?>
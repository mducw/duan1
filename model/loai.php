<?php
require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $ten_danh_muc là tên loại
 * @throws PDOException lỗi thêm mới
 */
function loai_insert($ten_danh_muc,$anh_danh_muc)
{
    $sql = "INSERT INTO danh_muc (ten_danh_muc,anh_danh_muc) VALUES(?,?)";
    pdo_execute($sql, $ten_danh_muc,$anh_danh_muc);
}
/**
 * Cập nhật tên loại
 * @param int $id_danh_muc là mã loại cần cập nhật
 * @param String $ten_danh_muc là tên loại mới
 * @throws PDOException lỗi cập nhật
 */
function loai_update($id_danh_muc, $ten_danh_muc,$anh_danh_muc)
{
    $sql = "UPDATE danh_muc SET ten_danh_muc=?,anh_danh_muc = ? WHERE id_danh_muc=?";
    pdo_execute($sql, $ten_danh_muc,$anh_danh_muc, $id_danh_muc);
}
/**
 * Xóa một hoặc nhiều loại
 * @param mix $id_danh_muc là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function loai_delete($id_danh_muc)
{
    $sql = "DELETE FROM danh_muc WHERE id_danh_muc=?";
    if (is_array($id_danh_muc)) {
        foreach ($id_danh_muc as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id_danh_muc);
    }
    return true;
}
function loai_delete_none($id_danh_muc)
{
    $sql = "UPDATE danh_muc SET display_danh_muc='0' WHERE id_danh_muc = ?";
    if (is_array($id_danh_muc)) {
        foreach ($id_danh_muc as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id_danh_muc);
    }
    return true;
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function loai_select_all()
{
    $sql = "SELECT * FROM danh_muc";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo mã
 * @param int $id_danh_muc là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
function loai_select_by_id($id_danh_muc)
{
    $sql = "SELECT * FROM danh_muc WHERE id_danh_muc=?";
    return pdo_query_one($sql, $id_danh_muc);
}
/**
 * Kiểm tra sự tồn tại của một loại
 * @param int $id_danh_muc là mã loại cần kiểm tra
 * @return boolean có tồn tại hay không
 * @throws PDOException lỗi truy vấn
 */
function loai_exist($id_danh_muc)
{
    $sql = "SELECT count(*) FROM san_pham WHERE id_danh_muc=?";
    return pdo_query_value($sql, $id_danh_muc) > 0;
}
/**
 * Truy vấn một loại theo mã
 * @param int $id_danh_muc là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
function loai_select_order_by_desc($colum)
{
    $sql = "SELECT * FROM danh_muc ORDER BY $colum DESC";
    return pdo_query($sql);
}
function loai_select_order_by_asc($colum)
{
    $sql = "SELECT * FROM danh_muc ORDER BY $colum ASC";
    return pdo_query($sql);
}
function loadall_danhmuc_trangchu()
{
    // Ẩn "Tất cả" ở trang homepage
    $sql = "SELECT * FROM danh_muc order by id_Danh_muc asc limit 1,12";
    return  pdo_query($sql);
}
<?php 
include_once ("pdo.php");
function insert_binh_luan($id_khach_hang,$id_san_pham,$noi_dung,$ngay_binh_luan){
    $sql = "INSERT INTO binh_luan (id_khach_hang,id_san_pham,noi_dung,ngay_binh_luan) VALUES (?,?,?,?)";
    pdo_execute($sql,$id_khach_hang,$id_san_pham,$noi_dung,$ngay_binh_luan);
}
function select_binh_luan($id_san_pham){
    $sql = "SELECT binh_luan.id_binh_luan,binh_luan.noi_dung,binh_luan.ngay_binh_luan,user.ho_ten,user.hinh_anh FROM binh_luan JOIN user ON user.id_khach_hang= binh_luan.id_khach_hang WHERE id_san_pham = ?";
    return pdo_query($sql,$id_san_pham);

}
function binh_luan_select_thong_ke_all(){
    $sql = "SELECT binh_luan.id_san_pham,san_pham.ten_san_pham ,SUM(1) AS tong_binh_luan ,MIN(ngay_binh_luan) AS binh_luan_cu,MAX(ngay_binh_luan) AS binh_luan_moi FROM binh_luan JOIN san_pham ON binh_luan.id_san_pham = san_pham.id_san_pham GROUP BY binh_luan.id_san_pham,san_pham.ten_san_pham";
    return pdo_query($sql);
}
function binh_luan_select_by_id($id_san_pham){
    $sql="SELECT binh_luan.id_san_pham,binh_luan.id_binh_luan,binh_luan.noi_dung,binh_luan.ngay_binh_luan,user.hinh_anh,user.ho_ten,user.email,user.ten_dang_nhap FROM binh_luan JOIN user ON binh_luan.id_khach_hang=user.id_khach_hang WHERE binh_luan.id_san_pham =?";
    return pdo_query($sql,$id_san_pham);
}
function binh_luan_by_id($id_binh_luan){
    $sql = "SELECT * FROM binh_luan WHERE id_binh_luan = ?";
    return pdo_query_one($sql,$id_binh_luan);
}
function insert_reply_binh_luan($id_binh_luan,$content,$id_khach_hang,$ngay_reply){
    $sql ="INSERT INTO reply_comment(id_binh_luan,content,id_khach_hang,ngay_reply) VALUES (?,?,?,?)";
    pdo_execute($sql,$id_binh_luan,$content,$id_khach_hang,$ngay_reply);
}
function select_reply_binh_luan(){
    $sql= "SELECT reply_comment.*, user.ho_ten,binh_luan.noi_dung,binh_luan.ngay_binh_luan FROM reply_comment JOIN user ON reply_comment.id_khach_hang = user.id_khach_hang JOIN binh_luan ON reply_comment.id_binh_luan = binh_luan.id_binh_luan";
    return pdo_query($sql);
}
function delete_reply_binh_luan($id_reply_comment){
    $sql= "DELETE FROM reply_comment WHERE id_reply_comment = ?";
    pdo_execute($sql,$id_reply_comment);
}
function  reply_binh_luan_by_id($id_reply_comment){
    $sql = "SELECT * FROM reply_comment WHERE id_reply_comment = ?";
    return pdo_query_one($sql,$id_reply_comment);
}
function update_binh_luan_by_id($id_reply_comment,$content,$ngay_reply){
    $sql = "UPDATE reply_comment SET content = ?,ngay_reply = ? WHERE id_reply_comment = ?";
    pdo_execute($sql,$content,$ngay_reply,$id_reply_comment);
}
function select_reply_by_id_binh_luan ($id_binh_luan){
    $sql = "SELECT reply_comment.*,user.ho_ten,user.hinh_anh FROM reply_comment JOIN user ON user.id_khach_hang = reply_comment.id_khach_hang WHERE reply_comment.id_binh_luan = ?";
    return pdo_query($sql,$id_binh_luan);
}
?>
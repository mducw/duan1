<?php 
include_once ('pdo.php');
function user_insert($ho_ten,$ten_dang_nhap,$mat_khau,$email,$phone,$hinh_anh,$kich_hoat,$dia_chi,$id_roles){
    $sql= "INSERT INTO user(ho_ten,ten_dang_nhap,mat_khau,email,phone,hinh_anh,kich_hoat,dia_chi,id_roles) VALUES(?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql,$ho_ten,$ten_dang_nhap,$mat_khau,$email,$phone,$hinh_anh,$kich_hoat,$dia_chi,$id_roles);
}
function user_select_all(){
    $sql = "SELECT user.id_khach_hang,user.ho_ten,user.ten_dang_nhap,user.email,user.phone,user.hinh_anh,user.display_user,user.kich_hoat,user.dia_chi,roles.ten_vai_tro FROM user JOIN roles ON user.id_roles = roles.id_roles";
    return pdo_query($sql);
}
function look_user($id_khach_hang){
    $sql= "UPDATE user SET kich_hoat = 0 WHERE id_khach_hang=?";
    pdo_execute($sql,$id_khach_hang);
}
function select_user_by_id($id_khach_hang){
    $sql="SELECT * FROM user WHERE id_khach_hang =?";
    return pdo_query_one($sql,$id_khach_hang);
}
function update_user($id_khach_hang,$ho_ten,$ten_dang_nhap,$mat_khau,$email,$phone,$hinh_anh,$kich_hoat,$dia_chi,$id_roles){
    if($hinh_anh != ""){
        $sql = "UPDATE user SET ho_ten=?,ten_dang_nhap=?,mat_khau=?,email=?,phone=?,hinh_anh=?,kich_hoat=?,dia_chi=?,id_roles=? WHERE id_khach_hang =?";
        pdo_query($sql,$ho_ten,$ten_dang_nhap,$mat_khau,$email,$phone,$hinh_anh,$kich_hoat,$dia_chi,$id_roles,$id_khach_hang);
    } else {
        $sql = "UPDATE user SET ho_ten=?,ten_dang_nhap=?,mat_khau=?,email=?,phone=?,kich_hoat=?,dia_chi=?,id_roles=? WHERE id_khach_hang =?";
        pdo_query($sql,$ho_ten,$ten_dang_nhap,$mat_khau,$email,$phone,$kich_hoat,$dia_chi,$id_roles,$id_khach_hang);
    }

}
?>
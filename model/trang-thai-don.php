<?php
include_once ("pdo.php");

function loadall_trang_thai_don(){
    $sql = "SELECT * FROM trang_thai_don";
    return pdo_query($sql);
}
?>
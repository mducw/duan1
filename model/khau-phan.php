<?php 
    include_once ("pdo.php");
    function loadall_khau_phan(){
        $sql = "SELECT * FROM khau_phan";
      return pdo_query($sql);
    }
?>
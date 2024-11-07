<?php 
    include_once ("pdo.php");

    function loadall_do_an_them(){
        $sql = "SELECT * FROM do_an_them";
      return pdo_query($sql);
    }
?>
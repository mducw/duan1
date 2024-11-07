<?php 
include_once('pdo.php');

function roles_select(){
    $sql= "SELECT * FROM roles ";
   return pdo_query($sql);
}
?>
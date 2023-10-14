<?php
include "../database/env.php";
$id = $_REQUEST['id'];
$select_img = "SELECT banner_img FROM patissier_table WHERE id= '$id'";
$res = mysqli_query($conn,$select_img );
$respons = mysqli_fetch_assoc($res);

if(file_exists("../uploads/patissier_img/".$respons['banner_img'])){
    unlink("../uploads/patissier_img/".$respons['banner_img']);

    $select = "DELETE FROM patissier_table WHERE id = '$id'";
    $delet = mysqli_query($conn,$select);

    if($delet){
        header("location:../backend/allPatissir.php");
    
     }


}

<?php
include "../database/env.php";
$id = $_REQUEST['id'];
$select_img = "SELECT banner_img FROM cook_table WHERE id= '$id'";
$res = mysqli_query($conn,$select_img );
$respons = mysqli_fetch_assoc($res);

if(file_exists("../uploads/cook_img/".$respons['banner_img'])){
    unlink("../uploads/cook_img/".$respons['banner_img']);

    $select = "DELETE FROM cook_table WHERE id = '$id'";
    $delet = mysqli_query($conn,$select);

    if($delet){
        header("location:../backend/allcook.php");
    
     }


}

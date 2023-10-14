<?php
include "../database/env.php";
$id = $_REQUEST['id'];
$select_img = "SELECT banner_img FROM banner_add WHERE id= '$id'";
$res = mysqli_query($conn,$select_img );
$respons = mysqli_fetch_assoc($res);

if(file_exists("../upload/user/".$respons['banner_img'])){
    unlink("../upload/user/".$respons['banner_img']);


}
$select = "DELETE FROM banner_add WHERE id = '$id'";
$delet = mysqli_query($conn,$select);
 if($delet){
    header("location:../backend/allBanner.php");

 }


?>
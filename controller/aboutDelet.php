<?php
include "../database/env.php";
$id = $_REQUEST['id'];
$select_img = "SELECT  about_img, video_img, video FROM about_table WHERE id='$id'";



$res = mysqli_query($conn,$select_img );
$respons = mysqli_fetch_assoc($res);
print_r($respons);


if(file_exists("../uploads/about_img/".$respons['about_img'])){
       
  
    unlink("../uploads/about_img/".$respons['about_img']);

    // $select = "DELETE FROM master_chif WHERE id = '$id'";
    // $delet = mysqli_query($conn,$select);

    // if($delet){
    //     header("location:../backend/allMasterchif.php");
    
    //  }
    }

    
    if(file_exists("../uploads/video_img/".$respons['video_img'])){
       
  
        unlink("../uploads/video_img/".$respons['video_img']);
    
       
    
    }

    if(file_exists("../uploads/videos/".$respons['video'])){
       
  
        unlink("../uploads/videos/".$respons['video']);
    
       
    
    }

     $select = "DELETE FROM about_table WHERE id = '$id'";
    $delet = mysqli_query($conn,$select);

    if($delet){
        header("location:../backend/allAbout.php");
    
     }
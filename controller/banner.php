<?php

include "../database/env.php";
session_start();
$title= $_REQUEST['title'];
$details= $_REQUEST['details'];
$cta_title= $_REQUEST['cta-title'];
$cta_link= $_REQUEST['cta_link'];
$video_linkl= $_REQUEST['video_link'];
$banner_img = $_FILES['banner_img'];

$banner_img_name =$banner_img['name'];

$banner_erorr=[];

// print_r($banner_img);

$extantion = pathinfo($banner_img_name)['extension'];
// print_r($extantion );
// exit();

$excepted_extention = ["jpg","png","svg"];



if(empty($title)){
    $banner_erorr['banner_title_erorr']="Enter Your title";

}else if(empty($details)){
    $banner_erorr['banner_details_erorr']="Enter Your details";

}
else if(empty($cta_title)){
    $banner_erorr['banner_cta_title_erorr']="Enter Your cta_title";

}
else if(empty($cta_link)){
    $banner_erorr['banner_cta_link_erorr']="Enter Your cta_link";

}
else if(empty($video_linkl)){
    $banner_erorr['banner_video_linkl_erorr']="Enter Your video_linkl";

}


else if($banner_img['size']==0){
    $banner_erorr['banner_img_erorr']="please chous only one img";

}else if(!in_array($extantion,$excepted_extention )){

    $banner_erorr['banner_img_erorr']= "file excepted jpg ,png,svg ";


}else if($banner_img['size']>500000){
    $banner_erorr['banner_img_erorr']= "Imge size must be 4 mb";

}



if(count($banner_erorr) > 0){
    $_SESSION['bannner_img-erorr']= $banner_erorr;
    header("location:../backend/banneradd.php");


}
else{
    $file_name = "user".uniqid().".$extantion";

    if(!is_dir("../uploads/users")){
        mkdir("../upload/users");  //mkdir() ata dea folder na thakla folder banano jaba
        
 
     }

     $updete_file =   move_uploaded_file($banner_img['tmp_name'], "../uploads/users/$file_name");
     if($updete_file){

    //  = "INSERT INTO banner_add(title, details,cta_ltitle, cta_link, video_link, banner_img)
    //    VALUES ('$title','$details','$cta_title','$cta_link','$video_linkl', '$file_name')";


    $inser ="INSERT INTO banner_add (title, details, cta_ltitle, cta_link, video_link, banner_img) VALUES ('$title','$details','$cta_title','$cta_link','$video_linkl', '$file_name')";


       $Query_ex = mysqli_query($conn,$inser);
        var_dump($Query_ex);
     

       if($Query_ex){
        header("location:../backend/banneradd.php");

       }

     }



}

?>
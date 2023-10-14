<?php
include "../database/env.php";
session_start();
$title = $_REQUEST['title'];
$details = $_REQUEST['details'];
$price = $_REQUEST['price'];
$banner_img = $_FILES['banner_img'];
$category_id = $_REQUEST['category_id'];

// echo($category_id);
// exit();

$erorr = [];
$excepted_img = ["jpg","png","JPEG", "svg"];
$file_name= $banner_img['name'];
$extension = pathinfo($banner_img['name'])['extension'];
$unic_name = "banner_img".uniqid().".$extension";


// print_r($erorr);

// print_r($banner_img);
if(empty($title)){
$erorr['title_erorr'] = "please Enter Your title";
}

if(empty($details)){
    $erorr['details_erorr'] = "please Enter Your details";
 }

 if(empty($price)){
        $erorr['price_erorr'] = "please Enter Your price";
 }

 if($banner_img['size']==0){
    $erorr['img_erorr'] = "You must select one img";

 }else if($banner_img['size'] > 0){

    if(!in_array($extension,$excepted_img)){
        $erorr['img_erorr'] = "Excepted Image extension jpg png JPEG svg ";


    }
    
  

 }

//  print_r($erorr);
//  exit();


if(count($erorr) > 0 ) {

    $_SESSION['banner_erorr'] = $erorr;

    header("location:../backend/allBannerItem.php");

} else{

    $file_fath = "../uploads/banner_img";

    if(!is_dir($file_fath)){
    mkdir($file_fath);

    }
  
    
    $file_upload = move_uploaded_file($banner_img['tmp_name'],"../uploads/banner_img/". $unic_name);

    if($file_upload ){
        
      $query = "INSERT INTO category_banner (category_id, title, details, price, banner_img) VALUES ('$category_id','$title','$details','$price','$unic_name') ";

   



      $res = mysqli_query($conn,$query);

      if($res){
        
    header("location:../backend/allBannerItem.php");
        
      }

    }




}


    














?>
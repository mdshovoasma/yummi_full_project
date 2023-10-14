<?php
include "../database/env.php";
session_start();
$title = $_REQUEST['title'];
$details = $_REQUEST['details'];
$chif_category = $_REQUEST['chif_category'];
$banner_img = $_FILES['banner_img'];
// $category_id = $_REQUEST['category_id'];

// echo($chif_category);

// exit();
$banner_img_name =$banner_img['name'];

$erorr = [];
$excepted_img = ["jpg","png","JPEG", "svg"];




// print_r($erorr);

// print_r($banner_img);
if(empty($title)){
$erorr['title_erorr'] = "please Enter Your title";
}

if(empty($details)){
    $erorr['details_erorr'] = "please Enter Your details";
 }

 if(empty($chif_category)){
        $erorr['$chif_category_erorr'] = "please Enter Your chif_category";
 }

 if($banner_img['size']==0){
    $erorr['img_erorr'] = "You must select one img";

 }else if($banner_img['size'] > 0){

  $extantion = pathinfo($banner_img_name)['extension'];

    if(!in_array($extantion,$excepted_img)){
        $erorr['img_erorr'] = "Excepted Image extension jpg png JPEG svg ";


    }
    
  

 }

//  print_r($erorr);
//  exit();


if(count($erorr) > 0 ) {

    $_SESSION['banner_erorr'] = $erorr;
    // print_r($_SESSION['banner_erorr']);
    // exit();

    header("location:../backend/addpatissier.php");

} else{
      $file_name= $banner_img['name'];
      $extension = pathinfo($banner_img['name'])['extension'];

    $file_fath = "../uploads/patissier_img";

    if(!is_dir($file_fath)){
    mkdir($file_fath);

    }
  
 
    $unic_name = "patissier".uniqid().".$extension";
    $file_upload = move_uploaded_file($banner_img['tmp_name'],"../uploads/patissier_img/".$unic_name);
   

    if($file_upload ){
        
      $query = "INSERT INTO patissier_table (title, details, chif_category, banner_img) VALUES ('$title','$details','$chif_category','$unic_name')";

   



      $res = mysqli_query($conn,$query);

      if($res){


       
        header("location:../backend/allPatissir.php");
      }

    }




}

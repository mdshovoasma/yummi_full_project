<?php


include "../database/env.php";
session_start();
$title = $_REQUEST['title'];
$taka = $_REQUEST['taka'];
$details = $_REQUEST['details'];

$banner_img = $_FILES['banner_img'];


$erorr = [];
$excepted_img = ["jpg","png","JPEG", "svg"];
$file_name= $banner_img['name'];




// // print_r($erorr);

// // print_r($banner_img);
if(empty($title)){
$erorr['title_erorr'] = "please Enter Your title";
}
if(empty($taka)){
    $erorr['taka_erorr'] = "Price Required";
 }



if(empty($details)){
    $erorr['details_erorr'] = "please Enter Your details";
 }



 if($banner_img['size']==0){
   $erorr['img_erorr'] = "You must select one img";

 }else if($banner_img['size'] > 0){
    $extension = pathinfo($banner_img['name'])['extension'];

    if(!in_array($extension,$excepted_img)){
        $erorr['img_erorr'] = "Excepted Image extension jpg png JPEG svg ";


    }
    
  

 }

//  print_r($erorr);
//  exit();


if(count($erorr) > 0 ) {

    $_SESSION['banner_erorr'] = $erorr;
    // print_r( $_SESSION['banner_erorr']);
    // exit();

    header("location:../backend/addEvent.php");

} else{

    $file_fath = "../uploads/event_img";

    if(!is_dir($file_fath)){
    mkdir($file_fath);

   }
  

    $unic_name = "event".uniqid().".$extension";
    $file_upload = move_uploaded_file($banner_img['tmp_name'],"../uploads/event_img/". $unic_name);

   

    if($file_upload ){
        
      $query = "INSERT INTO event_table (title, taka, details, banner_img) VALUES ('$title','$taka','$details','$unic_name')";

   
      $res = mysqli_query($conn,$query);
      // exit();

      if($res){
        header("location:../backend/addEvent.php");
      }

    }




}

<?php
session_start();
include "../database/env.php";
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$email = $_REQUEST['email'];
$profile_img_name = $_FILES['profile_img_name'];
$db_user_id = $_SESSION['user']['id'];
// print_r($db_user_id);
// exit();





$exceptedtype_extention= ['jpg','png','svg','web'];

$erorrs = [];

// print_r($profile_img_name['tmp_name']);
// pathinfo dea kno akta name ka anak gulo baga bag korba oken thaka extension nawa jaba;

$extantion = pathinfo($profile_img_name['name'])['extension'];
// $a = $extantion['extension'];

// print_r($extantion);
// echo "$extantion ";

if($profile_img_name['size']==0){
    $erorrs['img'] = "please cose a one profile img";

}else if(!in_array($extantion,$exceptedtype_extention)){
    $erorrs['img'] = "excepted extension";

}else if($profile_img_name['size']>560000){
    $erorrs['img']="Your img size is must be  2mb";

}
// print_r($erorrs);


if(count($erorrs)==0){
     // img upload of user jababa korbo
    // move_upload_file(adress of user img location,jakana img rakbo ter adress)

    // img ar akta uniqid name hoba uniqid() ar maddama
    $file_name = "user".uniqid().".$extantion";
    // fill_exists() ar bodola is_dir() use korta jaba

    if(!file_exists("../uploads/users")){
       mkdir("../uploads/users");  //mkdir() ata dea folder na thakla folder banano jaba
       

    }

  $updete_file = move_uploaded_file($profile_img_name['tmp_name'], "../uploads/users/$file_name");

  if($updete_file){
  $update_user_file =  "UPDATE user_table SET  fname ='$fname', lname='$lname',email='$email',img_name ='$file_name' WHERE id ='$db_user_id'";

  $update_query_ex=mysqli_query($conn,$update_user_file);

  if($update_query_ex){
    // $select = "SELECT * FROM user_table where id = '$db_user_id' ";
    // $select_ex = mysqli_query($conn,$select);
    // $uopdate_parson = mysqli_fetch_assoc( $select_ex);
    // print_r($uopdate_parson);
    // $_SESSION['update_user']=$uopdate_parson;

    $_SESSION['user']['fname']=$fname;
    $_SESSION['user']['lname']= $lname;
    $_SESSION['user']['email']= $email;
    $_SESSION['user']['img_name']=$file_name;
    

    header("location:../backend/profile.php");
   

  }


  }


}else{

    $_SESSION['profile_erorr']=$erorrs;
    header('location:../backend/profile.php');
  
}







?>
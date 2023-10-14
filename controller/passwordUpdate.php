<?php
session_start();

include "../database/env.php";
$idd =$_SESSION['user']['id'];
// echo $idd;
$oldpassword = $_REQUEST['old_password'];

$newpassword = $_REQUEST['new_password'];

$conformpassword = $_REQUEST['conform_password'];


$ecnpassword = password_hash($newpassword,PASSWORD_BCRYPT);

$password_chack_erorr=[];

    
$select_user = "SELECT * FROM user_table WHERE id ='$idd' ";
$query_exicut = mysqli_query($conn,$select_user );
$result = mysqli_fetch_assoc($query_exicut);
// $db_userpassword =$result['password'];
// var_dump($result['password'] );


$oldpassword_verypay = password_verify($oldpassword, $result['password']);
// var_dump($oldpassword_verypay);







if(empty($newpassword)){
    $password_chack_erorr['newpassowrd_erorr'] = "new password eror";

}
if(empty($conformpassword )){
    $password_chack_erorr['conformpassword_erorr'] = "new password eror";



}

if(count($password_chack_erorr) > 0 ){
    $_SESSION['password_update_erorr']=$password_chack_erorr;
    header("location:../backend/profile.php");

}else{


if($oldpassword_verypay){
    



   

    if($newpassword == $conformpassword){
       
      
       $update ="UPDATE user_table SET password ='$ecnpassword' WHERE id='$idd'";
        $update_ex = mysqli_query($conn,$update);

      if($update){
        header("location:../backend/index.php");

      }
   

  }

}else{
    $password_chack_erorr['oldpassword_erorr'] = "oldpassword_erorr";
    $_SESSION['erorr']=$password_chack_erorr;
    $password_chack_erorr['password_erorr']= "your password is erorr";
    header("location:../backend/profile.php");

}




}







// ; 
// echo $userpassword;












// if(){

// }









?>
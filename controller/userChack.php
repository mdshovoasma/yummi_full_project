<?php
session_start();
include '../database/env.php';
$email =$_REQUEST['email'];
$password = $_REQUEST['password'];

// exit();
$login_erorr=[];

if(empty($email)){
    $login_erorr['email_erorr']="enter your email";

}
if(empty($password)){
    $login_erorr['password_erorr']="enter your password ";

}

if(count($login_erorr)>0){
    $_SESSION['log_erorr']=$login_erorr;
    header("location:../backend/login.php");

}else{
    $query = "SELECT * FROM user_table WHERE email = '$email'";

    $ex_query = mysqli_query($conn, $query);
    $db_user = mysqli_fetch_assoc($ex_query);
    $isCorrect_pass = password_verify($password,$db_user['password']);
   
   

    if(mysqli_num_rows($ex_query) >0){
       
     if($isCorrect_pass){
        $_SESSION['user']= $db_user;

      

        header("location:../backend/index.php");

     }else{

        $login_erorr['password_erorr']="incorrect password ";
       
        $_SESSION['log_erorr']=$login_erorr;
          
        header("location:../backend/login.php");

     }




    } else{
     
      
        $login_erorr['email_erorr']="incorrect email";
       
        $_SESSION['log_erorr']=$login_erorr;
          
        header("location:../backend/login.php");


    }
   



}



?>
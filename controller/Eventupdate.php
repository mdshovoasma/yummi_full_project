<?php
include "../database/env.php";
$id = $_REQUEST['id'];
// print_r($id);




$title = $_REQUEST['title'];
$details = $_REQUEST['details'];
$taka = $_REQUEST['taka'];
$banner_img = $_FILES['banner_img'];
// $category_id = $_REQUEST['category_id'];

//  echo($taka);

// exit();
$excepted_img = ["jpg","png","JPEG", "svg"];



$erorr=[];

// print_r($erorr);

// print_r($banner_img);


 if($banner_img['size']==0){

    $updated_query ="UPDATE event_table SET title='$title',taka='$taka',details='$details' WHERE id= '$id'";


    $$updated_query_ex = mysqli_query($conn,$updated_query);




    header("location:../backend/allEvent.php");




 }else if($banner_img['size'] > 0){
    // $file_name= $banner_img['name'];
    $extension = pathinfo($banner_img['name'])['extension'];

    if(!in_array($extension,$excepted_img)){
        $erorr['img_erorr'] = "Excepted Image extension jpg png JPEG svg ";
        header("location:../backend/eventEdite.php?id=$id");
       

    }else{

        $file_fath = "../uploads/event_img";
    
        if(!is_dir($file_fath)){
        mkdir($file_fath);
    
        }

        $chack_master_img_server =" SELECT  banner_img  FROM event_table WHERE id = '$id'";

        $query_ex =mysqli_query($conn,$chack_master_img_server);
        $server_img = mysqli_fetch_assoc($query_ex);

        // print_r($server_img);

      
        if(file_exists("../uploads/event_img/".$server_img['banner_img']) ){

          unlink("../uploads/event_img/".$server_img['banner_img']);

        }

        $unic_name = "banner_img".uniqid().".$extension";
        $file_upload = move_uploaded_file($banner_img['tmp_name'],"../uploads/event_img/".$unic_name);
       
        $master_update_width_img = "UPDATE event_table SET title='$title', taka='$taka', details='$details',banner_img='$unic_name' WHERE id = '$id'";

        $master_query_ex = mysqli_query($conn,$master_update_width_img);

        if($master_query_ex){
            

         header("location:../backend/allEvent.php");

        }
        




    }


    
  

 }
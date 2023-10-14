<?php
include "../database/env.php";
$id = $_REQUEST['id2'];
print_r($id);

// exit();


$title = $_REQUEST['title'];
$details = $_REQUEST['details'];
// $chif_category = $_REQUEST['chif_category'];
$banner_img = $_FILES['banner_img'];
// $category_id = $_REQUEST['category_id'];

// echo($category_id);


$excepted_img = ["jpg","png","JPEG", "svg"];
$file_name= $banner_img['name'];
$extension = pathinfo($banner_img['name'])['extension'];

$erorr=[];

// print_r($erorr);

// print_r($banner_img);


 if($banner_img['size']==0){

    $updated_query ="UPDATE banner_add SET title='$title', details='$details' WHERE id = '$id'";


    $$updated_query_ex = mysqli_query($conn,$updated_query);




    header("location:../backend/allBanner.php");




 }else if($banner_img['size'] > 0){

    if(!in_array($extension,$excepted_img)){
        $erorr['img_erorr'] = "Excepted Image extension jpg png JPEG svg ";
        header("location:../backend/bannerEdite.php?id=$id");


    }else{

        $file_fath = "../uploads/users";
    
        if(!is_dir($file_fath)){
        mkdir($file_fath);
    
        }

        $chack_master_img_server =" SELECT  banner_img  FROM banner_add WHERE id = '$id'";

        $query_ex =mysqli_query($conn,$chack_master_img_server);
        $server_img = mysqli_fetch_assoc($query_ex);

        // print_r($server_img);
        if(file_exists("../uploads/users/".$server_img['banner_img']) ){

          unlink("../uploads/users/".$server_img['banner_img']);

        }

        $unic_name = "banner_img".uniqid().".$extension";
        $file_upload = move_uploaded_file($banner_img['tmp_name'],"../uploads/users/". $unic_name);
       
        $master_update_width_img = "UPDATE banner_add SET title='$title',details='$details',banner_img='$unic_name' WHERE id = '$id'";

        $master_query_ex = mysqli_query($conn,$master_update_width_img);

        if($master_query_ex){
            

         header("location:../backend/allBanner.php");

        }
        




    }


    
  

 }

//  print_r($erorr);
 exit();




  
 
//    
//     $file_upload = move_uploaded_file($banner_img['tmp_name'],"../uploads/chif_img/". $unic_name);


    
   

//     if($file_upload ){
        
//       $query = "INSERT INTO master_chif(title, details, chif_category, banner_img) VALUES ('$title','$details','$chif_category','$unic_name')";

   



//       $res = mysqli_query($conn,$query);

//       if($res){
//         header("location:../backend/MasterChifAdd.php");
//       }

//     }




// }

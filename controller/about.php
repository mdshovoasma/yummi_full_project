<?php
include "../database/env.php";
session_start();
// $id = $_REQUEST['id3'];
$about_img = $_FILES['about_img'];
$number = $_REQUEST['number'];
$about_title = $_REQUEST['about_title'];
$video_img = $_FILES['video_img'];
$video = $_FILES['video'];

// print_r($video);

// exit();


$about_erorr=[];





$excepted_extention = ["jpg","png","svg"];


$excepted_video_extenion = ["mp4","wmv"];



if($about_img['size']==0){
    $about_erorr['about_erorrr']="please chous only one img";

}
// print_r($about_erorr);
// exit();

if($about_img['size']>0){

    $extantion =pathinfo($about_img['name'])['extension'] ;
    if(!in_array($extantion,$excepted_extention)){
        $about_erorrr['about_erorr']= "file excepted jpg ,png,svg";

    }else if($about_img['size'] > 5000000){
        $about_erorr['about_erorr']= "Imge size must be 4 mb";
        
    }else{
        

        $file_name ="about".uniqid().".$extantion";

        if(!is_dir("../uploads/about_img")){
            mkdir("../uploads/about_img");  //mkdir() ata dea folder na thakla folder banano jaba
            
    
        }
    
        $updete_file =move_uploaded_file($about_img['tmp_name'],"../uploads/about_img/$file_name");
    
        
    }

}


if(empty($number)){
    $about_erorr['number_erorr']="Enter Your book table Number";

}

 if(empty($about_title)){
    $about_erorr['about_title_erorr']="Enter Your title";

}



// video img

if($video_img['size']==0){
    $about_erorr['video_img_erorr']="video img Required";

}

if($video_img['size']>0){

    $video_img_extension=pathinfo($video_img['name'])['extension'];
    if(!in_array($video_img_extension,$excepted_extention)){
        $about_erorrr['video_img_erorr']= "file excepted jpg ,png,svg ";

    }else if($video_img['size'] > 5000000){
        $about_erorr['video_img_erorr']= "Imge size must be 4 mb";
        
    }else{
            
            $video_img_name = "video_img".uniqid().".$video_img_extension";
            // print_r($video_img_name);
         if(!is_dir("../uploads/video_img")){
            mkdir("../uploads/video_img");  //mkdir() ata dea folder na thakla folder banano jaba
            

         }

            $updete_file1 =move_uploaded_file($video_img['tmp_name'],"../uploads/video_img/$video_img_name");
            
        }

}





// video file save server
if($video['size']==0){
    $about_erorr['video_erorr']="video  Required";

    
}
if($video['size']>0){
    $video_extension = pathinfo($video['name'])['extension'];
    if(!in_array($video_extension ,$excepted_video_extenion)){
        $about_erorrr['video_erorr']= "file excepted mp4 wmv ";

    }else if($video['size'] > 500000000){
        $about_erorr['video_erorr']= "video size must be 1000 mb";
        
    }else{

        $video_name = "video_img".uniqid().".$video_extension";

    if(!is_dir("../uploads/videos")){
        mkdir("../uploads/videos");  //mkdir() ata dea folder na thakla folder banano jaba
        

    }

    $updete_file2 =move_uploaded_file($video['tmp_name'],"../uploads/videos/$video_name");

    

}

}

// print_r($about_erorr);
// exit();

if(count($about_erorr) > 0){
    $_SESSION['all_about_erorr'] = $about_erorr;
    header("location:../backend/addAbout.php");
    // exit();
}else{


    // $update_query = "UPDATE about_table SET about_img='$file_name',number='$number',about_title='$about_title',video_img='$video_img_name',video='$video_name' WHERE id = '$id'";
    // $update_res = mysqli_query($conn,$update_query);





    $about_insert = "INSERT INTO about_table (about_img, number, about_title, video_img, video) VALUES ('$file_name','$number','$about_title','$video_img_name','$video_name')";
    $res = mysqli_query($conn,$about_insert);
    if($res){
    header("location:../backend/allAbout.php");

    }

   

}














// if(empty($title)){
//     $banner_erorr['banner_title_erorr']="Enter Your title";

// }else if(empty($details)){
//     $banner_erorr['banner_details_erorr']="Enter Your details";

// }
// else if(empty($cta_title)){
//     $banner_erorr['banner_cta_title_erorr']="Enter Your cta_title";

// }
// else if(empty($cta_link)){
//     $banner_erorr['banner_cta_link_erorr']="Enter Your cta_link";

// }
// else if(empty($video_linkl)){
//     $banner_erorr['banner_video_linkl_erorr']="Enter Your video_linkl";

// }






// $extantion =pathinfo($about_img['name'])['extension'] ;
// print_r($extantion );
// // exit();

// $excepted_extention = ["jpg","png","svg"];


// $file_name = "user".uniqid().".$extantion";

// if(!is_dir("../uploads/about_img")){
//     mkdir("../uploads/about_img");  //mkdir() ata dea folder na thakla folder banano jaba
    

//  }

//  $updete_file =move_uploaded_file($about_img['tmp_name'],"../uploads/about_img/$file_name");



























?>
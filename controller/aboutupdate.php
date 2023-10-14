<?php
include "../database/env.php";
$id = $_REQUEST['id3'];
$select = "SELECT * FROM about_table WHERE id = '$id'";
$res= mysqli_query($conn,$select);
$response = mysqli_fetch_assoc($res);
// print_r($response);
// exit();



$about_img = $_FILES['about_img'];
$number = $_REQUEST['number'];
$about_title = $_REQUEST['about_title'];
$video_img = $_FILES['video_img'];
$video = $_FILES['video'];

// print_r($video_img);

// exit();


$about_erorr=[];


$excepted_extention = ["jpg","png","svg"];

$excepted_video_extenion = ["mp4","wmv"];


if($about_img['size']==0){
    $about_erorr['about_erorr']="please chous only one img";

}

if($about_img['size']>0){


    

    $extantion =pathinfo($about_img['name'])['extension'] ;
    if(!in_array($extantion,$excepted_extention)){
        $about_erorrr['about_erorr']= "file excepted jpg ,png,svg";

    }else if($about_img['size'] > 5000000){
        $about_erorr['about_erorr']= "Imge size must be 4 mb";
        
    }else{

        if(file_exists("../uploads/about_img/".$response['about_img'])){
            unlink("../uploads/about_img/".$response['about_img']);
         //    echo "hello";
     
         }
        

        $file_name ="about".uniqid().".$extantion";

        if(!is_dir("../uploads/about_img")){
            mkdir("../uploads/about_img");  //mkdir() ata dea folder na thakla folder banano jaba
            
    
        }
    
        $updete_file =move_uploaded_file($about_img['tmp_name'],"../uploads/about_img/$file_name");
    
        
    }

}


if(empty($number)){
    $about_erorr['number_erorr']="Enter Your title";

}

 if(empty($about_title)){
    $about_erorr['about_title_erorr']="Enter Your title";

}



// video img

if($video_img['size']==0){
    $about_erorr['video_img_erorr']="please chouse only one img";

}

if($video_img['size']>0){

    $video_img_extension=pathinfo($video_img['name'])['extension'];
    if(!in_array($video_img_extension,$excepted_extention)){
        $about_erorrr['video_img_erorr']= "file excepted jpg ,png,svg ";

    }else if($video_img['size'] > 50000000){
        $about_erorr['video_img_erorr']= "Imge size must be 4 mb";
        
    }else{


        if(file_exists("../uploads/video_img".$response['video_img'])){
            unlink("../uploads/video_img/".$response['video_img']);
         //    echo "hello";
     
         }
            
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
    $about_erorr['video_erorr']="please chous only one img";

    
}
if($video['size']>0){
    $video_extension = pathinfo($video['name'])['extension'];
    if(!in_array($video_extension ,$excepted_video_extenion)){
        $about_erorrr['video_erorr']= "file excepted mp4 wmv ";

    }else if($video['size'] > 5000000000){
        $about_erorr['video_erorr']= "Imge size must be 1000 mb";
        
    }else{


        if(file_exists("../uploads/video_img".$response['video'])){
            unlink("../uploads/about_img/".$response['video']);
         //    echo "hello";
     
         }

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
    header("location:../backend/aboutEdite.php?id=$id");
   
}else{


    $update_query = "UPDATE about_table SET about_img='$file_name',number='$number',about_title='$about_title',video_img='$video_img_name',video='$video_name' WHERE id = '$id'";
    $update_res = mysqli_query($conn,$update_query);

    if($update_res){
        header("location:../backend/allAbout.php");
    }





    // $about_insert = "INSERT INTO about_table (about_img, number, about_title, video_img, video) VALUES ('$file_name','$number','$about_title','$video_img_name','$video_name')";
    // $res = mysqli_query($conn,$about_insert);

   

}


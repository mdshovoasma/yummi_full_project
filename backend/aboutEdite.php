<?php
include "./backend_inc/header.php";
include "../database/env.php";

$id=$_REQUEST['id'];
// print_r($id);


$query = "SELECT * FROM about_table WHERE id = '$id'";
$res = mysqli_query($conn,$query);
$response = mysqli_fetch_assoc($res);
print_r($response);
// exit();

?>



<div class="container-fluid ">
    <form action="../controller/aboutupdate.php" method="Post" enctype="multipart/form-data">
        <div class="card">
            <div class="care-header">
                <h1>About Edite</h1>
                <div class="card-body">
                    <input class="d-none" name="id3" type="text" value="<?= $response['id'] ?>">



                    <label for="about_img">About Image <img class="change_img rounded-circle" src="../uploads/about_img/<?=$response['about_img'] ?>" alt="" width="200" height="200"></label><br>
                <input name="about_img" type="file" id="about_img" class="about d-none"><br> <br><br><br>  

                <!-- <label for="about_img1">About Image <img src="../uploads/about_img/<?=$response['about_img'] ?>" alt="" width="200" height="200"></label><br>
                <input name="about_img" type="file" id="about_img1"> <br> <br><br><br>     -->


                    <label for="">Book Number</label>

                    <input name="number" type="number" value="<?=$response['number'] ?>" placeholder="Book Number" class="mb-2"><br>

                    <!-- <div   id="editor">
                          
                        </div> -->
                        <textarea name="about_title"   cols="30" rows="10" id="editor"> <?= $response['about_title']?></textarea>



                    <!-- <input name="chif_category" type="text" placeholder="Enter your Chif category" class="mb-2"><br> -->




                    <label for="video_img">Vedio Image <img class="video_img rounded-circle" src="../uploads/video_img/<?= $response['video_img']?>" alt="" width="200" height="200"></label><br>
                <input name="video_img" type="file" id="video_img" class="video_file d-none"> <br> <br><br><br> 


  



                    <!-- <textarea name="details" placeholder="Enter Your details" class="form-control">  </textarea><br> -->


                    <div class="row mx-0">
                        <!-- <input name="cta-title" placeholder="enter cta title" type="text" class="form-control my-2 col-lg-4"><br><br> -->



                        





                        <!-- <input name="video_link" placeholder="enter  Video Link" type="text" class="form-control my-2 col-lg-4"><br> -->





                    </div>

                    <label for="video">About video <video class="video_change" controls src="../uploads/videos/<?= $response['video']?>" width="300" height="200"></video> ></label><br>
                    <input name="video" type="file" id="video" class="about_video "><br><br>

                    <button class="btn btn-primary">Update</button> <br>





                </div>
            </div>

        </div>
    </form>
</div>















<?php

include "./backend_inc/footer.php";
unset($_SESSION['bannner_img-erorr']);
?>

<script>
ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });
</script>

<script>
    let about_img = document.querySelector(".change_img");
console.log(about_img);
let about = document.querySelector(".about");
console.log(about);

about.addEventListener("change",(eveent)=>{
    let url = URL.createObjectURL(eveent.target.files[0]);
    about_img.src = url;
})

let video_file = document.querySelector(".video_file");
let video_img = document.querySelector(".video_img");

video_file.addEventListener("change",(event)=>{
    let url = URL.createObjectURL(event.target.files[0]);
    video_img.src = url;
})


let about_video = document.querySelector(".about_video");
let video_change = document.querySelector(".video_change");

about_video.addEventListener("change",(event)=>{
    let url = URL.createObjectURL(event.target.files[0]);
    video_change.src = url;
})


</script>
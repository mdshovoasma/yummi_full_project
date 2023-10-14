<?php
// session_start();
// $erorr= $_SESSION['all_about_erorr'];

// print_r($erorr);
// // exit();
include "./backend_inc/header.php";
include "../database/env.php";

// $query = "SELECT * FROM store_category";
// $res = mysqli_query($conn,$query);
// $response = mysqli_fetch_all($res,1);
// print_r($response);

?>



<div class="container-fluid ">
    <form action="../controller/about.php" method="Post" enctype="multipart/form-data">
        <div class="card">
            <div class="care-header">
                <h1>Add About</h1>
                <div class="card-body">

                <label for="about_img">About Image <img class="change_img rounded-circle" src="https://api.dicebear.com/7.x/avataaars/svg?seed=shovo" alt="" width="200" height="200"></label><br>
                <input name="about_img" type="file" id="about_img" class="about d-none"><br> <br><br><br>  
                
                <span class="text-danger"><?= isset($_SESSION['all_about_erorr']['about_erorrr']) ? $_SESSION['all_about_erorr']['about_erorrr'] : ''?></span><br>


            


                    
                <label for="">Book Number</label>
                    <input name="number" type="number" placeholder="Book Number" class="mb-2"> <br>
                    <span class="text-danger"><?= isset($_SESSION['all_about_erorr']['number_erorr']) ? $_SESSION['all_about_erorr']['number_erorr'] : ''?></span><br>

                        <textarea name="about_title"  cols="30" rows="10" id="editor"></textarea>

                        <span class="text-danger"><?= isset($_SESSION['all_about_erorr']['about_title_erorr']) ? $_SESSION['all_about_erorr']['about_title_erorr'] : ''?></span><br>




                    <!-- <input name="chif_category" type="text" placeholder="Enter your Chif category" class="mb-2"><br> -->




                    <label for="video_img">Vedio Image <img class="video_img rounded-circle" src="https://api.dicebear.com/7.x/avataaars/svg?seed=alex" alt="" width="200" height="200"></label><br>
                <input name="video_img" type="file" id="video_img" class="video_file d-none"> <br> <br><br><br>   

                <span class="text-danger"><?= isset($_SESSION['all_about_erorr']['video_img_erorr']) ? $_SESSION['all_about_erorr']['video_img_erorr'] : ''?></span><br>



                    <!-- <textarea name="details" placeholder="Enter Your details" class="form-control">  </textarea><br> -->


                    <div class="row mx-0">
                        <!-- <input name="cta-title" placeholder="enter cta title" type="text" class="form-control my-2 col-lg-4"><br><br> -->



                        





                        <!-- <input name="video_link" placeholder="enter  Video Link" type="text" class="form-control my-2 col-lg-4"><br> -->





                    </div>

                    <label for="video">About video <video class="video_change" controls src="" width="300" height="200"></video> ></label><br>
                    <input name="video" type="file" id="video" class="about_video "><br><br>

                    <span class="text-danger"><?= isset($_SESSION['all_about_erorr']['video_erorr']) ? $_SESSION['all_about_erorr']['video_erorr'] : ''?></span><br>


                    <button class="btn btn-primary">Add</button> <br>





                </div>
            </div>

        </div>
    </form>
</div>















<?php

include "./backend_inc/footer.php";
unset($_SESSION['all_about_erorr']);
?>

<script>
ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });
</script>

<!-- for addabout -->
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
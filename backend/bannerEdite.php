

<?php
include "./backend_inc/header.php";
include "../database/env.php";

$id = $_REQUEST['id'];



$select = "SELECT * FROM banner_add WHERE id = '$id'";
$res = mysqli_query($conn,$select);
$response = mysqli_fetch_assoc($res);
print_r($response);

// $query = "SELECT * FROM store_category";
// $res = mysqli_query($conn,$query);
// $response = mysqli_fetch_all($res,1);
// print_r($response);

?>



<div class="container-fluid ">
    <form action="../controller/updateBanner.php" method="Post" enctype="multipart/form-data">
    <div class="card">
        <div class="care-header">
           <h1>Banner Bdit</h1>
           <div class="card-body">
            <input class="d-none" name="id2" type="text" value="<?=$response['id'] ?>">

            <input name="title" type="text" value="<?= $response['title'] ?>" class="mb-2"><br>


            <!-- <input name="chif_category" type="text" value="<?= $response['chif_category'] ?>"  class="mb-2"><br> -->
       
            




            <textarea name="details" class="form-control"> <?= $response['details'] ?>  </textarea><br>
           

            <div class="row mx-0">
                    <!-- <input name="cta-title" placeholder="enter cta title" type="text" class="form-control my-2 col-lg-4"><br><br> -->

                    


                 

                   


                    <!-- <input name="video_link" placeholder="enter  Video Link" type="text" class="form-control my-2 col-lg-4"><br> -->
                




                </div>
                <!-- <input name="banner_img" type="file"><br><br> -->

                <label for="banner_img"><img  class="banner_img rounded-circle" src="https://api.dicebear.com/7.x/avataaars/svg?seed=anika" alt="" width="200" height="200" class="rounded-circle"></label>
                    
                    <input name="banner_img" type="file" id="banner_img" class="banner d-none"> <br>
                

                <button class="btn btn-primary">Add</button> <br>





           </div>
        </div>

    </div>
    </form>
</div>















<?php

include "./backend_inc/footer.php";
unset($_SESSION['bannner_img-erorr']);
?>
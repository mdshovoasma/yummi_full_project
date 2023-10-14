

<?php
include "./backend_inc/header.php";
include "../database/env.php";

$id = $_REQUEST['id'];



$select = "SELECT * FROM master_chif WHERE id = '$id'";
$res = mysqli_query($conn,$select);
$response = mysqli_fetch_assoc($res);
// print_r($response);

// $query = "SELECT * FROM store_category";
// $res = mysqli_query($conn,$query);
// $response = mysqli_fetch_all($res,1);
// print_r($response);

?>



<div class="container-fluid ">
    <form action="../controller/updateMasterChif.php" method="Post" enctype="multipart/form-data">
    <div class="card">
        <div class="care-header">
           <h1>Add Master Edite</h1>
           <div class="card-body">
            <input class="d-none" name="id2" type="text" value="<?=$response['id'] ?>">

            <input name="title" type="text" value="<?= $response['title'] ?>" class="mb-2"><br>


            <input name="chif_category" type="text" value="<?= $response['chif_category'] ?>"  class="mb-2"><br>
       
            




            <textarea name="details" class="form-control"> <?= $response['details'] ?>  </textarea><br>
           

            <div class="row mx-0">
                    <!-- <input name="cta-title" placeholder="enter cta title" type="text" class="form-control my-2 col-lg-4"><br><br> -->

                    


                 

                   


                    <!-- <input name="video_link" placeholder="enter  Video Link" type="text" class="form-control my-2 col-lg-4"><br> -->
                




                </div>
                <label for="masterchif"> <img class="master rounded-circle" src="../uploads/chif_img/<?= isset($response['banner_img']) ?$response['banner_img'] : 'https://api.dicebear.com/7.x/avataaars/svg?seed=alex'?>" alt="" width="200" height="200"></label>
                <input name="banner_img" type="file" id="masterchif" class="master_file d-none"><br><br>
                

                <button class="btn btn-primary">Add</button> <br>





           </div>
        </div>

    </div>
    </form>
</div>
<script>
    let master_file = document.querySelector(".master_file");
let master = document.querySelector(".master");

master_file.addEventListener("change",(event)=>{
    let url = URL.createObjectURL(event.target.files[0]);
    master.src = url;
})

</script>















<?php

include "./backend_inc/footer.php";
unset($_SESSION['bannner_img-erorr']);
?>
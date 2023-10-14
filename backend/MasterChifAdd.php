<?php
include "./backend_inc/header.php";
include "../database/env.php";

// $query = "SELECT * FROM store_category";
// $res = mysqli_query($conn,$query);
// $response = mysqli_fetch_all($res,1);
// print_r($response);

?>



<div class="container-fluid ">
    <form action="../controller/addMasterChif.php" method="Post" enctype="multipart/form-data">
    <div class="card">
        <div class="care-header">
           <h1>Add Master Chif</h1>
           <div class="card-body">
            <input name="title" type="text" placeholder="Enter your Chif title" class="mb-2"><br>
            <span class="text-danger"><?= isset($_SESSION['banner_erorr']['title_erorr'])?$_SESSION['banner_erorr']['title_erorr'] : ''  ?></span> <br>
           


            <input name="chif_category" type="text" placeholder="Enter your Chif category" class="mb-2"><br>
            


            <span  class="text-danger"><?= isset($_SESSION['banner_erorr']['chif_category_erorr'])?$_SESSION['banner_erorr']['chif_category_erorr'] : ''  ?></span>
            




            <textarea name="details" placeholder="Enter Your details" class="form-control">  </textarea><br>

            <span  class="text-danger"><?= isset($_SESSION['banner_erorr']['details_erorr'])?$_SESSION['banner_erorr']['details_erorr'] : ''  ?></span>
           

            <div class="row mx-0">
                    <!-- <input name="cta-title" placeholder="enter cta title" type="text" class="form-control my-2 col-lg-4"><br><br> -->

                    


                 

                   


                    <!-- <input name="video_link" placeholder="enter  Video Link" type="text" class="form-control my-2 col-lg-4"><br> -->
                




                </div>
                <label for="masterchif"> <img class="master rounded-circle" src="https://api.dicebear.com/7.x/avataaars/svg?seed=alex" alt="" width="200" height="200"></label>
                <input name="banner_img" type="file" id="masterchif" class="master_file d-none"><br><br>

                
            <span  class="text-danger"><?= isset($_SESSION['banner_erorr']['img_erorr'])?$_SESSION['banner_erorr']['img_erorr'] : ''  ?></span><br><br>
                

                <button class="btn btn-primary" >Add</button> <br>





           </div>
        </div>

    </div>
    </form>
</div>

<?php

include "./backend_inc/footer.php";
unset($_SESSION['banner_erorr']);
?>

<script>
    let master_file = document.querySelector(".master_file");
let master = document.querySelector(".master");

master_file.addEventListener("change",(event)=>{
    let url = URL.createObjectURL(event.target.files[0]);
    master.src = url;
})

</script>
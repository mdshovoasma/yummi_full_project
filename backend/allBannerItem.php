<?php
include "./backend_inc/header.php";
include "../database/env.php";

$query = "SELECT * FROM store_category";
$res = mysqli_query($conn,$query);
$response = mysqli_fetch_all($res,1);
// print_r($response);

?>



<div class="container-fluid ">
    <form action="../controller/storeBanneritem.php" method="Post" enctype="multipart/form-data">
    <div class="card">
        <div class="care-header">
           <h1>Add Banner Item</h1>
           <div class="card-body">
            <input name="title" type="text" placeholder="Enter your title" class="mb-2"><br>

            <span class="text-danger"><?= isset($_SESSION['banner_erorr']['title_erorr']) ? $_SESSION['banner_erorr']['title_erorr'] : ''  ?></span>
       
            




            <textarea name="details" placeholder="Enter Your details" class="form-control">  </textarea>

            <span class="text-danger"><?= isset($_SESSION['banner_erorr']['details_erorr']) ? $_SESSION['banner_erorr']['details_erorr'] : ''  ?></span> 
           

            <div class="row mx-0">
                    <!-- <input name="cta-title" placeholder="enter cta title" type="text" class="form-control my-2 col-lg-4"><br><br> -->
                    <input name="price" placeholder="price" type="number" class="form-control my-2 col"><br>
                    <span class="text-danger"><?= isset( $_SESSION['banner_erorr']['price_erorr'] )? $_SESSION['banner_erorr']['price_erorr'] : ''  ?></span> <br>

                    <select name="category_id"  class=" form-control col" >
                        <?php
                        foreach($response as $key=> $respons){ ?>
                         

                            <option value="<?=$respons['id']?>"><?=  $respons['title']?></option>



                      <?php  }
                        
                        
                        
                        ?>




                    </select>  
                   


                    <!-- <input name="video_link" placeholder="enter  Video Link" type="text" class="form-control my-2 col-lg-4"><br> -->
                




                </div>
                <label for="allbanner"><img class="banner_item_img rounded-circle" src="https://api.dicebear.com/7.x/avataaars/svg?seed=Felix" alt="" width="200" height="200"></label><br>
                <input name="banner_img" type="file" id="allbanner" class="banner_file d-none"><br><br>

                <span class="text-danger"><?=isset( $_SESSION['banner_erorr']['img_erorr']) ? $_SESSION['banner_erorr']['img_erorr'] : ''  ?></span> <br>
                

                <button class="btn btn-primary">Add</button> <br>





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
    let banner_file = document.querySelector(".banner_file");
    let banner_item_img = document.querySelector(".banner_item_img");

    banner_file.addEventListener("change",(event)=>{
    let url = URL.createObjectURL(event.target.files[0]);
    banner_item_img.src = url;
})

</script>
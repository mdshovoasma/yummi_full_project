<?php

include "./backend_inc/header.php";

?>

<div class="container-fluid">
    <form action="../controller/banner.php" method="Post" enctype="multipart/form-data">
    <div class="card">
        <div class="care-header">
           <h1>Add card banner</h1>
           <div class="card-body">
            <input name="title" type="text" placeholder="Enter your title" class="mb-2"><br>
            <span class="text-danger"><?= isset($_SESSION['bannner_img-erorr']['banner_title_erorr']) ? $_SESSION['bannner_img-erorr']['banner_title_erorr'] : '' ?></span>
            




            <textarea name="details" placeholder="Enter Your details" class="form-control">  </textarea><br>
            <span class="text-danger"><?= isset($_SESSION['bannner_img-erorr']['banner_details_erorr']) ? $_SESSION['bannner_img-erorr']['banner_details_erorr'] : '' ?></span>

            <div class="row mx-0">
                    <input name="cta-title" placeholder="enter cta title" type="text" class="form-control my-2 col-lg-4"><br><br>

                    <span class="text-danger"><?= isset($_SESSION['bannner_img-erorr']['banner_cta_title_erorr']) ? $_SESSION['bannner_img-erorr']['banner_cta_title_erorr'] : '' ?></span>


                    <input name="cta_link" placeholder="your cta link" type="text" class="form-control my-2 col-lg-4"><br><br><br>
                    <span class="text-danger"><?= isset($_SESSION['bannner_img-erorr']['banner_cta_link_erorr']) ? $_SESSION['bannner_img-erorr']['banner_cta_link_erorr'] : '' ?></span>


                    <input name="video_link" placeholder="enter  Video Link" type="text" class="form-control my-2 col-lg-4"><br>
                    <span class="text-danger"><?= isset($_SESSION['bannner_img-erorr']['banner_video_linkl_erorr']) ? $_SESSION['bannner_img-erorr']['banner_video_linkl_erorr'] : '' ?></span>




                </div>

                <label for="banner_img"><img  class="banner_img rounded-circle" src="https://api.dicebear.com/7.x/avataaars/svg?seed=anika" alt="" width="200" height="200" class="rounded-circle"></label>
                    
                <input name="banner_img" type="file" id="banner_img" class="banner d-none">




                <span class="text-danger"><?= isset($_SESSION['bannner_img-erorr']['banner_img_erorr'])?$_SESSION['bannner_img-erorr']['banner_img_erorr'] : '' ?></span><br><br>

                <button class="btn btn-primary">Add</button>





           </div>
        </div>

    </div>
    </form>
</div>















<?php

include "./backend_inc/footer.php";
unset($_SESSION['bannner_img-erorr']);
?>
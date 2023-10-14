
<?php
include "./backend_inc/header.php";
include "../database/env.php";
$id = $_REQUEST['id'];
print_r($id);

$query = "SELECT * FROM event_table WHERE id = '$id'";
$res = mysqli_query($conn,$query);
$response = mysqli_fetch_assoc($res);
print_r($response);
echo "helo"

?>



<div class="container-fluid ">
    <form action="../controller/Eventupdate.php" method="Post" enctype="multipart/form-data">
    <div class="card">
        <div class="care-header">
           <h1>Edite Events</h1>
           <div class="card-body">
            <input name="id" type="text" value="<?=$response['id']?>">
            <input name="title" value="<?= $response['title'] ?>" type="text" placeholder="Enter perties Name" class="mb-2"><br>


            <input name="taka" type="number" value="<?= $response['taka'] ?>" placeholder="price" class="mb-2"><br>
       
            




            <textarea name="details" placeholder="Enter Your details" class="form-control"> <?= $response['details'] ?> </textarea><br>
           

            <div class="row mx-0">
                    <!-- <input name="cta-title" placeholder="enter cta title" type="text" class="form-control my-2 col-lg-4"><br><br> -->

                    


                 

                   


                    <!-- <input name="video_link" placeholder="enter  Video Link" type="text" class="form-control my-2 col-lg-4"><br> -->
                




                </div>
                <label for="event_img"><img src="../uploads/event_img/<?=$response['banner_img'] ?>" alt="" width="200"></label><br>
                <input name="banner_img" type="file" id="event_img"><br><br>
                

                <button class="btn btn-primary">Event update</button> <br>





           </div>
        </div>

    </div>
    </form>
</div>

<?php

include "./backend_inc/footer.php";
unset($_SESSION['bannner_img-erorr']);
?>

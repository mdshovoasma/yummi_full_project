<?php





?>

<?php

include "./backend_inc/header.php";

?>

<div class="container-fluid">
    <form action="../controller/storeCategory.php" method="Post" enctype="multipart/form-data">
    <div class="card">
        <div class="care-header">
           <h1>Add Category</h1>
           <div class="card-body">
            <input name="title" type="text" placeholder="Enter your Category" class="mb-2"><br>
   

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
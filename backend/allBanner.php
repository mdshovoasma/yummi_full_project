<?php

include "./backend_inc/header.php";
include "../database/env.php";
$select = "SELECT * FROM banner_add";
$res = mysqli_query($conn,$select);
$response = mysqli_fetch_all($res,1);

// print_r($response);

?>

<div class="container-fluid">
  <table class="table">
    <tr>
        
        <th>#</th>
        <th>Banner_img</th>
        <th>Title</th>
        <th>Detail</th>
        <th>Featured</th>
      
        
        
    </tr>


    <?php
    foreach($response as $key => $respons){ ?>

    

<tr>
        <td><?= ++$key?></td>
        <td><img src="../uploads/users/<?= $respons['banner_img']?>" alt="" width="100"></td>
        <td><?= $respons['title']?></td>
        <td><?=strlen($respons['details']) > 10 ? substr($respons['details'],0,20)."....":$respons['details']?></td>
        <td>

        <a href="../controller/statusUpdate.php?id=<?= $respons['id']?>">





        
        <i class="<?=$respons['statas']==1 ? "fa-solid" :"fa-regular"  ?> fa-star"></i>
        </a>
        
        <td>
            <a class="btn btn-primary" href="./bannerEdite.php?id=<?=$respons['id']?>">Edit</a>
            <a class="btn btn-danger dltBtn" href="../controller/deleteBanner.php?id=<?= $respons['id']?>">Delete</a>
        </td>
    </tr>






  <?php  }
   
    
    
    
    ?>



  </table>
</div>


<?php


include "./backend_inc/footer.php";

?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
 $(".dltBtn").click(function(event){
    event.preventDefault();
    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
   window.location.href = $(this).attr("href");
  }
})
 })
</script>
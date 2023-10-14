<?php

include "./backend_inc/header.php";
include "../database/env.php";
$select = "SELECT * FROM event_table";
$res = mysqli_query($conn,$select);
$response = mysqli_fetch_all($res,1);

// print_r($response);

?>

<div class="container-fluid">
<form action="../controller/FutureEvent.php" method="post">
<table class="table">
    <tr>
        
        <th>#</th>
        <th>Event_img</th>
        <th>parties Name</th>
        <th>Price</th>
        <th>Details</th>
        <th><button class="btn btn-primary">Feature</button></th>
        <td> <button class="btn btn-primary">current slider</button></td>
      
        
        
    </tr>


    <?php
    foreach($response as $key => $respons){ ?>

    

<tr>
        <td><?= ++$key?></td>
        <td><img src="../uploads/event_img/<?= $respons['banner_img']?>" alt="" width="100"></td>
        <td><?= $respons['title']?></td>

        <td><?= $respons['taka']?></td>
        <td><?=strlen($respons['details']) > 10 ? substr($respons['details'],0,20)."....":$respons['details']?></td>
          

        




      
      
         <td><input name="multiselect_id[]" value="<?=$respons['id'] ?>" type="checkbox"></a></td>

         <td>
            <i class="text-primary <?=$respons['satatas']==1 ? "fa-solid" :"fa-regular"  ?> fa-star"></i>
        </a>
         </td>

         
        <td>
            <a class="btn btn-primary" href="./eventEdite.php?id=<?=$respons['id']?>">Edit</a>
            <a class="btn btn-danger dltBtn" href="../controller/deleteEvent.php?id=<?= $respons['id']?>">Delete</a>
        </td>
    </tr>






  <?php  }
   
    
    
    
    ?>



  </table>
</form>
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
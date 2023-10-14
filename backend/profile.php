<?php
include "./backend_inc/header.php";
// print_r($_SESSION['update_user']);



?>


<div class="container-fluid ">
    <div class="row ">
    <div class="col-6 bg-primary m-auto text-center"> <h1 class="m-auto">profile</h1></div>
    </div>
    <div class="row">
       <div class="col-8">
        <form action="../controller/profileUpdate.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-4">
                   <label for="profile-img">
                   <img id="imge" src="https://api.dicebear.com/7.x/initials/svg?seed=<?=$_SESSION['user']['fname'] ?>" alt="" width="100px">
                   <input name="profile_img_name" type="file" id="profile-img " class="profile-select ">
                   </label>

                  <span class="text-danger"> <?= isset($_SESSION['profile_erorr'])? $_SESSION['profile_erorr']['img'] : '' ?> </span>
                </div>
                <div class="col-8">
                    <input name="fname" value="<?= $_SESSION['user']['fname']?>" class="form-control m-4" type="text" placeholder="enter fast name">
                    <input name="lname"   value="<?=$_SESSION['user']['lname']?>" class="form-control m-4" type="text" placeholder="enter fast name">
                    <input name="email"  value="<?=$_SESSION['user']['email']?>" class="form-control m-4" type="email" placeholder="enter last name">
                    <button class="btn btn-primary m-4 ">update</button>
                   
                </div>

            </div>
        </form>


        
       </div>

       <div class="col-4">
            <form action="../controller/passwordUpdate.php" method="POST">
                <input name="old_password"  class="form-control m-4" type="password" placeholder="old password">
                <span><?= isset($_SESSION['erorr']['oldpassword_erorr'])?$_SESSION['erorr']['oldpassword_erorr']: ' '  ?></span>

               
                <input name="new_password"  class="form-control m-4" type="password" placeholder="new password"> 
                <span><?= isset($_SESSION['password_update_erorr']['newpassowrd_erorr'])?  $_SESSION['password_update_erorr']['newpassowrd_erorr']: ' ' ?></span>  

                <input name="conform_password" class="form-control m-4" type="password" placeholder="conform password">
                <span><?= isset($_SESSION['password_update_erorr']['conformpassword_erorr'])?  $_SESSION['password_update_erorr']['conformpassword_erorr']: ' ' ?></span> 



                <button class="btn btn-primary m-4 ">update</button>
            </form>
        </div>

        
    
    </div>
</div>

<?php
include "./backend_inc/footer.php";
unset($_SESSION['profile_erorr']);



?>
<script>
    var profile= document.querySelector(".profile-select");
    var imge = document.querySelector('#imge');
    profile.addEventListener("change",(event)=>{
        // console.log(event.target);
        imge.src =URL.createObjectURL(event.target.files[0]);
     
    })
</script>


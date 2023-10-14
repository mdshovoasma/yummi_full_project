<?php
include "../database/env.php";


$event_feature_select = "UPDATE event_table SET satatas=0";

$future_ex = mysqli_query($conn,$event_feature_select);
header("location:../backend/allEvent.php");


if(isset($_REQUEST['multiselect_id'])){
    $multiselect_id=$_REQUEST['multiselect_id'];
    $export_id = implode(",",$multiselect_id);
    
  
    $update_future = "UPDATE event_table SET satatas=1 WHERE id IN($export_id)";
    $update_ex = mysqli_query($conn,$update_future);
    if($update_ex){
        header("location:../backend/allEvent.php");

    }
    
    

}






?>
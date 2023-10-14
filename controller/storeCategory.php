<?php
include "../database/env.php";
$title = $_REQUEST['title'];

$query = "INSERT INTO store_category (title) VALUES ('$title')";

// $a  = INSERT INTO `store_category`(`id`, `title`) VALUES ('[value-1]','[value-2]');

$res = mysqli_query($conn,$query);
if($res){
    header("location:../backend/addCategory.php");

}





?>
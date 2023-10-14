<?php
include "../database/env.php";
$id = $_REQUEST['id'];
// echo "$id";

$select = "UPDATE banner_add SET statas =0 ";
$res = mysqli_query($conn,$select);


$query = "UPDATE banner_add SET statas = 1 WHERE id= '$id' ";
$query_ex = mysqli_query($conn,$query);
header("location:../backend/allBanner.php");




?>
<?php
include "../database/env.php";
$id = $_REQUEST['id'];
echo "$id";



$select = "UPDATE cook_table SET satatas =0 ";
$res = mysqli_query($conn,$select);


$query = "UPDATE cook_table SET satatas = 1 WHERE id= '$id' ";
$query_ex = mysqli_query($conn,$query);
header("location:../backend/allcook.php");




?>
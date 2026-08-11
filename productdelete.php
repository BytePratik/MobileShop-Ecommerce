<?php 
include("connection.php"); 

 $product_code= $_GET['product_code']?? null; 
$sql="DELETE from products where product_code='$product_code'";
$query=mysqli_query($conn,$sql);
if ($query) {
	header("location:productdata.php");
}


 ?>
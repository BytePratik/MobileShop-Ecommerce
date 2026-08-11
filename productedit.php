<?php 
session_start();
include("connection.php"); 
if(!isset($_SESSION['admin']))
{
    header("Location:adminlogin.php");
    exit;
}

 $product_code= $_GET['product_code']?? null; 


$cmd1="select * from products where product_code = '$product_code'";
$query1=mysqli_query($conn,$cmd1);
 if ($row=mysqli_fetch_array($query1)){ 
        

      $d_price = $row['price'];
    $d_quantity=  $row['quantity'];
        $d_details = $row['details'];
        $d_status= $row['status'];
} 
if(isset($_POST['submit'])){
	
	
	
	$Price=$_POST['price'];
	$Quantity=$_POST['quantity'];
	$Details=$_POST['details'];
	$Status=$_POST['status'];
	


 $cmd = "UPDATE products SET price='$Price',quantity='$Quantity',
               Details='$Details',status='$Status'
            WHERE product_code='$product_code'";

    $query = mysqli_query($conn, $cmd);

   if($query){
    if(mysqli_affected_rows($conn) > 0){
    	echo"updated successfully";
        header("Location: productdata.php");
        exit; // always exit after header redirect
    } else {
        echo "No rows updated.";
    }
} else {
    echo "Update Failed: " . mysqli_error($conn);
}
 include("sidebar.php");


}

mysqli_close($conn);


 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Product</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body{
			background:  whitesmoke;
		}
.glass-container{
    width:90%;
    max-width:1500px;
    padding:40px;
    border-radius:30px;
    background: rgba(255,255,255,0.15);

    backdrop-filter: blur(25px);
    -webkit-backdrop-filter: blur(25px);
    border:1px solid rgba(255,255,255,0.3);
    box-shadow:0 20px 50px rgba(0,0,0,0.15);
}
.glass-card{
    background: rgba(255,255,255,0.2);
    backdrop-filter: blur(20px);
    border-radius:20px;
    border:1px solid rgba(255,255,255,0.3);
    box-shadow:5px 8px 0px lavender;
    padding:20px;
}



	</style>
</head>
<body>
<div class="main-content" id="mainContent">
	<div class="glass-container">
		<h1 class="text-center" style="color:lavender;text-shadow: 3px 3px 5px blueviolet;">Add Product</h1>
		<form method="post" enctype="multipart/form-data">
		
		
		<div class="row row-cols-1 row-cols-md-2 mb-3">
			<div class="col">
				<div class="glass-card">
					 <label class="form-label">
					Price<span class="text-danger">*</span>
                            </label>
                             <input type="text" class="form-control" value="<?=@$d_price?>" placeholder="Enter Price" name="price">
				</div>
			</div>
			<!-- col close -->
			<div class="col">
				<div class="glass-card">
					 <label class="form-label">
					Quantity<span class="text-danger">*</span>
                            </label>
                            <input type="number" name="quantity" class="form-control" value="<?=$d_quantity?>" placeholder="Quantity">
                            
				</div>
			</div>
			<!-- col close -->
		</div>
		<div class="row mb-3">
			<div class="col">
				<div class="glass-card">
					 <label class="form-label">
					Details<span class="text-danger">*</span>
                            </label>
                             <textarea class="form-control" placeholder="Enter Details"  name="details"><?=$d_details?></textarea>
					
				</div>
			</div>
		</div>



<div class="row row-cols-1 row-cols-md-2 mb-3">
			<div class="col">
				<div class="glass-card">
					 <label class="form-label">
                            Status <span class="text-danger">*</span>
                        </label>

                        <select class="form-select" name="status">
                              <option value="Available" <?= $d_status=="Available" ? "selected" : "" ?>>Available</option>
    <option value="Not available" <?= $d_status=="Not available" ? "selected" : "" ?>>Not available</option>
                        </select>
				</div>
			</div>
			<!-- col close -->
			<div class="col mt-3">
				<div class="glass-card">
				  <button type="submit"
                        class="btn  px-4 w-100" name="submit" style="background:  linear-gradient(135deg,#8f7bff,#b7a8ff);">
                    <i class="fa fa-save me-2"></i>
                 Edit
                </button>
            </div>
			</div>
			
			<!-- col close -->
		</div>
	</form>


			





		


	</div>
	

<!-- main close -->
</div>
</body>
</html>	
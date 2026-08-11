<?php 
session_start();
include("connection.php"); 
if(!isset($_SESSION['admin']))
{
    header("Location:adminlogin.php");
    exit;
}
 include("sidebar.php"); 
if(isset($_POST['submit'])){
	$Brand=$_POST['brand'];
	$Pname=$_POST['Pname'];
	$Mname=$_POST['model'];
	$Price=$_POST['price'];
	$Quantity=$_POST['quantity'];
	$Details=$_POST['details'];
	$Status=$_POST['status'];
	 $img = isset($_FILES["img"]["name"]) ? $_FILES["img"]["name"] : "";
$tempname = isset($_FILES["img"]["tmp_name"]) ? $_FILES["img"]["tmp_name"] : "";
$folder = "./img/" . $img; 
move_uploaded_file(
    $tempname,
    $folder
);

if($Brand=="Samsung")
{
    $prefix="SM";
}
elseif($Brand=="Apple")
{
    $prefix="AP";
}
elseif($Brand=="Nothing")
{
    $prefix="NO";
}
elseif($Brand=="MI")
{
    $prefix="MI";
}
elseif($Brand=="One Plus")
{
    $prefix="OP";
}
elseif($Brand=="Google")
{
    $prefix="GO ";
}
$sql="
SELECT product_code
FROM products
WHERE Brand='$Brand'
ORDER BY id DESC
LIMIT 1
";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
    $row=mysqli_fetch_assoc($result);

    $last_code=$row['product_code'];
}
else
{
    $last_code="";
}
if($last_code=="")
{
    $product_code=$prefix."001";
}
else
{
    $number = substr($last_code,2);

    $number = (int)$number;

    $number++;

    $number = str_pad(
        $number,
        3,
        "0",
        STR_PAD_LEFT
    );

    $product_code = $prefix.$number;
}


    $insert = "
INSERT INTO products(product_code,brand,product_name,image,model_name,Price,quantity,details,status)
VALUES
('$product_code','$Brand','$Pname','$img','$Mname','$Price','$Quantity','$Details','$Status')";

mysqli_query($conn,$insert);

echo "
<script>
alert('Product Added Successfully');
window.location='productdata.php';
</script>
";
}

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
                               Brand <span class="text-danger">*</span>
                            </label>

                            <select class="form-select" name="brand" >
                                <option>Select the Brand</option>
                                <option value="Samsung">Samsung</option>
                                <option value="Apple">Apple</option>
                                <option value="Nothing">Nothing</option>
                                <option value="One Plus">One Plus</option>
                                <option value="MI">MI</option>
                                <option value="Google">Google</option>
                            </select>
				</div>
			</div>
			<!-- col close -->

			<div class="col">
				<div class="glass-card">
					 <label class="form-label">
					Product Name<span class="text-danger">*</span>
                            </label>
                             <input type="text" class="form-control" placeholder="Enter Product Name" name="Pname">
				</div>
			</div>
			<!-- col close -->
		</div>
		<div class="row row-cols-1 row-cols-md-2 mb-3">
			<div class="col">
				<div class="glass-card">
					 <label class="form-label">
				Image<span class="text-danger">*</span>
                            </label>
                             <input type="file" class="form-control" placeholder="Insert image" name="img">
				</div>
			</div>
			<!-- col close -->
			<div class="col">
				<div class="glass-card">
					 <label class="form-label">
					Model Name<span class="text-danger">*</span>
                            </label>
                             <input type="text" class="form-control" placeholder="Enter Model Name" name="model">
				</div>
			</div>
			<!-- col close -->
		</div>
		<div class="row row-cols-1 row-cols-md-2 mb-3">
			<div class="col">
				<div class="glass-card">
					 <label class="form-label">
					Price<span class="text-danger">*</span>
                            </label>
                             <input type="text" class="form-control" placeholder="Enter Price" name="price">
				</div>
			</div>
			<!-- col close -->
			<div class="col">
				<div class="glass-card">
					 <label class="form-label">
					Quantity<span class="text-danger">*</span>
                            </label>
                            <input type="number" name="quantity" class="form-control" placeholder="Quantity">
                            
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
                             <textarea class="form-control" placeholder="Enter Details" name="details"></textarea>
					
				</div>
			</div>
		</div>



<div class="row row-cols-1 row-cols-md-2 mb-3">
			<div class="col">
				<div class="glass-card">
					 <label class="form-label">
                            Status <span class="text-danger">*</span>
                        </label>

                        <select class="form-select"  name="status">
                            <option value="Available">Available</option>
                            <option value="Not available">Not available</option>
                        </select>
				</div>
			</div>
			<!-- col close -->
			<div class="col mt-3">
				<div class="glass-card">
				  <button type="submit"
                        class="btn  px-4 w-100" name="submit" style="background:  linear-gradient(135deg,#8f7bff,#b7a8ff);">
                    <i class="fa fa-save me-2"></i>
                   Save Product
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
<?php
session_start();

include("connection.php");


include("navbar.php");

$product_code = $_GET['product_code'] ?? null;

/* Fetch Product Details */

$cmd1 = "SELECT * FROM products WHERE product_code='$product_code'";
$query1 = mysqli_query($conn,$cmd1);

if($row = mysqli_fetch_assoc($query1))
{
    $d_price   = $row['price'];
    $d_product = $row['product_name'];
    $d_details = $row['details'];
    $d_status  = $row['status'];
    $d_img     = $row['image'];
    $d_brand   = $row['brand'];
}

/* Add To Cart */

if(isset($_POST['submit']))
{

    $cmd = "SELECT * FROM products WHERE product_code='$product_code'";
    $query = mysqli_query($conn,$cmd);

    if($row = mysqli_fetch_assoc($query))
    {

        $item = array(

            "code"=>$row['product_code'],
            "name"=>$row['product_name'],
            "price"=>$row['price'],
            "image"=>$row['image'],
            "quantity"=>1

        );

        if(!isset($_SESSION['cart']))
        {
            $_SESSION['cart'] = array();
        }

        $found = false;

        foreach($_SESSION['cart'] as &$cart_item)
        {
            if($cart_item['code'] == $item['code'])
            {
                $cart_item['quantity']++;
                $found = true;
                break;
            }
        }

        if(!$found)
        {
            $_SESSION['cart'][] = $item;
        }

    }

    
}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>view product</title>
	<style>
		.c{
			height: 250px;
			width: 180px;
		}
	</style>
</head>
<body>
<div class="container">
	

<div class="card mb-3 mt-5 p-5" style="max-width: 1540px; ">
  <div class="row g-0">
    <div class="col-md-4  border-end border-dark">
      <img src="img/<?php echo  $d_img ;?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body" style="background: lavender;">
         <h4 class="card-title">BRAND:<?php echo  $d_brand ;?></h4>
     <h5 class="card-title">MODEL:<?php echo  $d_product ;?></h5>
     <h4   class="card-text">PRICE:<?php echo  $d_price ;?></h4>
       <p class="card-text"><small class="text-body-secondary"><?php echo  $d_status ;?></small></p>
    <p class="card-text"><?php echo  $d_details ;?></p><form method="post">
    <div class="d-flex justify-content-center gap-4"> <button name="submit" type="submit" class="btn btn-light border border-dark">ADD To Cart</button></form>

    	<a href="buynow.php?product_code=<?php echo $row['product_code'];?>" class="btn  w-50" style="background: #8f7bff;">BUY Now</a></div>
   
      
      </div>
    </div>
  </div>
</div>
</div>
<?php include("footer.php") ?>


</body>
</html>
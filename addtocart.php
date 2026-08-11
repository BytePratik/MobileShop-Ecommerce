<?php
session_start();

include("connection.php");

if(!isset($_SESSION['user']))
{
    header("Location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">

<meta name="viewport"
content="width=device-width, initial-scale=1">

<title>Shopping Cart</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f5f5;
}

table img{
    width:80px;
    height:80px;
    object-fit:cover;
}

</style>

</head>

<body>
     <div class=" d-flex justify-content-start mt-4">
            <a href="index.php" class="btn  btn-primary border border-1">Go to Home</a>
        </div>

<div class="container mt-5">

<h2 class="mb-4">

Shopping Cart

</h2>

<?php

if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
{

$total = 0;

?>

<table class="table table-bordered table-hover text-center align-middle">

<thead class="table-dark">

<tr>

<th>Image</th>

<th>Product</th>

<th>Price</th>

<th>Quantity</th>

<th>Subtotal</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php

foreach($_SESSION['cart'] as $item)
{

$subtotal = $item['price'] * $item['quantity'];

$total += $subtotal;

?>

<tr>

<td>

<img
src="img/<?php echo $item['image'];?>">

</td>

<td>

<?php echo $item['name'];?>

</td>

<td>

₹<?php echo number_format($item['price']);?>

</td>

<td>

<a href="decrease.php?code=<?php echo $item['code']; ?>"
class="btn btn-sm btn-danger">

-

</a>

<span class="mx-2 fw-bold">

<?php echo $item['quantity'];?>

</span>

<a href="increase.php?code=<?php echo $item['code']; ?>"
class="btn btn-sm btn-success">

+

</a>

</td>


<td>

₹<?php echo number_format($subtotal);?>

</td>
<td>

<a href="removecart.php?code=<?php echo $item['code']; ?>"
class="btn btn-danger btn-sm">

Remove

</a>

</td>

</tr>

<?php

}

?>

<tr>

<td colspan="4" class="text-end fw-bold">

Grand Total

</td>

<td class="fw-bold">

₹<?php echo number_format($total);?>

</td>


</tr>


</tbody>

</table>

<div class="d-flex justify-content-between">

<a href="index.php"
class="btn btn-secondary">

Continue Shopping

</a>

<a href="checkout.php"
class="btn btn-success">

Checkout

</a>

</div>

<?php

}
else
{

?>

<div class="alert alert-warning">

Your Cart Is Empty

</div>

<a href="homepage.php"
class="btn btn-primary">

Shop Now

</a>

<?php

}

?>

</div>
<?php include("footer.php") ?>


</body>

</html>
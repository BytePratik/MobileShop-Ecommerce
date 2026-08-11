<?php
session_start();
include("connection.php");

if(!isset($_SESSION['user']))
{
    header("Location:login.php");
    exit;
}

$email = $_SESSION['user'];

$user = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
$user = mysqli_fetch_assoc($user);

$total = 0;

foreach($_SESSION['cart'] as $item)
{
    $total += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Checkout</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="row">

<div class="col-md-7">

<form action="placeordercart.php" method="POST">

<input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">

<input type="hidden" name="full_name" value="<?php echo $user['full_name']; ?>">

<input type="hidden" name="email" value="<?php echo $user['email']; ?>">

<input type="hidden" name="mobile" value="<?php echo $user['mobile']; ?>">

<input type="hidden" name="address" value="<?php echo $user['address']; ?>">

<input type="hidden" name="city" value="<?php echo $user['city']; ?>">

<input type="hidden" name="state" value="<?php echo $user['state']; ?>">

<input type="hidden" name="pincode" value="<?php echo $user['pincode']; ?>">

<h3>Customer Details</h3>

<p><b>Name :</b> <?php echo $user['full_name']; ?></p>

<p><b>Email :</b> <?php echo $user['email']; ?></p>

<p><b>Mobile :</b> <?php echo $user['mobile']; ?></p>

<p><b>Address :</b> <?php echo $user['address']; ?></p>

<hr>

<label>Payment Method</label>

<select name="payment" class="form-select">

<option value="Cash On Delivery">Cash On Delivery</option>

<option value="UPI">UPI</option>

<option value="Debit Card">Debit Card</option>

<option value="Credit Card">Credit Card</option>

</select>

<br>

<button class="btn btn-success w-100">

Place Order

</button>

</form>

</div>

<div class="col-md-5">

<div class="card p-3">

<h4>Order Summary</h4>

<hr>

<?php

foreach($_SESSION['cart'] as $item)
{

?>

<p>

<?php echo $item['name']; ?>

<br>

Qty : <?php echo $item['quantity']; ?>

<span class="float-end">

₹<?php echo number_format($item['price']*$item['quantity']); ?>

</span>

</p>

<?php

}

?>

<hr>

<h4>

Grand Total

<span class="float-end">

₹<?php echo number_format($total); ?>

</span>

</h4>

</div>

</div>

</div>

</div>

</body>
<?php include("footer.php") ?>


</html>
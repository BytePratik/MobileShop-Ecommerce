<?php
session_start();

include("connection.php");

if(!isset($_SESSION['user']))
{
    header("Location:login.php");
    exit;
}
include('navbar.php');

$email = $_SESSION['user'];

$user = mysqli_query($conn,
"SELECT id FROM users
WHERE email='$email'");

$user = mysqli_fetch_assoc($user);

$user_id = $user['id'];

$sql = "SELECT * FROM orderss
WHERE user_id='$user_id'
ORDER BY id DESC";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>

<title>My Orders</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2 class="mb-4">

My Orders

</h2>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>Order ID</th>

<th>Product</th>

<th>Price</th>

<th>Qty</th>

<th>Total</th>

<th>Payment</th>

<th>Status</th>

<th>Date</th>

<th>Action</th>

</tr>

</thead>

<tbody>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td>

<?php echo $row['id']; ?>

</td>

<td>

<?php echo $row['product_name']; ?>

</td>

<td>

₹<?php echo number_format($row['price']); ?>

</td>

<td>

<?php echo $row['quantity']; ?>

</td>

<td>

₹<?php echo number_format($row['total']); ?>

</td>

<td>

<?php echo $row['payment_method']; ?>

</td>

<td>

<?php echo $row['order_status']; ?>

</td>

<td>

<?php echo $row['order_date']; ?>

</td>

<td>

<?php

if($row['order_status']=="Pending")
{

?>

<a href="cancelorder.php?id=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Cancel this order?')">

Cancel

</a>

<?php

}
else
{

echo $row['order_status'];

}

?>

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>
<?php include("footer.php") ?>


</body>

</html>
<?php

session_start();

include("connection.php");

if(!isset($_SESSION['user']))
{
    header("Location:login.php");
    exit;
}

$user_id=$_POST['user_id'];

$payment=$_POST['payment'];

$full_name=$_POST['full_name'];

$email=$_POST['email'];

$mobile=$_POST['mobile'];

$address=$_POST['address'];

$city=$_POST['city'];

$state=$_POST['state'];

$pincode=$_POST['pincode'];

foreach($_SESSION['cart'] as $item)
{

$product_code=$item['code'];

$product_name=$item['name'];

$price=$item['price'];

$quantity=$item['quantity'];

$total=$price*$quantity;



mysqli_query($conn,

"INSERT INTO orderss
(
user_id,
product_code,
product_name,
price,
quantity,
total,
payment_method,
full_name,
email,
mobile,
address,
city,
state,
pincode
)

VALUES
(
'$user_id',
'$product_code',
'$product_name',
'$price',
'$quantity',
'$total',
'$payment',
'$full_name',
'$email',
'$mobile',
'$address',
'$city',
'$state',
'$pincode'
)");

/* Reduce Stock */

$product=mysqli_query($conn,

"SELECT quantity
FROM products
WHERE product_code='$product_code'");

$product=mysqli_fetch_assoc($product);

$new_stock=$product['quantity']-$quantity;

mysqli_query($conn,

"UPDATE products
SET quantity='$new_stock'
WHERE product_code='$product_code'");

}

/* Empty Cart */

unset($_SESSION['cart']);

echo "<script>

alert('Order Placed Successfully');

window.location='index.php';

</script>";

?>
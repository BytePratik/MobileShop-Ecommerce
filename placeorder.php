<?php

session_start();

include("connection.php");

if(!isset($_SESSION['user']))
{
    header("Location:login.php");
    exit;
}

if(isset($_POST['product_code']))
{

$user_id = $_POST['user_id'];

$product_code = $_POST['product_code'];

$quantity = $_POST['quantity'];

$payment = $_POST['payment'];

$full_name = $_POST['full_name'];

$email = $_POST['email'];

$mobile = $_POST['mobile'];

$address = $_POST['address'];

$city = $_POST['city'];

$state = $_POST['state'];

$pincode = $_POST['pincode'];


// Fetch Product

$sql = "SELECT * FROM products
WHERE product_code='$product_code'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{

$product = mysqli_fetch_assoc($result);

$product_name = $product['product_name'];

$price = $product['price'];

$stock = $product['quantity'];


// Check Stock

if($quantity > $stock)
{
    echo "<script>

    alert('Only $stock Product Available');

    history.back();

    </script>";

    exit;
}


// Calculate Total

$total = $price * $quantity;


// Insert Order

$insert = "INSERT INTO orderss
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
)";

if(mysqli_query($conn,$insert))
{
$order_id = mysqli_insert_id($conn);

$new_stock = $stock - $quantity;
// Update Stock
$update = "UPDATE products
SET quantity='$new_stock'
WHERE product_code='$product_code'";
mysqli_query($conn,$update);

echo "<script>
if(confirm('Order Placed Successfully! Do you want to view/download your bill?'))
{
    window.location='bill.php?order_id=$order_id';
}
else
{
    window.location='index.php';
}
</script>";
}
else
{

echo "<script>

alert('Order Not Placed');

history.back();

</script>";

}

}
else
{

echo "<script>

alert('Product Not Found');

history.back();

</script>";

}

}
else
{

header("Location:index.php");

}
 
?>
<?php

include("connection.php");

$order_id = $_GET['id'];

$sql = "SELECT * FROM orderss
WHERE id='$order_id'";

$result = mysqli_query($conn,$sql);

$order = mysqli_fetch_assoc($result);

$product_code = $order['product_code'];

$qty = $order['quantity'];

mysqli_query($conn,

"UPDATE orderss
SET order_status='Cancelled'
WHERE id='$order_id'");

$product = mysqli_query($conn,

"SELECT quantity FROM products
WHERE product_code='$product_code'");

$product = mysqli_fetch_assoc($product);

$new_stock = $product['quantity'] + $qty;

mysqli_query($conn,

"UPDATE products
SET quantity='$new_stock'
WHERE product_code='$product_code'");

echo "<script>

alert('Order Cancelled Successfully');

window.location='vieworder.php';

</script>";

?>
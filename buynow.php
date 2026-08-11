<?php
session_start();
include("connection.php");

if(!isset($_SESSION['user']))
{
    header("Location:login.php");
    exit;
}
include("navbar.php");


$product_code = $_GET['product_code'] ?? '';

$sql = "SELECT * FROM products WHERE product_code='$product_code'";
$result = mysqli_query($conn,$sql);
$product = mysqli_fetch_assoc($result);

$email = $_SESSION['user'];

$sql2 = "SELECT * FROM users WHERE email='$email'";
$result2 = mysqli_query($conn,$sql2);
$user = mysqli_fetch_assoc($result2);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Checkout</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f5f5;
}

.card img{
    max-height:450px;
    object-fit:contain;
}

</style>

</head>

<body>

<div class="container mt-5">

<div class="card p-4">

<div class="row">

<div class="col-md-4">

<img src="img/<?php echo $product['image']; ?>" class="img-fluid">

</div>

<div class="col-md-8">

<form action="placeorder.php" method="POST">

<h3><?php echo $product['brand']; ?></h3>

<h4><?php echo $product['product_name']; ?></h4>

<p><?php echo $product['details']; ?></p>

<h3>

₹ <span id="total">

<?php echo number_format($product['price']); ?>

</span>

</h3>

<hr>

<!-- Product Details -->

<input type="hidden" name="product_code" value="<?php echo $product['product_code']; ?>">

<input type="hidden" id="price" value="<?php echo $product['price']; ?>">

<!-- User Details -->

<input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">

<input type="hidden" name="full_name" value="<?php echo $user['full_name']; ?>">

<input type="hidden" name="email" value="<?php echo $user['email']; ?>">

<input type="hidden" name="mobile" value="<?php echo $user['mobile']; ?>">

<input type="hidden" name="address" value="<?php echo $user['address']; ?>">

<input type="hidden" name="city" value="<?php echo $user['city']; ?>">

<input type="hidden" name="state" value="<?php echo $user['state']; ?>">

<input type="hidden" name="pincode" value="<?php echo $user['pincode']; ?>">

<div class="mb-3">

<label class="fw-bold">

Quantity

</label>

<div class="d-flex align-items-center gap-2">

<button
type="button"
class="btn btn-danger"
onclick="decrease()">

-

</button>

<input
type="text"
id="quantity"
name="quantity"
value="1"
readonly
class="form-control text-center"
style="width:70px;">

<button
type="button"
class="btn btn-success"
onclick="increase()">

+

</button>

</div>

</div>

<hr>

<h4>Customer Details</h4>

<p><b>Name :</b> <?php echo $user['full_name']; ?></p>

<p><b>Email :</b> <?php echo $user['email']; ?></p>

<p><b>Mobile :</b> <?php echo $user['mobile']; ?></p>

<p><b>Address :</b> <?php echo $user['address']; ?></p>

<p><b>City :</b> <?php echo $user['city']; ?></p>

<p><b>State :</b> <?php echo $user['state']; ?></p>

<p><b>Pincode :</b> <?php echo $user['pincode']; ?></p>

<hr>

<label class="fw-bold">

Payment Method

</label>

<select
name="payment"
class="form-select mb-3">

<option value="Cash On Delivery">Cash On Delivery</option>

<option value="UPI">UPI</option>

<option value="Debit Card">Debit Card</option>

<option value="Credit Card">Credit Card</option>

</select>

<button
type="submit"
class="btn btn-success w-100">

Place Order

</button>

</form>

</div>

</div>

</div>

</div>

<script>

let stock = <?php echo $product['quantity']; ?>;

let price = <?php echo $product['price']; ?>;

function increase()
{
    let qty = document.getElementById("quantity");

    let quantity = parseInt(qty.value);

    if(quantity < stock)
    {
        quantity++;

        qty.value = quantity;

        document.getElementById("total").innerHTML =
        (price * quantity).toLocaleString();
    }
    else
    {
        alert("Only " + stock + " item(s) available.");
    }
}

function decrease()
{
    let qty = document.getElementById("quantity");

    let quantity = parseInt(qty.value);

    if(quantity > 1)
    {
        quantity--;

        qty.value = quantity;

        document.getElementById("total").innerHTML =
        (price * quantity).toLocaleString();
    }
}

</script>
<?php include("footer.php") ?>

</body>
</html>
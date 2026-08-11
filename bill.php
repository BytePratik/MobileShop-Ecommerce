<?php
session_start();
include("connection.php");

if(!isset($_SESSION['user']))
{
    header("Location:login.php");
    exit;
}

$order_id = $_GET['order_id'] ?? '';

$sql = "SELECT * FROM orderss WHERE id='$order_id'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) == 0)
{
    echo "<script>
    alert('Order Not Found');
    window.location='homepage.php';
    </script>";
    exit;
}

$order = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bill</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f5f5;
}

.bill-box{
    max-width:650px;
    margin:40px auto;
    background:#fff;
    border-radius:12px;
    padding:35px;
    box-shadow:0 5px 20px rgba(0,0,0,0.1);
}

.bill-header{
    text-align:center;
    border-bottom:2px dashed #ccc;
    padding-bottom:15px;
    margin-bottom:20px;
}

.bill-table td{
    padding:6px 0;
}

.bill-total{
    border-top:2px dashed #ccc;
    margin-top:15px;
    padding-top:15px;
    text-align:right;
}

@media print{
    .no-print{
        display:none;
    }
    body{
        background:#fff;
    }
    .bill-box{
        box-shadow:none;
        margin:0;
    }
}

</style>
</head>
<body>

<div class="bill-box">

    <div class="bill-header">
        <h3>MOBISHOP</h3>
        <p class="mb-0 text-muted">Order Receipt</p>
    </div>

    <table class="bill-table w-100">
        <tr>
            <td><b>Order ID</b></td>
            <td class="text-end">#<?php echo $order['id']; ?></td>
        </tr>
        <tr>
            <td><b>Date</b></td>
            <td class="text-end"><?php echo date("d M Y, h:i A"); ?></td>
        </tr>
    </table>

    <hr>

    <table class="bill-table w-100">
        <tr>
            <td><b>Customer</b></td>
            <td class="text-end"><?php echo $order['full_name']; ?></td>
        </tr>
        <tr>
            <td><b>Email</b></td>
            <td class="text-end"><?php echo $order['email']; ?></td>
        </tr>
        <tr>
            <td><b>Mobile</b></td>
            <td class="text-end"><?php echo $order['mobile']; ?></td>
        </tr>
        <tr>
            <td><b>Address</b></td>
            <td class="text-end">
                <?php echo $order['address'].", ".$order['city'].", ".$order['state']." - ".$order['pincode']; ?>
            </td>
        </tr>
    </table>

    <hr>

    <table class="bill-table w-100">
        <tr>
            <td><b>Product</b></td>
            <td class="text-end"><?php echo $order['product_name']; ?></td>
        </tr>
        <tr>
            <td><b>Price</b></td>
            <td class="text-end">₹ <?php echo number_format($order['price']); ?></td>
        </tr>
        <tr>
            <td><b>Quantity</b></td>
            <td class="text-end"><?php echo $order['quantity']; ?></td>
        </tr>
        <tr>
            <td><b>Payment Method</b></td>
            <td class="text-end"><?php echo $order['payment_method']; ?></td>
        </tr>
    </table>

    <div class="bill-total">
        <h4>Total : ₹ <?php echo number_format($order['total']); ?></h4>
    </div>

    <div class="text-center mt-4 no-print">
        <button class="btn btn-success px-4" onclick="window.print()">
            Print 
        </button>
        <a href="index.php" class="btn btn-outline-secondary px-4">
            Back to Home
        </a>
    </div>

</div>

</body>
</html>
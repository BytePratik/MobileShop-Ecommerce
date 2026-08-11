<?php

session_start();

include("connection.php");
if(!isset($_SESSION['admin']))
{
    header("Location:adminlogin.php");
    exit;
}
include("sidebar.php");

$sql = "SELECT

DATE_FORMAT(order_date,'%M %Y') AS month,

COUNT(id) AS total_orders,

SUM(total) AS total_sales

FROM orderss

WHERE order_status!='Cancelled'

GROUP BY YEAR(order_date),MONTH(order_date)

ORDER BY YEAR(order_date) DESC,
MONTH(order_date) DESC";

$result = mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Monthly Sales</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f5f5;
}

.card{
    border-radius:20px;
}

.table th{
    background:linear-gradient(135deg,#8f7bff,#b7a8ff);
    color:white;
}

</style>

</head>

<body>
<div class="main-content" id="mainContent">
<div class="main-content">

<div class="container-fluid mt-4">

<h2 class="mb-4">

Monthly Sales Report

</h2>

<div class="card shadow">

<div class="card-body">

<table class="table table-bordered table-hover text-center">

<thead>

<tr>

<th>Month</th>

<th>Total Orders</th>

<th>Total Revenue (₹)</th>

</tr>

</thead>

<tbody>

<?php

$grand = 0;

while($row=mysqli_fetch_assoc($result))
{

$grand += $row['total_sales'];

?>

<tr>

<td>

<?php echo $row['month']; ?>

</td>

<td>

<?php echo $row['total_orders']; ?>

</td>

<td>

₹<?php echo number_format($row['total_sales']); ?>

</td>

</tr>

<?php

}

?>

<tr class="table-success fw-bold">

<td colspan="2">

Grand Total

</td>

<td>

₹<?php echo number_format($grand); ?>

</td>

</tr>

</tbody>

</table>

</div>

</div>

</div>

</div>
</div>

</body>

</html>
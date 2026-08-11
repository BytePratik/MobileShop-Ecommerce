<?php 
session_start();

include("connection.php");
if(!isset($_SESSION['admin']))
{
    header("Location:adminlogin.php");
    exit;
}
include("sidebar.php");
$sql = "SELECT * FROM feedback ORDER BY user DESC LIMIT 5";

$query=mysqli_query($conn,$sql);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 </head>
 <body>
 	<!DOCTYPE html>
<html>
<head>

<title>My Orders</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
	<div class="main-content" id="mainContent">

<div class="container mt-5">

<h2 class="mb-4">

All Feedback

</h2>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>USER</th>

<th>Feedback</th>



</tr>

</thead>

<tbody>

<?php

while($row=mysqli_fetch_assoc($query))
{

?>

<tr>

<td>

<?php echo $row['user']; ?>

</td>

<td>
	<?php echo $row['feedback']; ?>

</td>
</tr>
<?php } ?>
</tbody></table></div>
 </div>
 </body>
 </html>
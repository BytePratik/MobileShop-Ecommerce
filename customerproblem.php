<?php

include("connection.php");
include("sidebar.php");

$sql = "SELECT * FROM contact_support ORDER BY id DESC";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Customer Support</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f5f5;
}

.table th{
    background:linear-gradient(135deg,#8f7bff,#b7a8ff);
    color:white;
}

.table td{
    vertical-align:middle;
}

.message{
    max-width:300px;
    white-space:normal;
}

</style>

</head>

<body>

<div class="main-content" id="mainContent">

<div class="container-fluid mt-4">

<h2 class="mb-4">

Customer Support Messages

</h2>

<div class="table-responsive">

<table class="table table-bordered table-hover text-center">

<thead>

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Mobile</th>

<th>Subject</th>

<th>Message</th>

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

<?php echo $row['name']; ?>

</td>

<td>

<?php echo $row['email']; ?>

</td>

<td>

<?php echo $row['mobile']; ?>

</td>

<td>

<?php echo $row['subject']; ?>

</td>

<td class="message">

<?php echo $row['message']; ?>

</td>

<td>

<?php echo $row['created_at']; ?>

</td>

<td>

<a href="deletesupport.php?id=<?php echo $row['id']; ?>"

class="btn btn-danger btn-sm"

onclick="return confirm('Delete this message?')">

Delete

</a>

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</div>

</div>

</body>

</html>
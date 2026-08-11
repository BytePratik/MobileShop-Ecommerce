<?php

session_start();
include("connection.php");


include("navbar.php");

$search = "";

if(isset($_GET['search']))
{
    $search = trim($_GET['search']);
}

$sql = "
SELECT *
FROM products
WHERE
brand LIKE '%$search%'
OR
product_name LIKE '%$search%'
OR
model_name LIKE '%$search%'
 OR price LIKE '%$search%'
ORDER BY brand
";

$result = mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html>
<head>

<title>Search Products</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .card-img-top {
            height: 180px;
          padding: 10px;
        }
</style>

</head>

<body>

<div class="container mt-5">

<h2 class="mb-4">

Search Result For :

<b>

<?php echo htmlspecialchars($search); ?>

</b>

</h2>

<div class="row">
    <?php

if(mysqli_num_rows($result)>0)
{

while($row=mysqli_fetch_assoc($result))
{

?> 

<div class="col-lg-3 col-md-4 col-sm-6 mb-4">

<div class="card shadow h-100">

<img
src="img/<?php echo $row['image'];?>"
class="card-img-top"
>

<div class="card-body">

<h5>

<?php echo $row['product_name'];?>

</h5>

<p>

Brand :

<?php echo $row['brand'];?>

</p>

<p>

Model :

<?php echo $row['model_name'];?>

</p>

<p>

₹ <?php echo $row['price'];?>

</p>
<form method="get">
<a
href="viewproduct.php?product_code=<?php echo $row['product_code'];?>"
class="btn btn-primary w-100">

View Details

</a></form>

</div>

</div>

</div>

<?php

}

}
else
{

?>
<div class="col-12">

<div class="alert alert-danger text-center">

No Product Found

</div>

</div>

<?php

}

?>
</div>

</div>
<?php include("footer.php") ?>

</body>

</html>
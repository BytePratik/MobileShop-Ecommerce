<?php 

include("connection.php");
// $cmd="select * from sturecord";
// $query=mysqli_query($conn,$cmd);



$search = "";


if(isset($_GET['search']))
{
    $search = mysqli_real_escape_string($conn, $_GET['search']);
}

$sql = "SELECT * FROM products
        WHERE 
         brand LIKE '%$search%'
        OR model_name LIKE '%$search%'
        OR product_name LIKE '%$search%'
          OR price LIKE '%$search%'";

$query = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Navbar</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

.navbar{
    background:linear-gradient(135deg,#8f7bff,#b7a8ff);
}

.navbar-brand{
    color:white !important;
    font-size:28px;
    font-weight:bold;
}

.nav-link{
    color:white !important;
    font-weight:600;
    margin-left:15px;
    transition:.3s;
}

.nav-link:hover{
    color:black !important;
}

.btn-search{
    background:white;
    color:#8f7bff;
    font-weight:bold;
    border:none;
}

.btn-search:hover{
    background:black;
    color:white;
}

.btn-login{
    background:black;
    color:white;
    margin-left:10px;
}

.btn-login:hover{
    background:white;
    color:black;
}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg">

<div class="container-fluid px-4">
<a class="navbar-brand" href="">
        <img src="icon1.png" alt="Logo" width="40" height="44" class="d-inline-block align-text-top">
MOBISHOP
</a>

<button class="navbar-toggler bg-light"
type="button"
data-bs-toggle="collapse"
data-bs-target="#menu">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav mx-auto">

<li class="nav-item">
<a class="nav-link active" href="index.php">
Home
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="userproduct.php">Products
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="vieworder.php">
My Orders
</a>
</li>



<li class="nav-item">
<a class="nav-link" href="contactsupport.php">
Costumer service
</a>
</li>
<?php if(isset($_SESSION['user'])) { ?>

<li class="nav-item">
    <a class="nav-link" href="userlogout.php">
        Log Out
    </a>
</li>

<?php } else { ?>

<li class="nav-item">
    <a class="nav-link" href="login.php">
        Login
    </a>
</li>

<?php } ?>

</ul>

<form class="d-flex me-3" method="get"  action="searchproduct.php">

<input
        class="form-control me-2"
        type="search"
        name="search"
        placeholder="Search Mobiles"
        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">

    <button class="btn btn-search" type="submit">
        <i class="bi bi-search"></i>
    </button>

</form>

<?php if(isset($_SESSION['user'])) { ?>

<a href="addtocart.php" class="btn btn-light me-2">
    <i class="bi bi-cart-fill"></i>
    Cart
</a>

<a href="userprofile.php" class="text-decoration-none d-flex align-items-center gap-2">

    <div class="icon-box bg-white text-dark rounded-circle d-flex justify-content-center align-items-center"
         style="width:35px;height:35px;">
        <i class="bi bi-person-circle fs-4"></i>
    </div>

    <span class="text-light">Your Profile</span>

</a>

<?php } ?>

</div>

</div>

</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

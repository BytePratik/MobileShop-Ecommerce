<?php 
session_start();



include("connection.php"); 
if(!isset($_SESSION['admin']))
{
    header("Location:adminlogin.php");
    exit;
}
include("sidebar.php"); 
$limit = 10;

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page-1) * $limit;

$search = "";
if(isset($_GET['search']) && $_GET['search'] != ""){
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $sql = "SELECT * FROM products 
            WHERE id LIKE '%$search%'
            OR product_name LIKE '%$search%'
            OR model_name LIKE '%$search%'
            OR brand LIKE '%$search%'
            LIMIT $start,$limit";
    $count_sql = "SELECT COUNT(*) AS total FROM products 
                  WHERE id LIKE '%$search%'
                  OR product_name LIKE '%$search%'
                  OR model_name LIKE '%$search%'
                  OR brand LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM products LIMIT $start,$limit";
    $count_sql = "SELECT COUNT(*) AS total FROM products";
}

$result = mysqli_query($conn,$sql);
$total = mysqli_query($conn,$count_sql);
$row = mysqli_fetch_assoc($total);
$total_records = $row['total'];
$total_pages = ceil($total_records / $limit);




 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Product</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		.glass-container{
    width:100%;
    max-width:1500px;
    padding:40px;
    border-radius:30px;
    background: rgba(255,255,255,0.15);

    backdrop-filter: blur(25px);
    -webkit-backdrop-filter: blur(25px);
    border:1px solid rgba(255,255,255,0.3);
    box-shadow:0 20px 50px rgba(0,0,0,0.15);
}
.table th{
    background:linear-gradient(
        135deg,
        #8f7bff,
        #b7a8ff
    ) !important;

    color:white;
}

.table td{
    background:lavender;
    color: white;
}
.box{
	height: 30px;
	width: 40px;
	border-radius: 10px;
background:  linear-gradient(135deg,#8f7bff,#b7a8ff);
}
.box2{
	height: 30px;
	width: 130px;
	border-radius: 10px;
background:  linear-gradient(135deg,#8f7bff,#b7a8ff);
}
@media(max-width:768px)
{
    .box{
        width:30px;
        height:25px;
        font-size:12px;
    }

    .box2{
        width:90px;
        height:25px;
        font-size:12px;
    }

    table{
        font-size:12px;
    }

    img{
        width:50px !important;
        height:50px !important;
    }
}

.pagination .page-link {
    color: #8f7bff !important;   /* gradient accent color */
    border: 1px solid #8f7bff !important;
    background: white !important;
    transition: all 0.3s ease;
}

.pagination .page-link:hover {
    background: #8f7bff !important;
    color: white !important;
}

.pagination .page-item.active .page-link {
    color: white !important;
    background: #8f7bff !important;
    border-color: #8f7bff !important;
}

.product-image{
    width:63px;
    height:85px;
    object-fit:cover;
   
    
}


	</style>
</head>
<body>
	<div class="main-content" id="mainContent">
		<div class="glass-container">
			<div class="table-responsive mt-5" >

				<table class="table table-bordered  border border-dark " style="background: linear-gradient(135deg,#8f7bff,#b7a8ff);">
                    <form method="get">
                    <div class="d-flex justify-content-end">
                    <div class="input-group mb-3 w-25 ">
  <span class="input-group-text bg-white border-end-0">
    <i class="bi bi-search"></i>
  </span>
  <input type="search" 
         name="search" 
         class="form-control rounded-start-0" 
         placeholder="Search category"  value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
           <button type="submit" class="btn " style="background:#8f7bff;">
        Search
    </button>
</div>
</div>
</form>
  <thead  >
    <tr >
      <th scope="col">Id</th>
      <th scope="col">Product Code</th>
       <th scope="col" class="d-none d-md-table-cell">Product Name</th>
      <th scope="col" class="d-none d-md-table-cell">Price</th>
      <th scope="col">Quantity</th>
       <th scope="col" class="d-none d-lg-table-cell">Image</th>
      <th scope="col " class="d-none d-md-table-cell">Action</th>
    </tr>
  </thead>
  <tbody >
     <?php 
    while ($row=mysqli_fetch_array($result)){ ?>
		<tr class=" fw-bold text-center " style="color:lavender;text-shadow: 4px 4px 8px black;">
			<td ><div class="box"><?php echo $row['id'];?></div></td>
			<td ><div class="box2"><?php echo $row['product_code'];?></div></td>
		<td class="d-none d-md-table-cell"><div class="box2"><?php echo $row['product_name'];?></div></td>
		<td class="d-none d-md-table-cell"><div class="box2"><?php echo $row['price'];?></div></td>
		<td><div class="box"><?php echo $row['quantity'];?></div></td>
		<td class="d-none d-lg-table-cell"> <img src="img/<?php echo $row['image']; ?>"width="80"height="80" class="product-image" style="object-fit:cover;"></td>
		
	 <td class="d-none d-md-table-cell"><a href="productedit.php?product_code=<?php echo $row['product_code'];?>" class="btn btn-sm btn-primary">edit</a> 

	
	

 <a href="productdelete.php?product_code=<?php echo $row['product_code'];?>" class="btn btn-sm btn-danger">Delete</a></td> 
		</tr>
		<?php 
	}
		mysqli_close($conn) ?>
   
  </tbody>
</table>
<nav class="mt-4 " >
<ul class="pagination justify-content-end">

<?php if($page>1){ ?>

<li class="page-item">
<a class="page-link"
href="?page=<?php echo $page-1; ?>">
Previous
</a>
</li>

<?php } ?>

<?php
for($i=1;$i<=$total_pages;$i++)
{
?>

<li class="page-item <?php if($i==$page) echo 'active'; ?>">

<a class="page-link"
href="?page=<?php echo $i; ?>">

<?php echo $i; ?>

</a>

</li>

<?php } ?>

<?php if($page<$total_pages){ ?>

<li class="page-item">

<a class="page-link"
href="?page=<?php echo $page+1; ?>">

Next

</a>

</li>

<?php } ?>

</ul>
</nav>
</div>
			
		</div>

</div>

</body>
</html>
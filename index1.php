<?php 
session_start();

include("connection.php");
if(!isset($_SESSION['admin']))
{
    header("Location:adminlogin.php");
    exit;
} 
 include("sidebar.php"); 
 $months = [];
$sales = [];

$sql = "
SELECT
MONTHNAME(order_date) as month,
SUM(total_amount) as total
FROM orders
GROUP BY MONTH(order_date)
ORDER BY MONTH(order_date)
";

$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result))
{
    $months[] = $row['month'];
    $sales[] = $row['total'];
}




		$cmd1="select count(*) as total_user from users";
$query1=mysqli_query($conn,$cmd1);

$tl_us="";
    if ($row1=mysqli_fetch_array($query1)){ 
$tl_us= $row1['total_user'];

		}
		$cmd2="select count(*) as total_product from products";
$query2=mysqli_query($conn,$cmd2);

$tl_p="";
    if ($row1=mysqli_fetch_array($query2)){ 
$tl_p= $row1['total_product'];

		}
		$cmd3="select count(*) as total_order from orderss";
$query3=mysqli_query($conn,$cmd3);

$tl_o="";
    if ($row1=mysqli_fetch_array($query3)){ 
$tl_o= $row1['total_order'];

		}
		$cmd4="select count(*) as total_cancel from orderss where order_status='Cancelled'";
$query4=mysqli_query($conn,$cmd4);

$tl_c="";
    if ($row1=mysqli_fetch_array($query4)){ 
$tl_c= $row1['total_cancel'];

		}


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashbord</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body{
			 background: whitesmoke;
            /*backdrop-filter: blur(100px);*/
		}
		.dashboard-card{

			border: none;

			border-radius: 20px;

			padding: 25px;

			background: white;

			box-shadow: 0 5px 20px rgba(0,0,0,0.08);

			transition: 0.3s;
		}


		.dashboard-card:hover{

			transform: translateY(-5px);
		}

		.dashboard-card i{

			font-size: 40px;
		}


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
.small-card{

	padding: 15px 20px !important;

	min-height: 70px;
}
.sh{
	text-shadow: 5px 4px 2px #4B0082;
}



	</style>
	
</head>
<body>
	<div class="main-content" id="mainContent">
		<div class="mb-4 d-flex justify-content-between">
			<div style="color:#8f7bff">

			<h2 class="fw-bold">
				Dashboard
			</h2>

			<p >
				Welcome back Admin
			</p>
		</div>
		<div class="card  p-2 rounded-3 text-light text-center fw-bold" style="background:lavender; text-shadow: 3px 3px 5px blueviolet;">
			<h5>DATE</h5>
		<p id="todayDate"></p>
	</div>

		</div>

		 
		<div class="row g-4">

			<div class="col-lg-3 col-md-6">

				<div class="dashboard-card" style=" background: linear-gradient(135deg,#7b5cff,#00d4ff);">

					<div class="d-flex justify-content-between">

						<div>

							<h5 class="text-light">Total Orders</h5>

							<h2 class="fw-bold text-light">
							 <?= $tl_o ;?>
							</h2>

						</div>
							<i class="bi bi-cart-fill text-light"></i>

					

					</div>

				</div>

			</div>

			
			<div class="col-lg-3 col-md-6">

				<div class="dashboard-card" style="background:linear-gradient(135deg,#00f5a0,#00d9f5)">

					<div class="d-flex justify-content-between">

						<div>

							<h5 class="text-light">Total Product</h5>

							<h2 class="fw-bold text-light">
								<?= $tl_p ;?> 
							</h2>

						</div>

						<i class="bi bi-collection-fill text-light"></i>

					</div>

				</div>

			</div>

			<!-- Card 3 -->
			<div class="col-lg-3 col-md-6">

				<div class="dashboard-card" style="background:linear-gradient(135deg,#ff9a9e,#a18cd1);">

					<div class="d-flex justify-content-between">

						<div>

							<h5 class="text-light">Total Users</h5>

							<h2 class="fw-bold text-light">
								 <?= $tl_us ;?> 
							</h2>

						</div>

							<i class="bi bi-bag-check-fill text-light "></i>

					</div>

				</div>

			</div>

			<!-- Card 4 -->
			<div class="col-lg-3 col-md-6">

				<div class="dashboard-card"style="background: linear-gradient(135deg,#8f7bff,#b7a8ff);">

					<div class="d-flex justify-content-between">

						<div>

							<h5 class="text-light">Order Cancel</h5>

							<h2 class="fw-bold text-light">
									 <?= $tl_c ;?> 
							</h2>

						</div>

					<i class="bi bi-hourglass-split text-light"></i>

					</div>

				</div>

			</div>

		

	</div>
	<div class="glass-container mt-3">
		<h1 class="text-center p-2 text-light" style="background:linear-gradient(135deg,#8f1bff,#b7a1ff);">Month'ly Sales</h1>

<canvas id="salesChart" height="100" class="d-none d-sm-block"></canvas>
<h1 class="d-sm-none text-center" style="color:#8f1bff;">ONLY VISIBLE ON BIG SCREEN</h1>
</div>



<div class="card w-100 mt-4 p-3">
		<h5>Quick Actions</h5>
	<div class="container ">
		

	<div class="row g-3 sh">

		<div class="col-lg-3 col-md-6 col-12">

			<div class="dashboard-card small-card d-flex align-items-center justify-content-center gap-2  "style="background: linear-gradient(135deg,#ffb6d5,#9932CC);">

				<i class="bi bi-bag-plus-fill text-light fs-3 "></i>

				<h6 class="m-0 fw-bold">
					<a href="addproduct.php" style="color:white;">Add Product</a>
				</h6>

			</div>

		</div>

		
		<div class="col-lg-3 col-md-6 col-12">

			<div class="dashboard-card small-card d-flex align-items-center justify-content-center gap-2 " style=" background: linear-gradient(135deg,#ffb6d5,#E6E6FA);">

				<i class="bi bi-pencil-square text-light fs-3"></i>

				<h6 class="m-0 fw-bold">
					<a href="productdata.php"style="color: white;" >Edit Product</a>
				</h6>

			</div>

		</div>

		
		<div class="col-lg-3 col-md-6 col-12">

			<div class="dashboard-card d-flex small-card align-items-center   justify-content-center gap-2"style=" background: linear-gradient(135deg,#ffb6d5, #DA70D6);">

				<i class="bi bi-trash3 fs-3 text-light"></i>

				<h6 class="m-0 fw-bold">
				<a href="productdata.php" style="color:white;">	Delete Product</a>
				</h6>

			</div>

		</div>

		
		<div class="col-lg-3 col-md-6 col-12">

			<div class="dashboard-card d-flex small-card align-items-center  justify-content-center gap-2 "style=" background: linear-gradient(135deg,#E6E6FA, #663399 );">

				<i class="bi bi-person-plus-fill text-light fs-3"></i>
				<h6 class="m-0 fw-bold">
				<a href="admindata.php" style="color:white;">New Admin </a>
				</h6>

			</div>

		</div>

	</div>
</div>

</div>

		
	</div>

	
<script>
  const today = new Date();
  const formatted = today.toISOString().split("T")[0]; // YYYY-MM-DD
  document.getElementById("todayDate").textContent = formatted;
</script>
<script>

const ctx =
document.getElementById('salesChart');

new Chart(ctx,
{
    type:'line',

    data:
    {
        labels:
        <?php
        echo json_encode($months);
        ?>,

        datasets:
        [{
            label:'Sales',

            data:
            <?php
            echo json_encode($sales);
            ?>,

            borderColor:'#6C2BD9',

            backgroundColor:
            'rgba(108,43,217,0.2)',

            borderWidth:3,

            fill:true,

            tension:0.4
        }]
    },

    options:
    {
        responsive:true,

        plugins:
        {
            legend:
            {
                display:true
            }
        }
    }
});

</script>

	

</body>
</html>
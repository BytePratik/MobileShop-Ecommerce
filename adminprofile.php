<?php 
session_start();
include("connection.php");
if(!isset($_SESSION['admin']))
{
    header("Location:adminlogin.php");
    exit;
} 

$sql="SELECT * from admin";
$result=mysqli_query($conn,$sql);







?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN LOGIN</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body{
			 min-height:100vh;
			width: 100%;
			background: linear-gradient(135deg,#8f7bff,#b7a8ff);
			 display:flex;
  align-items:center;
  justify-content:center;
		}
		.glass{
  background: rgba(255,255,255,0.45);
  backdrop-filter: blur(20px);
  border-radius:22px;
  padding:18px 22px;
  box-shadow:
    0 20px 40px rgba(0,0,0,0.15),
    inset 0 0 0 1px rgba(255,255,255,0.6);

}
.board{
  width:900px;
  height:520px;
  padding:30px;
  border-radius:30px;
  background: rgba(255,255,255,0.35);
  backdrop-filter: blur(25px);
  -webkit-backdrop-filter: blur(25px);
  box-shadow:
    0 30px 80px rgba(0,0,0,0.15),
    inset 0 0 0 1px rgba(255,255,255,0.4);
  position:relative;
}
.card:hover{
   transform: translateY(-70px); 
   transition: 0.4s;
}
.box{
  height: 30px;
  width: 130px;
  border-radius: 10px;
background:  linear-gradient(135deg,#8f7bff,#b7a8ff);
}



	</style>

</head>
<body>


	<div class="container d-flex align-items-center justify-content-center" >

<form method="post" >
   <?php 
    if ($row=mysqli_fetch_array($result)){ ?>
	
			<div class="card glass board p-5 shadow" style="width: 400px;">
         <h2 class="text-center  " style="color:  #E6E6FA; text-shadow: 3px 3px 5px blueviolet;"><B>Admin Profile</B></h2>
    <img src="img/<?php echo $row['img']; ?>" alt="Admin Icon" class="img-fluid mx-auto d-block mb-3"width="80"height="80" style="object-fit:cover; border-radius: 100px;">
   

 



   
  <div class="mb-3 d-flex align-items-center justify-content-between">
  <h5 style="color:#E6E6FA; text-shadow:3px 3px 5px blueviolet; margin:0;">
    Admin
  </h5>
  <div class="box d-flex align-items-center justify-content-center fw-bold text-white">
    <?php echo $row['name']; ?>
  </div>
</div>
<hr style="border:3px solid blueviolet;">

<div class="mb-3 d-flex align-items-center justify-content-between">
  <h5 style="color:#E6E6FA; text-shadow:3px 3px 5px blueviolet; margin:0;">
    Date Of Birth
  </h5>
  <div class="box d-flex align-items-center justify-content-center fw-bold text-white">
    <?php echo $row['dob']; ?>
  </div>
</div>
<hr style="border:3px solid blueviolet;">

  </div>
  <?php 
  }mysqli_close($conn) ?>
</form>


</div>

			
		</div>
	 


</body>
</html>
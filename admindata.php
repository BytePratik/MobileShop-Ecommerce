<?php
session_start();

 include("connection.php"); 
 if(!isset($_SESSION['user']))
{
    header("Location:login.php");
    exit;
}
if (isset($_POST['submit'])) {
 $Name=$_POST['name'];
 $Birth=$_POST['birth'];
 $img = isset($_FILES["img"]["name"]) ? $_FILES["img"]["name"] : "";
$tempname = isset($_FILES["img"]["tmp_name"]) ? $_FILES["img"]["tmp_name"] : "";
$folder = "./img/" . $img; 
move_uploaded_file(
    $tempname,
    $folder
);
$sql="INSERT into admin(name,dob,img) values ('$Name','$Birth','$img')";
$query=mysqli_query($conn,$sql);


}





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



	</style>

</head>
<body>

	<div class="container d-flex align-items-center justify-content-center" >
	
			<div class="card glass board p-5 shadow" style="width: 400px;">
    <img src="icon1.png" alt="Admin Icon" class="img-fluid mx-auto d-block mb-3">
    <h2 class="text-center  " style="color:  #E6E6FA; text-shadow: 3px 3px 5px blueviolet;"><B>Admin Profile</B></h2>
    <!-- Add form here -->


 



<form method="post" enctype="multipart/form-data" >
  <div class="mb-3">
    <label class="form-label fw-bold"style="color:  #E6E6FA; text-shadow: 3px 3px 5px blueviolet;">Name</label>
    <input type="text" name="name"   placeholder="Your Name" class="form-control" required style="box-shadow: 2px 2px 4px blueviolet;">
  </div>
  <div class="mb-3">
    <label class="form-label fw-bold"style="color:  #E6E6FA; text-shadow: 3px 3px 5px blueviolet;">Data of Birth</label>
    <input type="date"   name="birth" placeholder="Your DOB" class="form-control" required style="box-shadow: 2px 2px 4px blueviolet;">
  </div>
   <div class="mb-3">
    <label class="form-label fw-bold"style="color:  #E6E6FA; text-shadow: 3px 3px 5px blueviolet;">Image</label>
    <input type="file"   name="img" placeholder="Your Image" class="form-control" required style="box-shadow: 2px 2px 4px blueviolet;">
  </div>

  <button type="submit" name="submit" class="btn  w-100 fw-bold" style="background: linear-gradient(135deg,#8f7bff,#b7a8ff);color:  #E6E6FA; text-shadow: 3px 3px 5px blueviolet; box-shadow: 2px 2px 4px blueviolet;">Add Profile</button>
</form>


</div>

			
		</div>
	 


</body>
</html>
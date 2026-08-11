<?php

include("connection.php");

if(isset($_POST['submit']))
{

$fullname=$_POST['fullname'];

$email=$_POST['email'];

$mobile=$_POST['mobile'];

$password=$_POST['password'];

$cpassword=$_POST['cpassword'];

$gender=$_POST['gender'];

$address=$_POST['address'];

$city=$_POST['city'];

$state=$_POST['state'];

$pincode=$_POST['pincode'];

if($password!=$cpassword)
{
    echo "<script>
    alert('Password does not match');
    </script>";
}
else
{
	$sql="SELECT * FROM users
WHERE email='$email'
OR mobile='$mobile'";

$check=mysqli_query($conn,$sql);

if(mysqli_num_rows($check)>0)
{
    echo "<script>
    alert('Email or Mobile Already Exists');
    </script>";
}
else
{
	$sql2="INSERT INTO users
(full_name,email,mobile,password,gender,address,city,state,pincode

)

VALUES

('$fullname','$email','$mobile','$password','$gender','$address','$city','$state','$pincode')";


$insert=mysqli_query($conn,$sql2);


if($insert)
{

echo "<script>

alert('Registration Successful');

window.location='login.php';

</script>";

}
else
{

echo "<script>

alert('Registration Failed');

</script>";

}

}

}

}

?>



<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>registration</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

	<link rel="stylesheet" href="style.css">
	<style>
		body{
			min-height:150vh;
			background: linear-gradient(135deg,#8f7bff,#b7a8ff);

			display:flex;
			justify-content:center;
			align-items:center;
			background-position: center;
			background-size: cover;
			
		}

		.glass-container{
			width:90%;
			max-width:1100px;
			padding:40px;
			border-radius:30px;
			background: rgba(255,255,255,0.15);

			backdrop-filter: blur(25px);
			-webkit-backdrop-filter: blur(25px);
			border:1px solid rgba(255,255,255,0.3);
			box-shadow:0 20px 50px rgba(0,0,0,0.15);
		}

		.glass-card{
			background: rgba(255,255,255,0.2);
			backdrop-filter: blur(20px);
			border-radius:20px;
			border:1px solid rgba(255,255,255,0.3);
			box-shadow:10 8px 5px rgba(0,0,0,0.1);
			padding:20px;
		}
	</style>
</head>
<body>
	<div class="glass-container">
		


<form method="post" id="registerForm">



<div class="text-center text-light" style=" text-shadow: 3px 3px 5px blueviolet;">

	<h1>USER REGISTRATION</h1>

	<h4> MOBISHOP WEBSITE</h4>
	<hr style="border: 4px solid black;">
</div>





<div class="row mb-4">

	<div class="col-md-3">

		<label class="form-label">
			Full Name
			<span class="text-danger">*</span>
		</label>

	</div>

	<div class="col-md-9">

		<div class="input-group">

			<span class="input-group-text">

				<i class="bi bi-person-fill"></i>

			</span>

			<input type="text"class="form-control"placeholder="Enter your full name" name="fullname" id="fullname">

		</div>

	</div>

</div>


<div class="row mb-4">

	<div class="col-md-3">

		<label class="form-label">
			Email Address
			<span class="text-danger">*</span>
		</label>

	</div>

	<div class="col-md-9">

		<div class="input-group">

			<span class="input-group-text">

				<i class="bi bi-envelope-fill"></i>

			</span>

			<input type="email"class="form-control"placeholder="Enter your email" name="email" id="email">

		</div>

	</div>

</div>


<div class="row mb-4">

	<div class="col-md-3">

		<label class="form-label">
			Mobile Number
			<span class="text-danger">*</span>
		</label>

	</div>

	<div class="col-md-9">

		<div class="input-group">

			<span class="input-group-text">

				<i class="bi bi-telephone-fill"></i>

			</span>

			<input type="text"class="form-control"placeholder="Enter mobile number" name="mobile" id="mobile">

		</div>

	</div>

</div>



<div class="row mb-4">

	<div class="col-md-3">

		<label class="form-label">
			Password
			<span class="text-danger">*</span>
		</label>

	</div>

	<div class="col-md-9">

		<div class="input-group">

			<span class="input-group-text">

				<i class="bi bi-lock-fill"></i>

			</span>

			<input type="password" class="form-control"placeholder="Enter password" name="password" id="password">

		</div>

	</div>

</div>



<div class="row mb-4">

	<div class="col-md-3">

		<label class="form-label">
			Confirm Password
			<span class="text-danger">*</span>
		</label>

	</div>

	<div class="col-md-9">

		<div class="input-group">

			<span class="input-group-text">

				<i class="bi bi-lock-fill"></i>

			</span>

			<input type="password"class="form-control"placeholder="Confirm password" name="cpassword" id="cpassword">

		</div>

	</div>

</div>



<div class="row mb-4">

	<div class="col-md-3">

		<label class="form-label">
			Gender
			<span class="text-danger">*</span>
		</label>

	</div>

	<div class="col-md-9">

		<div class="form-check form-check-inline">

			<input class="form-check-input"type="radio"name="gender" value="male">

			<label class="form-check-label">
				Male
			</label>

		</div>

		<div class="form-check form-check-inline">

			<input class="form-check-input"type="radio"name="gender" value="female">

			<label class="form-check-label">
				Female
			</label>

		</div>

		<div class="form-check form-check-inline">

			<input class="form-check-input"type="radio"name="gender" value="other">

			<label class="form-check-label">
				Other
			</label>

		</div>

	</div>

</div>



<div class="row mb-4">

	<div class="col-md-3">

		<label class="form-label">
			Address
			<span class="text-danger">*</span>
		</label>

	</div>

	<div class="col-md-9">

		<div class="input-group">

			<span class="input-group-text">

				<i class="bi bi-house-fill"></i>

			</span>

			<textarea class="form-control"rows="3"placeholder="Enter Address" name="address"></textarea>

		</div>

	</div>

</div>



<div class="row mb-4">

	<div class="col-md-6">

		<label>
			City
		</label>

		<div class="input-group">

			<span class="input-group-text">

				<i class="bi bi-building"></i>

			</span>

			<input type="text"class="form-control"placeholder="City" name="city">

		</div>

	</div>

	<div class="col-md-6">

		<label>
			State
		</label>

		<div class="input-group">

			<span class="input-group-text">

				<i class="bi bi-geo-alt-fill"></i>

			</span>

			<input type="text"class="form-control"placeholder="State" name="state">

		</div>

	</div>

</div>



<div class="row mb-4">

	<div class="col-md-3">

		<label>
			Pincode
		</label>

	</div>

	<div class="col-md-9">

		<div class="input-group">

			<span class="input-group-text">

				<i class="bi bi-mailbox"></i>

			</span>

			<input type="text"class="form-control"placeholder="Pincode" name="pincode" id="pincode">

		</div>

	</div>

</div>



<div class="text-center">

	<button
	class="btn register-btn btn-light" type="submit" name="submit">

	<i class="bi bi-person-plus-fill"></i>

	REGISTER NOW

</button>

</div>

<div class="text-center mt-4">

	Already have an account?

	<a href="login.php">
		Login Here
	</a>

</div>

</form>
</div>

<script>
document.getElementById("registerForm").addEventListener("submit", function(e) {

    const fullname = document.getElementById("fullname").value.trim();
    const email = document.getElementById("email").value.trim();
    const mobile = document.getElementById("mobile").value.trim();
    const password = document.getElementById("password").value;
    const cpassword = document.getElementById("cpassword").value;
    const pincode = document.getElementById("pincode").value.trim();
    const gender = document.querySelector('input[name="gender"]:checked');

    
    if (fullname === "" || email === "" || mobile === "" || password === "" || cpassword === "") {
        alert("Please fill all required fields");
        e.preventDefault();
        return;
    }

  
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address");
        e.preventDefault();
        return;
    }


    const mobilePattern = /^[0-9]{10}$/;
    if (!mobilePattern.test(mobile)) {
        alert("Mobile number must be exactly 10 digits");
        e.preventDefault();
        return;
    }

    
    if (password.length < 6) {
        alert("Password must be at least 6 characters long");
        e.preventDefault();
        return;
    }

   
    if (password !== cpassword) {
        alert("Password and Confirm Password do not match");
        e.preventDefault();
        return;
    }

    
    if (!gender) {
        alert("Please select your gender");
        e.preventDefault();
        return;
    }

    
    if (pincode !== "" && !/^[0-9]{6}$/.test(pincode)) {
        alert("Pincode must be exactly 6 digits");
        e.preventDefault();
        return;
    }

});
</script>

</body>
</html>
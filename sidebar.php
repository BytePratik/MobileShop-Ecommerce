<?php include("connection.php");  ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">	<style>
		
.sidebar {
    width: 250px;
    height: 100vh;
    background: lavender;
    position: fixed;
    top: 70px;
    left: -250px; 
    padding-top: 30px;
    border-right: 2px solid #ddd;
    transition: 0.4s;
    z-index: 2000;
    overflow: hidden;
}

.sidebar.active {
    left: 0; 
}

.sidebar a {
    display: block;
    padding: 15px 25px;
    text-decoration: none;
    color: black;
    font-size: 18px;
    transition: 0.3s;
}

.sidebar a:hover {
    background: linear-gradient(135deg,#8f7bff,#b7a8ff);
    color: white;
    text-shadow: 3px 3px 5px blueviolet;
    box-shadow: 6px 2px 4px blueviolet;
    font-size: 1.5rem;
}

/* Small screens */
@media(max-width:380px) {
    .sidebar {
        top: 0;
        height: calc(100vh - 70px); 
        margin-top: 110px;        
    }
}

.main-content {
    padding: 25px;
    transition: 0.4s;
    margin-left: 0;
}

.main-content.shift {
    margin-left: 250px;
}

/* Medium screens */
@media(max-width:768px) {
    .navbar h3 {
        font-size: 18px;
    }

    .icon-box {
        width: 35px;
        height: 35px;
    }

    .main-content.shift {
        margin-left: 0;
    }
}

            
        


	</style>
</head>
<body >
	<div class="sidebar " id="sidebar">

    <a href="index1.php">
        <i class="bi bi-house-door me-2"></i>
        Dashbord
    </a>

    <a href="addproduct.php">
       <i class="bi bi-phone-flip"></i>
      Add Product
    </a>

    <a href="seeuser.php">
        <i class="bi bi-person-rolodex"></i>
       Users
    </a>

    <a href="allorder.php">
       <i class="bi bi-clock-history"></i>
      Orders History
    </a>

     <a href="customerproblem.php">
       <i class="bi bi-x-circle"></i>
       Customer Problem
    </a>

 
     <a href="sales.php">
     <i class="bi bi-boxes"></i>
    Sales
    </a> 

    <a href="feedback.php">
      <i class="bi bi-chat-left-dots-fill"></i>
     Feedback
    </a>


    <a href="adminlogout.php" class="mt-5 text-danger border border-3 border-danger">
        <i class="bi bi-box-arrow-in-left fs-4"></i>
       Log Out
    </a>

</div>




<nav class="navbar sticky-top " style="background: linear-gradient(135deg,#8f7bff,#b7a8ff); ">
  <div class="container-fluid d-flex justify-content-between align-items-center">


    <div class="d-flex align-items-center gap-3">
    
      <button type="button" 
              class="btn border-0 bg-transparent text-light fs-3"
              onclick="toggleSidebar()">
        ☰
      </button>

      <h3 class="text-light m-0 fw-bold" style=" font-family: 'DotGothic16', sans-serif;font-size: 40px;
    letter-spacing: 2px;">
        MOBISTORE
      </h3>
    </div>

    <!-- Right side: admin info -->
    <div class="d-flex align-items-center gap-3 ">
        <a href="adminprofile.php">
      <div class="icon-box bg-white text-dark rounded-circle d-flex justify-content-center align-items-center" style="width:45px; height:45px;">
        <i class="bi bi-person-circle fs-4"></i>
      </div></a>
      <h5 class="text-light m-0">Admin</h5>
    </div>

  </div>
</nav>


<script>
function toggleSidebar() {
    document.getElementById("sidebar")
        .classList.toggle("active");

    document.getElementById("mainContent")
        .classList.toggle("shift");
}
</script>



</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<style>
		.footer{
    background:linear-gradient(135deg,#8f7bff,#b7a8ff);
    color:white;
    padding:50px 0 20px;
}

.footer h4,
.footer h5{
    font-weight:bold;
    margin-bottom:20px;
}

.footer p{
    color:#f2f2f2;
}

.footer ul{
    padding:0;
}

.footer ul li{
    list-style:none;
    margin-bottom:10px;
}

.footer ul li a{
    color:white;
    text-decoration:none;
    transition:.3s;
}

.footer ul li a:hover{
    color:black;
    padding-left:6px;
}

.social a{
    display:inline-flex;
    justify-content:center;
    align-items:center;
    width:40px;
    height:40px;
    margin-right:10px;
    border-radius:50%;
    background:white;
    color:#8f7bff;
    font-size:20px;
    text-decoration:none;
    transition:.3s;
}

.social a:hover{
    background:black;
    color:white;
}

.footer hr{
    border-color:white;
    opacity:.3;
}
	</style>
</head>
<body>
	<footer class="footer mt-5">

<div class="container">

<div class="row">

<div class="col-md-4 mb-4">

<h4 class="fw-bold">Mobile Store</h4>

<p>

Your trusted destination for the latest smartphones,
accessories, and unbeatable deals.

</p>

</div>

<div class="col-md-2 mb-4">

<h5>Quick Links</h5>

<ul class="list-unstyled">

<li><a href="homepage.php">Home</a></li>

<li><a href="viewproduct.php">Products</a></li>

<li><a href="myorders.php">My Orders</a></li>

<li><a href="contact.php">Contact</a></li>

</ul>

</div>

<div class="col-md-3 mb-4">

<h5>Customer Service</h5>

<ul class="list-unstyled">

<li><a href="#">Privacy Policy</a></li>

<li><a href="#">Terms & Conditions</a></li>

<li><a href="#">Return Policy</a></li>

<li><a href="#">Help Center</a></li>

</ul>

</div>

<div class="col-md-3 mb-4">

<h5>Contact Us</h5>

<p class="mb-1">
📍 Varanasi, Uttar Pradesh
</p>

<p class="mb-1">
📞 +91 9876543210
</p>

<p>
✉ support@mobilestore.com
</p>

<div class="social">

<a href="#"><i class="bi bi-facebook"></i></a>

<a href="#"><i class="bi bi-instagram"></i></a>

<a href="#"><i class="bi bi-twitter-x"></i></a>

<a href="#"><i class="bi bi-youtube"></i></a>

</div>

</div>

</div>

<hr>

<div class="text-center">

© <?php echo date("Y"); ?> Mobile Store.
All Rights Reserved.

</div>

</div>

</footer>

</body>
</html>
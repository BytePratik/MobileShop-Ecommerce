<?php

session_start();

include("connection.php");


include("navbar.php");
if (isset($_POST['submit'])) {
  


$name = $_POST['name'];

$email = $_POST['email'];

$mobile = $_POST['mobile'];

$subject = $_POST['subject'];

$message = $_POST['message'];

$sql = "INSERT INTO contact_support
(name,email,mobile,subject,message)

VALUES

('$name',
'$email',
'$mobile',
'$subject',
'$message')";

if(mysqli_query($conn,$sql))
{
    echo "<script>

    alert('Your message has been sent successfully.');


    </script>";
}
else
{
    echo "<script>

    alert('Something went wrong.');

    history.back();

    </script>";
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Contact Support</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{
    background:#f5f5f5;
}

.contact-box{
    background:white;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.15);
}

.left-side{
    background:linear-gradient(135deg,#8f7bff,#b7a8ff);
    color:white;
    border-radius:20px 0 0 20px;
}

.info i{
    font-size:22px;
    margin-right:10px;
}

.btn-send{
    background:#8f7bff;
    color:white;
    font-weight:bold;
}

.btn-send:hover{
    background:black;
    color:white;
}

@media(max-width:768px){

.left-side{
    border-radius:20px 20px 0 0;
}

}

</style>

</head>

<body>

<div class="container py-5">

<div class="contact-box">

<div class="row g-0">

<div class="col-md-4 left-side p-4">

<h2>Contact Support</h2>

<p class="mt-3">

Need help with your order or have a question?
Our support team is here to assist you.

</p>

<hr>

<div class="info mb-4">

<i class="bi bi-geo-alt-fill"></i>

Varanasi, Uttar Pradesh

</div>

<div class="info mb-4">

<i class="bi bi-telephone-fill"></i>

+91 9876543210

</div>

<div class="info mb-4">

<i class="bi bi-envelope-fill"></i>

support@mobilestore.com

</div>

<div class="info">

<i class="bi bi-clock-fill"></i>

Mon - Sat : 9:00 AM - 8:00 PM

</div>

</div>

<div class="col-md-8 p-5">

<h3 class="mb-4">

Send us a Message

</h3>

<form  method="post">

<div class="mb-3">

<label>Name</label>

<input
type="text"
name="name"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Mobile</label>

<input
type="text"
name="mobile"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Subject</label>

<input
type="text"
name="subject"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Message</label>

<textarea
name="message"
rows="5"
class="form-control"
required></textarea>

</div>

<button
class="btn btn-send w-100" type="submit" name="submit">

<i class="bi bi-send-fill"></i>

Send Message

</button>

</form>

</div>

</div>

</div>

</div>
<?php include("footer.php") ?>


</body>
</html>
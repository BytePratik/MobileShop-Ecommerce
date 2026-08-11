<?php 
session_start();
include("connection.php");


include("navbar.php");
$max_price = $_GET['max_price'] ?? 200000;

$sql = "SELECT * FROM products
        WHERE price <= '$max_price'
        ORDER BY price";

$result = mysqli_query($conn,$sql); 
 

 ?>
 <!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- AOS (Animate On Scroll) -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    .carousel-item img {
    height: 500px;        
   
}

 .s{
    height: 70px;
    width: 70px;
    border-radius: 100%;
    border: 1px solid black;
}
@media (max-width: 768px) {
  .carousel-item img {
    height: 250px;   
  }
}
 .card-img-top {
            height: 180px;
          padding: 10px;
        }


.form-range {
    height: 20px;
}
.form-range::-webkit-slider-runnable-track {
    height: 4px;
    border-radius: 4px;
    background: rgba(255,255,255,0.6);
}
.form-range::-moz-range-track {
    height: 4px;
    border-radius: 4px;
    background: rgba(255,255,255,0.6);
}
.form-range::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    margin-top: -6px;
    height: 16px;
    width: 16px;
    border-radius: 50%;
    background: #ffffff;
    border: 2px solid #8f7bff;
    box-shadow: 0 1px 4px rgba(0,0,0,0.35);
    transition: transform 0.15s ease;
}
.form-range::-webkit-slider-thumb:hover {
    transform: scale(1.15);
}
.form-range::-moz-range-thumb {
    height: 16px;
    width: 16px;
    border-radius: 50%;
    background: #ffffff;
    border: 2px solid #8f7bff;
    box-shadow: 0 1px 4px rgba(0,0,0,0.35);
    transition: transform 0.15s ease;
}
.form-range::-moz-range-thumb:hover {
    transform: scale(1.15);
}
.form-range:focus {
    outline: none;
    box-shadow: none;
}


.card {
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.15);
}
</style>
 </head>
 <body>
   <div class="d-flex justify-content-center gap-4 flex-wrap mt-3">

    <div class="text-center" data-aos="zoom-in" data-aos-delay="0">
        <a href="searchproduct.php?search=Nothing" class="text-decoration-none">
           <img src="nlogo.png" class="s">
            <p class="mt-2 text-dark fw-bold">Nothing</p>
        </a>
    </div>

    <div class="text-center" data-aos="zoom-in" data-aos-delay="50">
        <a href="searchproduct.php?search=Samsung" class="text-decoration-none">
              <img src="sicon.jpeg" class="s">
            <p class="mt-2 text-dark fw-bold">Samsung</p>
        </a>
    </div>

    <div class="text-center" data-aos="zoom-in" data-aos-delay="100">
        <a href="searchproduct.php?search=Apple" class="text-decoration-none">
           <img src="alogo.png" class="s"> 
            <p class="mt-2 text-dark fw-bold">Apple</p>
        </a>
    </div>

    <div class="text-center" data-aos="zoom-in" data-aos-delay="150">
        <a href="searchproduct.php?search=Google" class="text-decoration-none">
            <img src="glogo.jpeg" class="s"> 
            <p class="mt-2 text-dark fw-bold">Google</p>
        </a>
    </div>

    <div class="text-center" data-aos="zoom-in" data-aos-delay="200">
        <a href="searchproduct.php?search=One Plus" class="text-decoration-none">
            <img src="ologo.jpeg" class="s"> 
            <p class="mt-2 text-dark fw-bold">One Plus</p>
        </a>
    </div>

    <div class="text-center" data-aos="zoom-in" data-aos-delay="250">
        <a href="searchproduct.php?search=Mi" class="text-decoration-none">
            <img src="milogo.jpeg" class="s"> 
            <p class="mt-2 text-dark fw-bold">Mi</p>
        </a>
    </div>

</div> 
<div class="container mt-4" >


<form method="GET">

<div class="row align-items-center">

<div class="col-md-4 p-3" data-aos="fade-right" style="background:linear-gradient(135deg,#8f7bff,#b7a8ff); border-radius: 10px;" >

<label class="fw-bold">
Maximum Price:
</label>

<input
type="range"
class="form-range"
name="max_price"
min="10000"
max="200000"
step="1000"
value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : 200000; ?>"
oninput="priceValue.innerText=this.value">

</div>

<div class="col-md-2">

<h5>
₹<span id="priceValue">
<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : 200000; ?>
</span>
</h5>

</div>

<div class="col-md-2" >

<button class="btn btn-primary btn-lg"style="background:linear-gradient(135deg,#8f7bff,#b7a8ff);">
Apply
</button>

</div>

</div>

</form>

</div>
<div class="container mt-4" >
<h4 class="mb-3">
  <span style="background:white; padding:6px 12px; border-radius:8px;">Suggestions</span>
</h4>
         <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4">
            <?php 
            $delay = 0;
            while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                    <div class="card h-100">
                        <img src="img/<?php echo $row['image']; ?>" class="card-img-top" data-aos="zoom-in" data-aos-delay="<?php echo $delay + 100; ?>" alt="<?php echo $row['product_name']; ?>">
                        <div class="card-body text-center" style="background: lavender;">
                            <h3 class="card-title"><?php echo $row['brand']; ?></h3>
                            <p class="card-text"><b>MODEL:</b><?php echo $row['product_name']; ?></p>
                            <p class="card-text fw-bold">PRICE:₹<?php echo $row['price']; ?></p>
                            <form method="get">
                <a href="viewproduct.php?product_code=<?php echo $row['product_code'];?>"class="btn  w-100" style="background: #8f7bff;">View Details</a></form>
                        </div>
                    </div>
                </div>
            <?php 
            $delay += 80;
            if ($delay > 400) { $delay = 0; }
            } ?>
        </div>
    </div>
<?php include("footer.php") ?>

<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 700,
    once: true,
    easing: 'ease-out-cubic'
  });
</script>

    
 
 </body>
 </html>
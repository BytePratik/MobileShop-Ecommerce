<?php
session_start();
include("connection.php");



include("navbar.php");
 $sql="SELECT * from products ORDER BY RAND() LIMIT 5";
 $result=mysqli_query($conn,$sql);

 if (isset($_POST['submit'])) {
   $email = $_SESSION['user'];
 
 $feedback=$_POST['feedback'];

 $sql2="INSERT into feedback (feedback,user) values('$feedback','$email')";
 $query=mysqli_query($conn,$sql2);
 if ($query) {
  echo"<script>alert('feedback submitted');</script>";
 }
}
 ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>

.card-img-top {
            height: 180px;
          padding: 10px;
        }

.accordion-item{
    border-radius:10px;
    overflow:hidden;
    margin-bottom:15px;
    border:1px solid #ddd;
}

.accordion-button{
    background:linear-gradient(135deg,#8f7bff,#b7a8ff);
    color:white;
    font-weight:bold;
}

.accordion-button:not(.collapsed){
    background:black;
    color:white;
}

.accordion-button:focus{
    box-shadow:none;
}

.accordion-body{
    background:#f8f9fa;
    font-size:16px;
}





.hero-section{
    background:#eef0f5;
    padding:70px 20px;
    overflow:hidden;
    position:relative;
}

.hero-card{
    max-width:1100px;
    margin:0 auto;
    background:#c9beff;
    border:4px solid #111;
    border-radius:0;
    padding:40px;
    display:flex;
    align-items:center;
    gap:40px;
    flex-wrap:wrap;
    box-shadow: 10px 10px 0px #111;
    outline: 2px solid #111;
    outline-offset: 6px;
}

.hero-bottom-bar{
    flex-basis:100%;
    height:14px;
    margin-top:10px;
    background:linear-gradient(135deg,#8f7bff,#b7a8ff);
    border-top:3px solid #111;
}

.hero-text{
    flex:1;
    min-width:280px;
}

.hero-badge{
    display:inline-block;
    background:#111;
    color:#c9beff;
    padding:6px 16px;
    font-size:13px;
    font-weight:800;
    text-transform:uppercase;
    letter-spacing:1px;
    border:2px solid #111;
    margin-bottom:16px;
}

.hero-text h1{
    font-size:2.5rem;
    font-weight:900;
    color:#111;
    line-height:1.1;
    text-transform:uppercase;
    margin-bottom:14px;
}

.hero-text p{
    color:#111;
    font-weight:600;
    margin-bottom:24px;
}

.hero-btn{
    background:#ff5470;
    color:#111;
    border:3px solid #111;
    padding:13px 34px;
    font-weight:900;
    text-transform:uppercase;
    box-shadow: 6px 6px 0px #111;
    transition:all 0.15s ease;
}

.hero-btn:hover{
    color:#111;
    box-shadow: 3px 3px 0px #111;
    transform:translate(3px,3px);
}

.hero-illustration{
    flex:1;
    min-width:200px;
    position:relative;
    height:200px;
    /*overflow:hidden;*/
    display:flex;
    align-items:center;
    justify-content:center;
}

.orbit-ring{
    position:absolute;
    inset:0;
    animation: orbitSpin 12s linear infinite;
}

.hero-circle{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    width:190px;
    height:190px;
    background:#fff;
    border:4px solid #111;
    box-shadow: 8px 8px 0px #111;
    display:flex;
    align-items:center;
    justify-content:center;
    z-index:2;
}

.floaty{
    position:absolute;
    border:3px solid #111;
    box-shadow: 4px 4px 0px #111;
    display:flex;
    align-items:center;
    justify-content:center;
    animation: counterSpin 12s linear infinite;
}

.floaty-1{ width:55px; height:55px; top:5px; left:10px; font-size:20px; background:#4dd9ff; }
.floaty-2{ width:75px; height:75px; bottom:15px; left:-10px; font-size:26px; background:#8f7bff; }
.floaty-3{ width:65px; height:65px; top:-5px; right:0px; font-size:22px; background:#7ce38b; }
.floaty-4{ width:58px; height:58px; bottom:-5px; right:15px; font-size:20px; background:#ff5470; }

@keyframes orbitSpin{
    from{ transform:rotate(0deg); }
    to{ transform:rotate(360deg); }
}

@keyframes counterSpin{
    from{ transform:rotate(0deg); }
    to{ transform:rotate(-360deg); }
}



.product-card{
    border-radius:16px;
    overflow:hidden;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.product-card:hover{
    transform:translateY(-6px);
    box-shadow:0 12px 24px rgba(0,0,0,0.15);
}



.glass-card{
    background:#fff;
    border:3px solid #111;
    border-radius:14px;
    padding:20px;
    box-shadow:6px 6px 0px #111;
}


@media (max-width: 768px){

    .hero-section{
        padding:35px 15px;
    }

    .hero-card{
        padding:28px;
        gap:24px;
        justify-content:center;
        text-align:center;
    }

    .hero-text{
        min-width:100%;
    }

    .hero-text h1{
        font-size:1.9rem;
    }

    .hero-text p{
        font-size:14px;
    }

    .hero-btn{
        padding:11px 26px;
        font-size:13px;
    }

    .hero-illustration{
        min-width:100%;
        height:170px;
    }

    .hero-circle{
        width:130px;
        height:130px;
    }

    .hero-circle svg{
        width:80px;
        height:80px;
    }

    .floaty-1{ width:40px; height:40px; font-size:15px; top:8px; left:15px; }
    .floaty-2{ width:52px; height:52px; font-size:19px; bottom:15px; left:0px; }
    .floaty-3{ width:46px; height:46px; font-size:17px; top:2px; right:10px; }
    .floaty-4{ width:40px; height:40px; font-size:15px; bottom:5px; right:20px; }

}

@media (max-width: 480px){

    .hero-section{
        padding:25px 12px;
    }

    .hero-card{
        padding:20px;
        gap:18px;
    }

    .hero-badge{
        font-size:11px;
        padding:5px 12px;
    }

    .hero-text h1{
        font-size:1.5rem;
    }

    .hero-text p{
        font-size:13px;
        margin-bottom:16px;
    }

    .hero-btn{
        width:100%;
        padding:11px 0;
        font-size:12px;
    }

    .hero-illustration{
        height:140px;
    }

    .hero-circle{
        width:95px;
        height:95px;
        border-width:3px;
        box-shadow: 5px 5px 0px #111;
    }

    .hero-circle svg{
        width:55px;
        height:55px;
    }

    .floaty{
        border-width:2px;
        box-shadow: 2px 2px 0px #111;
    }

    .floaty-1{ width:30px; height:30px; font-size:12px; top:6px; left:10px; }
    .floaty-2{ width:38px; height:38px; font-size:14px; bottom:10px; left:2px; }
    .floaty-3{ width:34px; height:34px; font-size:13px; top:0px; right:8px; }
    .floaty-4{ width:30px; height:30px; font-size:12px; bottom:2px; right:15px; }

}

@media (max-width: 480px){

    .glass-card{
        padding:14px;
    }

}

    </style>
</head>
<body style="background:#b7a8ff;">


<!-- ===== Brutalist Hero Section ===== -->
<section class="hero-section">
  <div class="hero-card">

    <div class="hero-text">
      <span class="hero-badge">New arrivals weekly</span>
      <h1>Shop smart.<br>Shop MobiShop.</h1>
      <p>Latest smartphones, best prices, delivered to your door in days.</p>
      <a href="#suggestions" class="btn hero-btn">Explore products</a>
    </div>

    <div class="hero-illustration">

      <div class="orbit-ring">
        <div class="floaty floaty-1">⭐</div>
        <div class="floaty floaty-2">🛍️</div>
        <div class="floaty floaty-3">🎧</div>
        <div class="floaty floaty-4">⚡</div>
      </div>

      <div class="hero-circle">
        <svg width="110" height="110" viewBox="0 0 120 120">
          <rect x="35" y="10" width="50" height="100" rx="4" fill="#111"/>
          <rect x="40" y="18" width="40" height="75" fill="#ffde59"/>
          <circle cx="60" cy="102" r="4" fill="#fff"/>
        </svg>
      </div>

    </div>

    <div class="hero-bottom-bar"></div>

  </div>
</section>



    <div class="container mt-4" id="suggestions" >
<h4 class="mb-3">
  <span style="background:white; padding:6px 12px; border-radius:8px;">Suggestions</span>
</h4>
         <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4">
            <?php
            $delay = 0;
            while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                    <div class="card product-card h-100">
                        <img src="img/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['product_name']; ?>">
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
            $delay += 100;
            } ?>
        </div>
    </div>
    <section class="container my-5">

<h2 class="text-center mb-4 fw-bold">
Frequently Asked Questions
</h2>

<div class="accordion" id="faqAccordion">

<div class="accordion-item">

<h2 class="accordion-header">

<button class="accordion-button"
type="button"
data-bs-toggle="collapse"
data-bs-target="#faq1">

How can I place an order?

</button>

</h2>

<div id="faq1"
class="accordion-collapse collapse show"
data-bs-parent="#faqAccordion">

<div class="accordion-body">

Browse products, add them to your cart or click <b>Buy Now</b>, then complete the checkout process.

</div>

</div>

</div>

<div class="accordion-item">

<h2 class="accordion-header">

<button class="accordion-button collapsed"
type="button"
data-bs-toggle="collapse"
data-bs-target="#faq2">

What payment methods are available?

</button>

</h2>

<div id="faq2"
class="accordion-collapse collapse"
data-bs-parent="#faqAccordion">

<div class="accordion-body">

We accept Cash on Delivery, UPI, Debit Card, and Credit Card.

</div>

</div>

</div>

<div class="accordion-item">

<h2 class="accordion-header">

<button class="accordion-button collapsed"
type="button"
data-bs-toggle="collapse"
data-bs-target="#faq3">

How long does delivery take?

</button>

</h2>

<div id="faq3"
class="accordion-collapse collapse"
data-bs-parent="#faqAccordion">

<div class="accordion-body">

Orders are usually delivered within 3–7 business days.

</div>

</div>

</div>

<div class="accordion-item">

<h2 class="accordion-header">

<button class="accordion-button collapsed"
type="button"
data-bs-toggle="collapse"
data-bs-target="#faq4">

Can I cancel my order?

</button>

</h2>

<div id="faq4"
class="accordion-collapse collapse"
data-bs-parent="#faqAccordion">

<div class="accordion-body">

Yes, you can cancel your order before it has been shipped from the <b>My Orders</b> page.

</div>

</div>

</div>

<div class="accordion-item">

<h2 class="accordion-header">

<button class="accordion-button collapsed"
type="button"
data-bs-toggle="collapse"
data-bs-target="#faq5">

How can I contact customer support?

</button>

</h2>

<div id="faq5"
class="accordion-collapse collapse"
data-bs-parent="#faqAccordion">

<div class="accordion-body">

Visit the <b>Contact Support</b> page and submit your query. Our team will get back to you as soon as possible.

</div>

</div>

</div>

</div>

</section>
<form method="post">
<div class="container">
<div class="row">
<div class="col">
        <div class="glass-card">
         <!--   <label class="form-label">
         <b> Feedback<span class="text-danger">*</span></b>
                            </label>
                             <textarea class="form-control" placeholder="Enter Feedback" name="feedback"></textarea> -->
                             <fieldset>
                                 <legend>Feedback</legend>
                                   <textarea class="form-control" placeholder="Enter Feedback" name="feedback"></textarea>
                             </fieldset>
          
        </div>
      </div>
    </div>
    <button type="submit"class="btn mt-3" name="submit" style="background:white;">Submit</button>
  </div>
</form>
<?php include("footer.php") ?>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init({
    duration: 700,
    once: true
});
</script>

</body>
</html>
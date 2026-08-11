<?php
session_start();
include("connection.php");
$email = $_SESSION['user'];
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body{
            min-height:150vh;
            background: linear-gradient(135deg,#8f7bff,#b7a8ff);
            display:flex;
            justify-content:center;
            align-items:center;
            background-position: center;
            background-size: cover;
            padding: 40px 0;
        }

        .glass-container{
            width:90%;
            max-width:700px;
            padding:50px;
            border-radius:30px;
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border:1px solid rgba(255,255,255,0.3);
            box-shadow:0 20px 50px rgba(0,0,0,0.15);
        }

        .avatar-circle{
            width:100px;
            height:100px;
            border-radius:50%;
            background: rgba(255,255,255,0.25);
            border:2px solid rgba(255,255,255,0.5);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:2.2rem;
            font-weight:700;
            color:#fff;
            margin:0 auto 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .profile-header{
            text-align:center;
            margin-bottom:35px;
        }

        .profile-header h1{
            font-weight:700;
            letter-spacing:1px;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.25);
        }

        .info-row{
            display:flex;
            align-items:center;
            background: rgba(255,255,255,0.15);
            border:1px solid rgba(255,255,255,0.25);
            border-radius:14px;
            padding:14px 20px;
            margin-bottom:14px;
            transition: all 0.25s ease;
        }

        .info-row:hover{
            background: rgba(255,255,255,0.28);
            transform: translateX(4px);
        }

        .info-icon{
            width:42px;
            height:42px;
            border-radius:50%;
            background: rgba(255,255,255,0.25);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:1.1rem;
            color:#fff;
            margin-right:18px;
            flex-shrink:0;
        }

        .info-label{
            font-size:0.8rem;
            text-transform:uppercase;
            letter-spacing:1px;
            color: rgba(255,255,255,0.75);
            margin-bottom:2px;
        }

        .info-value{
            font-size:1.05rem;
            font-weight:500;
            color:#fff;
        }

        .btn-edit{
            background: rgba(255,255,255,0.9);
            color:#7f6fe0;
            font-weight:600;
            border-radius:12px;
            padding:10px 28px;
            border:none;
            transition: all 0.2s ease;
        }

        .btn-edit:hover{
            background:#fff;
            transform: translateY(-2px);
            box-shadow:0 8px 16px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

    <div class="glass-container">

        <div class="profile-header text-light">
            <div class="avatar-circle">
                <?php echo strtoupper(substr($row['full_name'],0,1)); ?>
            </div>
            <h1>My Profile</h1>
            <p class="mb-0" style="opacity:0.85;"><?php echo $row['full_name']; ?></p>
        </div>

        <div class="info-row">
            <div class="info-icon"><i class="bi bi-person-fill"></i></div>
            <div>
                <div class="info-label">Full name</div>
                <div class="info-value"><?php echo $row['full_name']; ?></div>
            </div>
        </div>

        <div class="info-row">
            <div class="info-icon"><i class="bi bi-envelope-fill"></i></div>
            <div>
                <div class="info-label">Email</div>
                <div class="info-value"><?php echo $row['email']; ?></div>
            </div>
        </div>

        <div class="info-row">
            <div class="info-icon"><i class="bi bi-telephone-fill"></i></div>
            <div>
                <div class="info-label">Mobile</div>
                <div class="info-value"><?php echo $row['mobile']; ?></div>
            </div>
        </div>

        <div class="info-row">
            <div class="info-icon"><i class="bi bi-house-fill"></i></div>
            <div>
                <div class="info-label">Address</div>
                <div class="info-value"><?php echo $row['address']; ?></div>
            </div>
        </div>

        <div class="info-row">
            <div class="info-icon"><i class="bi bi-building"></i></div>
            <div>
                <div class="info-label">City</div>
                <div class="info-value"><?php echo $row['city']; ?></div>
            </div>
        </div>

        <div class="info-row">
            <div class="info-icon"><i class="bi bi-geo-alt-fill"></i></div>
            <div>
                <div class="info-label">State</div>
                <div class="info-value"><?php echo $row['state']; ?></div>
            </div>
        </div>

        <div class="info-row">
            <div class="info-icon"><i class="bi bi-gender-ambiguous"></i></div>
            <div>
                <div class="info-label">Gender</div>
                <div class="info-value"><?php echo $row['gender']; ?></div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-edit">Go to Home</a>
        </div>

    </div>

</body>
</html>
<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: index.php");
    exit();
}

$name = $_SESSION['registered_name'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="background">
    <div class="circle c1"></div>
    <div class="circle c2"></div>
    <div class="circle c3"></div>
</div>

<div class="container">

    <div class="card dashboard">

        <div class="profile">
            <div class="avatar">
                <?php echo strtoupper(substr($name,0,1)); ?>
            </div>

            <h2>
                Welcome,
                <?php echo $name; ?>
            </h2>

            <p>
                Username:
                @<?php echo $username; ?>
            </p>
        </div>

        <div class="info-box">
            <div class="box">
                <h3>Account Status</h3>
                <p>Verified</p>
            </div>

            <div class="box">
                <h3>Session</h3>
                <p>Active</p>
            </div>
        </div>

        <a href="logout.php">
            <button class="logout-btn">
                Logout
            </button>
        </a>

    </div>

</div>

</body>
</html>
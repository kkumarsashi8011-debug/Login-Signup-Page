<?php
session_start();

if(isset($_SESSION['username'])){
    header("Location: dashboard.php");
    exit();
}

if(isset($_POST['login'])){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if(
        isset($_SESSION['registered_user']) &&
        isset($_SESSION['registered_pass'])
    ){

        if(
            $username == $_SESSION['registered_user'] &&
            $password == $_SESSION['registered_pass']
        ){

            $_SESSION['username'] = $username;

            header("Location: dashboard.php");
            exit();

        } else {
            $error = "Invalid Username or Password";
        }

    } else {
        $error = "Please create an account first";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AuthVault - Login</title>

<link rel="stylesheet" href="style.css">
<script src="script.js" defer></script>

</head>
<body>

<!-- Animated Background -->
<div class="background">
    <div class="circle c1"></div>
    <div class="circle c2"></div>
    <div class="circle c3"></div>
</div>

<div class="container">

    <div class="logo-section">
        <div class="logo">🔐</div>
        <h1>AuthVault</h1>
        <p>Secure Authentication System</p>
    </div>

    <div class="card">

        <div class="tabs">
            <button class="active">Sign In</button>
            <button onclick="window.location='signup.php'">
                Create Account
            </button>
        </div>

        <h2>Welcome Back</h2>
        <p class="subtitle">
            Sign in to continue
        </p>

        <?php
        if(isset($error)){
            echo "<div class='error'>$error</div>";
        }
        ?>

        <form method="POST" onsubmit="return validateLogin()">

            <div class="input-box">
                <label>Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Enter Username"
                >
            </div>

            <div class="input-box">
                <label>Password</label>

                <div class="password-box">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter Password"
                    >

                    <span
                        class="toggle"
                        onclick="togglePassword()">
                        👁
                    </span>
                </div>
            </div>

            <button
                type="submit"
                name="login"
                class="btn">

                Sign In
            </button>

        </form>

        <div class="bottom-text">
            Don't have an account?
            <a href="signup.php">
                Create one
            </a>
        </div>

    </div>

</div>

</body>
</html>
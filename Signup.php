<?php
session_start();

if(isset($_POST['signup'])){

    $fullname = trim($_POST['fullname']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm  = trim($_POST['confirm_password']);

    if($password == $confirm){

        $_SESSION['registered_name'] = $fullname;
        $_SESSION['registered_user'] = $username;
        $_SESSION['registered_pass'] = $password;

        echo "<script>
                alert('Account Created Successfully');
                window.location='index.php';
              </script>";

    } else {
        $error = "Passwords do not match";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>

    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>

</head>
<body>

<div class="background">
    <div class="circle c1"></div>
    <div class="circle c2"></div>
    <div class="circle c3"></div>
</div>

<div class="container">

    <div class="logo-section">
        <div class="logo">🔐</div>
        <h1>AuthVault</h1>
        <p>Create Secure Account</p>
    </div>

    <div class="card">

        <div class="tabs">
            <button onclick="window.location='index.php'">
                Sign In
            </button>

            <button class="active">
                Create Account
            </button>
        </div>

        <h2>Create Account</h2>

        <p class="subtitle">
            Fill details to continue
        </p>

        <?php
        if(isset($error)){
            echo "<div class='error'>$error</div>";
        }
        ?>

        <form method="POST"
              onsubmit="return validateSignup()">

            <div class="input-box">
                <label>Full Name</label>
                <input
                    type="text"
                    id="fullname"
                    name="fullname"
                    placeholder="Enter Full Name">
            </div>

            <div class="input-box">
                <label>Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Create Username">
            </div>

            <div class="input-box">
                <label>Password</label>

                <div class="password-box">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Create Password">

                    <span class="toggle"
                          onclick="togglePassword()">
                          👁
                    </span>
                </div>
            </div>

            <div class="input-box">
                <label>Confirm Password</label>

                <input
                    type="password"
                    id="confirm"
                    name="confirm_password"
                    placeholder="Confirm Password">
            </div>

            <button
                type="submit"
                name="signup"
                class="btn">

                Create Account
            </button>

        </form>

    </div>

</div>

</body>
</html>
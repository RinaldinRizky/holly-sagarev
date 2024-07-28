<?php
session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: welcome.php");
    die();
}
$conn = mysqli_connect($servername, $username, $password, $dbname);
include 'config.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
    $cek = $qry->num_rows;

    if ($cek > 0) {
        $verif = $qry->fetch_assoc();
        if ($verif['is_verif'] == 1) {
            $_SESSION['user'] = $verif;
            echo "<script>alert('Login Berhasil');window.location='welcome.php';</script>";
        } else {
            echo "<script>alert('Harap Verifikasi Akun Anda!');window.location='login.php';</script>";
        }
    } else {
        echo "<script>aler('Email Atau Password Salah');window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login Form - Holly Saga</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css" type="text/css" media="all" />
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon_holly.png">
</head>

<body>
    <section class="w3l-mockup-form">
        <div class="container">
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="alert-close">
                        <span class="fa fa-close" onclick="redirectToIndex()"></span>
                    </div>
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="/img/logo-h.png" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Login Now</h2>
                        <p>Login For Shopping Better In Holly Saga </p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" required>
                            <!-- <p><a href="forgot-password.php" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password?</a></p> -->
                            <button name="submit" class="btn" type="submit">Login</button>
                        </form>
                        <div class="social-icons">
                            <p>Create Account! <a href="register.php">Register</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script>
                function redirectToIndex() {
                    window.location.href = "index.php"; }
    </script>
</body>

</html>


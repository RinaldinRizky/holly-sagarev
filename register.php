<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: welcome.php");
    die();
}

// Aktifkan laporan error
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php';
include 'config.php';
$msg = "";

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));
    $code = mysqli_real_escape_string($conn, md5(rand()));

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
        $msg = "<div class='alert alert-danger'>{$email} - This email address already exists.</div>";
    } else {
        if ($password === $confirm_password) {
            // Simpan pengguna dengan status 'unverified'
            $sql = "INSERT INTO users (name, email, password, code, status) VALUES ('{$name}', '{$email}', '{$password}', '{$code}', 'unverified')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'hollysagaofficial@gmail.com';
                    $mail->Password = 'gomvfmdmfmgopdww';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port = 465;

                    //Recipients
                    $mail->setFrom('hollysagaofficial@gmail.com');
                    $mail->addAddress($email);

                    //Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Account Verification';
                    $mail->Body = 'Click here to verify your account: <a href="https://hollysaga.shop/verify.php?code='.$code.'">https://hollysaga.shop/verify.php?code='.$code.'</a>';

                    $mail->send();
                    $msg = "<div class='alert alert-info'>We've sent a verification link to your email address.</div>";
                } catch (Exception $e) {
                    $msg = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                $msg = "<div class='alert alert-danger'>Something went wrong.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Register Form - Holly Saga</title>
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
                        <h2>Register Now</h2>
                        <p>Create Account If You Want Shopping In Holly Saga</p>
                        <?php echo $msg; ?>
                        <form action="/verify.php" method="post">
                            <input type="text" class="name" name="name" placeholder="Enter Your Name" value="<?php if (isset($_POST['submit'])) { echo $name; } ?>" required>
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" value="<?php if (isset($_POST['submit'])) { echo $email; } ?>" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" required>
                            <input type="password" class="confirm-password" name="confirm-password" placeholder="Enter Your Confirm Password" required>
                            <button name="submit" class="btn" type="submit">Register</button>
                        </form>
                        <div class="social-icons">
                            <p>Have an account? <a href="login.php">Login here</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script>
        function redirectToIndex() {
            window.location.href = "index.php";
        }
    </script>
</body>
</html>

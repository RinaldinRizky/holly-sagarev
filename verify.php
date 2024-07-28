<?php
include 'config.php';
$msg = "";

if (isset($_GET['code'])) {
    $code = mysqli_real_escape_string($conn, $_GET['code']);
    $query = mysqli_query($conn, "SELECT * FROM users WHERE code='{$code}'");

    if (mysqli_num_rows($query) == 1) {
        $query = mysqli_query($conn, "UPDATE users SET code='' WHERE code='{$code}'");

        if ($query) {
            $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
        } else {
            $msg = "<div class='alert alert-danger'>Something went wrong. Please try again later.</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>Invalid verification link.</div>";
    }
} else {
    $msg = "<div class='alert alert-danger'>Invalid request.</div>";
}
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Account Verification - Holly Saga</title>
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
                        <h2>Account Verification</h2>
                        <?php echo $msg; ?>
                        <div class="social-icons">
                            <p><a href="login.php">Login here</a>.</p>
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

<?php
include 'config.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']); // Menggunakan md5() untuk enkripsi password
$code = md5($email . date('Y-m-d H:i:s'));

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hollysagaofficial@gmail.com';
    $mail->Password = 'gomvfmdmfmgopdww';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // Recipients
    $mail->setFrom('hollysagaofficial@gmail.com', 'no reply');
    $mail->addAddress($email, $name);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Verifikasi Akun';
    $mail->Body = 'Hi! ' . $name . ' Terimakasih telah mendaftar di website ini,<br> Mohon Verifikasi Akun Kamu! <a href="https://hollysaga.shop/verify.php?code=' . $code . '">Verifikasi disini</a>';

    if ($mail->send()) {
        $sql = "INSERT INTO users (name, email, password, verifikasi_code) VALUES ('$name', '$email', '$password', '$code')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Registrasi Berhasil, Silahkan cek email untuk verifikasi akun');window.location='login.php'</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

mysqli_close($conn);
?>

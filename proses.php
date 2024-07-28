<?php
include 'config.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);

$nama = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$code = md5($email.date('Y-m-d H:i:s'));
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'hollysagaofficial@gmail.com';                     //SMTP username
    $mail->Password   = 'gomvfmdmfmgopdww';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('hollysagaofficial@gmail.com', 'no reply');
    $mail->addAddress($email, $name);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Verifikasi Akun';
    $mail->Body    = 'Hi! '.$name.' Terimakasih telah mendaftar di website ini,<br> Mohon Verifikasi Akun Kamu! <a href="https://hollysaga.shop/verify.php?code="'.$code.'">Verifikasi disini</a>' ;
    
    if ($mail->send()){
            $koneksi->query("INSERT INTO data(nama, email, password, verifikasi_code) VALUES('$name','$email','$password','$code')");

            echo"<script>alert('Registrasi Berhasil, Silahkan cek email untuk verifikasi akun');window.location='login.php'</script>";
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
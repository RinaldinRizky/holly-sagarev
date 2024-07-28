<?php
include 'config.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$code = $_GET['code'];

if (isset($code)) {
    $qry = mysqli_query($conn, "SELECT * FROM users WHERE verifikasi_code='$code'");
    $result = mysqli_fetch_assoc($qry);

    if ($result) {
        $update_query = "UPDATE users SET is_verif=1 WHERE id='" . $result['id'] . "'";
        if (mysqli_query($conn, $update_query)) {
            echo "<script>alert('Verifikasi Berhasil, Silahkan Login!');window.location='login.php'</script>";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Kode verifikasi tidak valid!');window.location='login.php'</script>";
    }
} else {
    echo "<script>alert('Kode verifikasi tidak ditemukan!');window.location='login.php'</script>";
}

mysqli_close($conn);
?>

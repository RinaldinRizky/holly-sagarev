<?php
include 'config.php';

$code = $_GET['code'];

if(isset($code)){
    $qry = $koneksi->query("SELECT * FROM data WHERE verifikasi_code='$code'");
    $result = $qry->fetch_assoc();

    $koneksi->query("UPDATE data SET is_verif=1 WHERE id='".$result['id']."'");
    echo"<script>alert('Verifikasi Berhasil, Silahkan Login!');window.location='login.php'</script>";

}

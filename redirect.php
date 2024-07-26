<?php
// Ambil ID produk dari parameter URL
$productID = $_GET['products']; 

// Atur URL default jika ID produk tidak ditemukan
$productPageURL = "register.php";

// Tentukan URL halaman produk berdasarkan ID produk
switch ($productID) {
    case 1:
        $productPageURL = "https://drive.google.com/drive/folders/1zVcnn17eEY3ZRa451L4A0bZJw535ZLb0?usp=drive_link";
        break;
    case 2:
        $productPageURL = "https://drive.google.com/drive/folders/1jDfEG1uUcPCdgk9QsVtSQEjYGchowK4p?usp=drive_link";
        break;
    case 3:
        $productPageURL = "womengrunge-product.html?id=3";
        break;
    case 4:
        $productPageURL = "wildbunch-product.html?id=4";
        break;
    case 5:
        $productPageURL = "wcp-product.html?id=5";
        break;
    case 6:
        $productPageURL = "watching-product.html?id=6";
        break;
    case 7:
        $productPageURL = "vision-product.html?id=7";
        break;
    case 8:
        $productPageURL = "upside-product.html?id=8";
        break;
    case 9:
        $productPageURL = "teddy-product.html?id=9";
        break;
    case 10:
        $productPageURL = "sacrifice-product.html?id=10";
        break;
    case 11:
        $productPageURL = "retro-product.html?id=11";
        break;
    case 12:
        $productPageURL = "pride-product.html?id=12";
        break;
    case 13:
        $productPageURL = "mazerunner-product.html?id=13";
        break;
    case 14:
        $productPageURL = "kissme-product.html?id=14";
        break;
    case 15:
        $productPageURL = "kinder-world-product.html?id=15";
        break;
    case 16:
        $productPageURL = "killing-product.html?id=16";
        break;
    case 17:
        $productPageURL = "killer-product.html?id=17";
        break;
    case 18:
        $productPageURL = "keepsmiling-product.html?id=18";
        break;
    case 19:
        $productPageURL = "jumphigher-product.html?id=19";
        break;
    case 20:
        $productPageURL = "ilovepizza-product.html?id=20";
        break;
    case 21:
        $productPageURL = "iceworldclub-product.html?id=21";
        break;
    case 22:
        $productPageURL = "hollystore-product.html?id=22";
        break;
    case 23:
        $productPageURL = "hollymenu-product.html?id=23";
        break;
    case 24:
        $productPageURL = "h-ice-product.html?id=24";
        break;
    case 25:
        $productPageURL = "grow-product.html?id=25";
        break;
    case 26:
        $productPageURL = "flower-product.html?id=26";
        break;
    case 27:
        $productPageURL = "forgive-product.html?id=27";
        break;
    case 28:
        $productPageURL = "confused-product.html?id=28";
        break;
    case 29:
        $productPageURL = "chaijo-product.html?id=29";
        break;
    case 30:
        $productPageURL = "hersmile-product.html?id=30";
        break;
    case 31:
        $productPageURL = "dating-product.html?id=31";
        break;
    case 32:
        $productPageURL = "dreamfix-product.html?id=32";
        break;
    default:
        // URL default jika ID produk tidak cocok
        $productPageURL = "register.php"; 
        break;
}

// Pengalihan ke URL halaman produk yang ditentukan
header("Location: $productPageURL");
exit();
?>

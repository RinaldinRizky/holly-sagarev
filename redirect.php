<?php
// Ambil ID produk dari URL
$productID = isset($_GET['product_id']) ? $_GET['product_id'] : null;

// Peta ID produk ke URL Google Drive
$productDriveLinks = [
1 => "https://drive.google.com/drive/folders/1zVcnn17eEY3ZRa451L4A0bZJw535ZLb0?usp=drive_link",
2 => "https://drive.google.com/drive/folders/1jDfEG1uUcPCdgk9QsVtSQEjYGchowK4p?usp=drive_link",
3 => "https://drive.google.com/drive/folders/1jDfEG1uUcPCdgk9QsVtSQEjYGchowK4p?usp=drive_link",
4 => "https://drive.google.com/drive/folders/1jDfEG1uUcPCdgk9QsVtSQEjYGchowK4p?usp=drive_link",
5 => "https://drive.google.com/drive/folders/1jDfEG1uUcPCdgk9QsVtSQEjYGchowK4p?usp=drive_link",
6 => "https://drive.google.com/drive/folders/1jDfEG1uUcPCdgk9QsVtSQEjYGchowK4p?usp=drive_link",
7 => "https://drive.google.com/drive/folders/1jDfEG1uUcPCdgk9QsVtSQEjYGchowK4p?usp=drive_link",
8 => "https://drive.google.com/drive/folders/1jDfEG1uUcPCdgk9QsVtSQEjYGchowK4p?usp=drive_link",
9 => "https://drive.google.com/drive/folders/1jDfEG1uUcPCdgk9QsVtSQEjYGchowK4p?usp=drive_link",
10 => "https://drive.google.com/drive/folders/1jDfEG1uUcPCdgk9QsVtSQEjYGchowK4p?usp=drive_link",
11 => "https://drive.google.com/drive/folders/1jDfEG1uUcPCdgk9QsVtSQEjYGchowK4p?usp=drive_link",
12 => "https://drive.google.com/drive/folders/1jDfEG1uUcPCdgk9QsVtSQEjYGchowK4p?usp=drive_link",
13 => "https://drive.google.com/drive/folders/1jDfEG1uUcPCdgk9QsVtSQEjYGchowK4p?usp=drive_link",
14 => "https://drive.google.com/drive/folders/1jDfEG1uUcPCdgk9QsVtSQEjYGchowK4p?usp=drive_link",
15 => "https://drive.google.com/drive/folders/1jDfEG1uUcPCdgk9QsVtSQEjYGchowK4p?usp=drive_link",
];

// URL default jika ID produk tidak ditemukan
$defaultDriveLink = "https://drive.google.com/drive/folders/1jAvBCUlJbO-n3dhyNeRN7syjL9xYXyrR?usp=drive_link";

// Cari URL Google Drive berdasarkan ID produk
$productPageURL = isset($productDriveLinks[$productID]) ? $productDriveLinks[$productID] : $defaultDriveLink;

// Arahkan ke URL yang sesuai
header("Location: $productPageURL");
exit();
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nama'])) {
    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES, 'UTF-8');
    echo "Nama: " . $nama;
} else {
    echo "Data 'nama' tidak ditemukan atau form belum disubmit.";
}
?>
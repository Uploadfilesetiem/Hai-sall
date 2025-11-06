<?php
// Fungsi untuk validasi input harga satuan dan jumlah beli (harus bilangan bulat dan positif)
function isValidInteger($value) {
    return filter_var($value, FILTER_VALIDATE_INT) !== false && $value > 0;
}

// Input dari user (bisa diganti dengan input dari form)
$namaBarang = "Sepatu Sport";
$hargaSatuan = 600000; // dalam Rupiah
$jumlahBeli = 2;

// Validasi input harga dan jumlah beli
if (!isValidInteger($hargaSatuan) || !isValidInteger($jumlahBeli)) {
    echo "Harga satuan dan jumlah beli harus bilangan bulat positif.";
    exit;
}

// Hitung total harga awal
$totalHargaAwal = $hargaSatuan * $jumlahBeli;

// Hitung diskon
if ($totalHargaAwal >= 500000) {
    $diskon = 0.10 * $totalHargaAwal; // diskon 10%
} else {
    $diskon = 0; // tidak ada diskon
}

// Hitung total harga akhir
$totalHargaAkhir = $totalHargaAwal - $diskon;

// Tampilkan hasil
echo "Nama Barang: $namaBarang <br>";
echo "Total Harga Awal: Rp " . number_format($totalHargaAwal, 0, ',', '.') . "<br>";
echo "Besaran Diskon: Rp " . number_format($diskon, 0, ',', '.') . "<br>";
echo "Total Harga Akhir: Rp " . number_format($totalHargaAkhir, 0, ',', '.') . "<br>";
?>

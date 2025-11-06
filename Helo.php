<?php
// Fungsi untuk memeriksa apakah input valid (bilangan positif)
function isPositiveNumber($value) {
    return is_numeric($value) && $value > 0;
}

// Input panjang sisi segitiga (bisa diganti dengan input dari user misalnya melalui form)
$sisiA = 5;
$sisiB = 5;
$sisiC = 8;

// Validasi input sisi
if (!isPositiveNumber($sisiA) || !isPositiveNumber($sisiB) || !isPositiveNumber($sisiC)) {
    echo "Input sisi harus berupa bilangan positif.";
    exit;
}

// Tentukan jenis segitiga
if ($sisiA == $sisiB && $sisiB == $sisiC) {
    echo "Segitiga Sama Sisi";
} elseif ($sisiA == $sisiB || $sisiA == $sisiC || $sisiB == $sisiC) {
    echo "Segitiga Sama Kaki";
} else {
    echo "Segitiga Sembarang";
}
?>

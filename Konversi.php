<?php
// Fungsi untuk mengonversi nilai angka ke grade huruf
function konversiNilai($nilai) {
    // Validasi nilai dalam rentang 0 sampai 100
    if ($nilai < 0 || $nilai > 100) {
        return "Nilai tidak valid.";
    }
    
    // Konversi nilai ke grade huruf berdasarkan rentang nilai
    if ($nilai >= 90 && $nilai <= 100) {
        $grade = "A";
    } elseif ($nilai >= 80 && $nilai < 90) {
        $grade = "B";
    } elseif ($nilai >= 70 && $nilai < 80) {
        $grade = "C";
    } elseif ($nilai >= 60 && $nilai < 70) {
        $grade = "D";
    } elseif ($nilai >= 0 && $nilai < 60) {
        $grade = "E";
    }
    
    // Menentukan status kelulusan
    if ($nilai >= 70) {
        return "SELAMAT! Anda LULUS dengan grade $grade.";
    } else {
        return "MAAF! Anda TIDAK LULUS dengan grade $grade.";
    }
}

// Contoh penggunaan fungsi
$nilaiUjian = 85; // Anda bisa mengganti angka ini sesuai nilai yang ingin dicek
echo konversiNilai($nilaiUjian);
?>

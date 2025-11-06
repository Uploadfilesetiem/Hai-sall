<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Nilai ke Grade</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #a8e6cf 0%, #dcedc8 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h1 {
            color: #2d5016;
            margin-bottom: 20px;
            font-size: 24px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="number"] {
            padding: 12px;
            width: calc(100% - 24px);
            margin-bottom: 15px;
            border: 2px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input[type="number"]:focus {
            border-color: #2d5016;
            outline: none;
        }
        button {
            padding: 12px 24px;
            background-color: #2d5016;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
        }
        button:hover {
            background-color: #a8e6cf;
            transform: scale(1.05);
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            border-radius: 6px;
            text-align: center;
            animation: slideIn 0.5s ease-in-out;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .lulus {
            background-color: #d4edda;
            border-left: 5px solid #28a745;
            color: #155724;
        }
        .tidak-lulus {
            background-color: #f8d7da;
            border-left: 5px solid #dc3545;
            color: #721c24;
        }
        .error {
            background-color: #fff3cd;
            border-left: 5px solid #ffc107;
            color: #856404;
        }
        footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Konversi Nilai ke Grade</h1>
        <form method="post">
            <label for="nilai">Masukkan Nilai Ujian (0-100):</label>
            <input type="number" id="nilai" name="nilai" min="0" max="100" required>
            <button type="submit">Konversi</button>
        </form>
        
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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nilaiUjian = (int) $_POST['nilai'];
            $hasil = konversiNilai($nilaiUjian);
            
            // Tentukan kelas CSS berdasarkan hasil
            if (strpos($hasil, 'LULUS') !== false) {
                $kelas = 'lulus';
            } elseif (strpos($hasil, 'TIDAK LULUS') !== false) {
                $kelas = 'tidak-lulus';
            } else {
                $kelas = 'error';
            }
            
            echo '<div class="result ' . $kelas . '">' . $hasil . '</div>';
        }
        ?>
        
        <footer>
            Dibuat dengan ❤️ menggunakan PHP, HTML, dan CSS.
        </footer>
    </div>
</body>
</html>

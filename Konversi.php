<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengecekan Jenis Segitiga</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
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
            width: 450px;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h1 {
            color: #e84393;
            margin-bottom: 20px;
            font-size: 24px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            text-align: left;
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
            border-color: #e84393;
            outline: none;
        }
        button {
            padding: 12px 24px;
            background-color: #e84393;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
        }
        button:hover {
            background-color: #ff9a9e;
            transform: scale(1.05);
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            border-radius: 6px;
            text-align: center;
            animation: slideIn 0.5s ease-in-out;
            font-weight: bold;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .sama-sisi {
            background-color: #d1ecf1;
            border-left: 5px solid #17a2b8;
            color: #0c5460;
        }
        .sama-kaki {
            background-color: #d4edda;
            border-left: 5px solid #28a745;
            color: #155724;
        }
        .sembarang {
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
        <h1>Pengecekan Jenis Segitiga</h1>
        <form method="post">
            <label for="sisiA">Panjang Sisi A:</label>
            <input type="number" id="sisiA" name="sisiA" step="0.01" min="0.01" required>
            
            <label for="sisiB">Panjang Sisi B:</label>
            <input type="number" id="sisiB" name="sisiB" step="0.01" min="0.01" required>
            
            <label for="sisiC">Panjang Sisi C:</label>
            <input type="number" id="sisiC" name="sisiC" step="0.01" min="0.01" required>
            
            <button type="submit">Cek Jenis Segitiga</button>
        </form>
        
        <?php
        // Fungsi untuk memeriksa apakah input valid (bilangan positif)
        function isPositiveNumber($value) {
            return is_numeric($value) && $value > 0;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sisiA = (float) $_POST['sisiA'];
            $sisiB = (float) $_POST['sisiB'];
            $sisiC = (float) $_POST['sisiC'];

            // Validasi input sisi
            if (!isPositiveNumber($sisiA) || !isPositiveNumber($sisiB) || !isPositiveNumber($sisiC)) {
                echo '<div class="result error">Input sisi harus berupa bilangan positif.</div>';
            } else {
                // Tentukan jenis segitiga
                if ($sisiA == $sisiB && $sisiB == $sisiC) {
                    $jenis = "Segitiga Sama Sisi";
                    $kelas = "sama-sisi";
                } elseif ($sisiA == $sisiB || $sisiA == $sisiC || $sisiB == $sisiC) {
                    $jenis = "Segitiga Sama Kaki";
                    $kelas = "sama-kaki";
                } else {
                    $jenis = "Segitiga Sembarang";
                    $kelas = "sembarang";
                }
                echo '<div class="result ' . $kelas . '">' . $jenis . '</div>';
            }
        }
        ?>
        
        <footer>
            Dibuat dengan ❤️ menggunakan PHP, HTML, dan CSS.
        </footer>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Harga Belanja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
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
            color: #0984e3;
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
        input[type="text"], input[type="number"] {
            padding: 12px;
            width: calc(100% - 24px);
            margin-bottom: 15px;
            border: 2px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus, input[type="number"]:focus {
            border-color: #0984e3;
            outline: none;
        }
        button {
            padding: 12px 24px;
            background-color: #0984e3;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
        }
        button:hover {
            background-color: #74b9ff;
            transform: scale(1.05);
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            border-radius: 6px;
            background-color: #f9f9f9;
            border-left: 5px solid #0984e3;
            text-align: left;
            animation: slideIn 0.5s ease-in-out;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .result p {
            margin: 5px 0;
            font-weight: bold;
        }
        .error {
            color: #e74c3c;
            font-weight: bold;
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
        <h1>Kalkulator Harga Belanja</h1>
        <form method="post">
            <label for="namaBarang">Nama Barang:</label>
            <input type="text" id="namaBarang" name="namaBarang" required>
            
            <label for="hargaSatuan">Harga Satuan (Rp):</label>
            <input type="number" id="hargaSatuan" name="hargaSatuan" min="1" required>
            
            <label for="jumlahBeli">Jumlah Beli:</label>
            <input type="number" id="jumlahBeli" name="jumlahBeli" min="1" required>
            
            <button type="submit">Hitung Total</button>
        </form>
        
        <?php
        // Fungsi untuk validasi input harga satuan dan jumlah beli (harus bilangan bulat dan positif)
        function isValidInteger($value) {
            return filter_var($value, FILTER_VALIDATE_INT) !== false && $value > 0;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $namaBarang = htmlspecialchars($_POST['namaBarang']);
            $hargaSatuan = (int) $_POST['hargaSatuan'];
            $jumlahBeli = (int) $_POST['jumlahBeli'];

            // Validasi input harga dan jumlah beli
            if (!isValidInteger($hargaSatuan) || !isValidInteger($jumlahBeli)) {
                echo '<div class="result error">Harga satuan dan jumlah beli harus bilangan bulat positif.</div>';
            } else {
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
                echo '<div class="result">';
                echo "<p>Nama Barang: $namaBarang</p>";
                echo "<p>Total Harga Awal: Rp " . number_format($totalHargaAwal, 0, ',', '.') . "</p>";
                echo "<p>Besaran Diskon: Rp " . number_format($diskon, 0, ',', '.') . "</p>";
                echo "<p>Total Harga Akhir: Rp " . number_format($totalHargaAkhir, 0, ',', '.') . "</p>";
                echo '</div>';
            }
        }
        ?>
        
        <footer>
            Dibuat dengan ❤️ menggunakan PHP, HTML, dan CSS.
        </footer>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penentuan Hari</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="number"] {
            padding: 10px;
            width: 100%;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            font-weight: bold;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Penentuan Hari</h1>
        <form method="post">
            <label for="hari">Masukkan nomor hari (1=Minggu, 2=Senin, ..., 7=Sabtu):</label>
            <input type="number" id="hari" name="hari" min="1" max="7" required>
            <button type="submit">Cek Hari</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $hari = (int) $_POST['hari'];
            echo '<div class="result">';
            switch ($hari) {
                case 1:
                    echo "Hari Minggu: Waktu istirahat dan keluarga.";
                    break;
                case 2:
                case 3:
                case 4:
                case 5:
                case 6:
                    echo "Hari kerja: Waktu untuk bekerja.";
                    break;
                case 7:
                    echo "Hari Sabtu: Waktu untuk rekreasi.";
                    break;
                default:
                    echo "Nomor hari tidak valid. Masukkan 1-7.";
            }
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segitiga Bintang 4 Sisi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f4f4f9;
        }
        .container {
            max-width: 600px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .error {
            color: #d9534f;
            background-color: #f2dede;
            padding: 10px;
            border-radius: 4px;
            margin-top: 15px;
        }
        .hasil-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }
        .kotak-bintang {
            background: #222;
            color: #0f0;
            padding: 15px;
            border-radius: 6px;
            text-align: center;
        }
        .kotak-bintang h4 {
            margin: 0 0 10px 0;
            color: #fff;
            font-size: 14px;
        }
        /* Kunci agar bintang simetris dan rapi di browser */
        pre {
            font-family: 'Courier New', Courier, monospace;
            font-size: 16px;
            line-height: 1.2;
            margin: 0;
            display: inline-block;
            text-align: left;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Generator Segitiga Bintang (4 Sisi)</h2>
    <form method="POST" action="">
        <label for="tinggi">Masukkan Tinggi Segitiga (1 - 20):</label><br><br>
        <input type="text" id="tinggi" name="tinggi" placeholder="Contoh: 5" required>
        <button type="submit" name="submit">Tampilkan</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $input = $_POST['tinggi'];

        // Validasi: Harus bilangan bulat (integer) dan berada di rentang 1 sampai 20
        if (filter_var($input, FILTER_VALIDATE_INT) !== false && $input >= 1 && $input <= 20) {
            $t = (int)$input;
            
            echo "<div class='hasil-grid'>";

            // 1. SISI ATAS (Piramida Normal)
            echo "<div class='kotak-bintang'><h4>1. Sisi Atas</h4><pre>";
            for ($i = 1; $i <= $t; $i++) {
                // Cetak spasi kiri
                for ($j = $i; $j < $t; $j++) {
                    echo " ";
                }
                // Cetak bintang
                for ($k = 1; $k <= (2 * $i - 1); $k++) {
                    echo "*";
                }
                echo "\n";
            }
            echo "</pre></div>";

            // 2. SISI BAWAH (Piramida Terbalik)
            echo "<div class='kotak-bintang'><h4>2. Sisi Bawah</h4><pre>";
            for ($i = $t; $i >= 1; $i--) {
                // Cetak spasi kiri
                for ($j = $t; $j > $i; $j--) {
                    echo " ";
                }
                // Cetak bintang
                for ($k = 1; $k <= (2 * $i - 1); $k++) {
                    echo "*";
                }
                echo "\n";
            }
            echo "</pre></div>";

            // 3. SISI KANAN (Menghadap ke Kanan)
            echo "<div class='kotak-bintang'><h4>3. Sisi Kanan</h4><pre>";
            // Bagian atas ke tengah
            for ($i = 1; $i <= $t; $i++) {
                for ($j = 1; $j <= $i; $j++) {
                    echo "*";
                }
                echo "\n";
            }
            // Bagian tengah ke bawah
            for ($i = $t - 1; $i >= 1; $i--) {
                for ($j = 1; $j <= $i; $j++) {
                    echo "*";
                }
                echo "\n";
            }
            echo "</pre></div>";

            // 4. SISI KIRI (Menghadap ke Kiri)
            echo "<div class='kotak-bintang'><h4>4. Sisi Kiri</h4><pre>";
            // Bagian atas ke tengah
            for ($i = 1; $i <= $t; $i++) {
                for ($j = $i; $j < $t; $j++) {
                    echo " ";
                }
                for ($k = 1; $k <= $i; $k++) {
                    echo "*";
                }
                echo "\n";
            }
            // Bagian tengah ke bawah
            for ($i = $t - 1; $i >= 1; $i--) {
                for ($j = $t; $j > $i; $j--) {
                    echo " ";
                }
                for ($k = 1; $k <= $i; $k++) {
                    echo "*";
                }
                echo "\n";
            }
            echo "</pre></div>";

            echo "</div>"; // Tutup hasil-grid

        } else {
            // Pesan jika masukan tidak valid (bukan angka bulat, desimal, huruf, atau < 1 / > 20)
            echo "<div class='error'><strong>Masukan tidak valid!</strong> Harap masukkan bilangan bulat antara 1 hingga 20.</div>";
        }
    }
    ?>
</div>

</body>
</html>
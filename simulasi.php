<?php
// Mengatur timezone
date_default_timezone_set('Asia/Jakarta');

// Fungsi untuk menampilkan motivasi secara acak
function getMotivasiHariIni() {
    $motivasi = [
        "Kesuksesan bukan tentang siapa yang cepat, tapi siapa yang konsisten.",
        "Setiap tantangan adalah peluang untuk berkembang lebih baik.",
        "Jangan menyerah karena sukses adalah kumpulan dari usaha kecil yang dilakukan setiap hari.",
        "Percayalah pada proses, semua akan indah pada waktunya.",
        "Hari ini adalah peluang baru untuk melangkah lebih dekat ke tujuanmu."
    ];
    return $motivasi[array_rand($motivasi)];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Simulasi Pangkalan Minyak - Motivasi Hari Ini">
    <meta name="author" content="Lokal.my.id">
    <meta name="keywords" content="Simulasi, Pangkalan Minyak, Motivasi, Inspirasi">
    <title>Simulasi Pangkalan Minyak</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Selamat Datang di Simulasi Pangkalan Minyak</h1>
    </header>
    <main>
        <section>
            <h2>Motivasi Hari Ini</h2>
            <p><?php echo getMotivasiHariIni(); ?></p>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Simulasi Pangkalan Minyak. Semua Hak Dilindungi.</p>
    </footer>
</body>
</html>

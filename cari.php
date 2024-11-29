<?php
function searchInFiles($directory, $searchTerms) {
    $results = [];
    $files = scandir($directory);

    foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }

        $filePath = $directory . DIRECTORY_SEPARATOR . $file;

        // Jika file adalah direktori, lakukan pencarian rekursif
        if (is_dir($filePath)) {
            $results = array_merge($results, searchInFiles($filePath, $searchTerms));
        } elseif (is_file($filePath)) {
            // Filter hanya file dengan ekstensi .php dan .txt
            $extension = pathinfo($filePath, PATHINFO_EXTENSION);
            if (!in_array($extension, ['php', 'txt', 'html'])) {
                continue;
            }

            // Baca isi file
            $content = file_get_contents($filePath);
            foreach ($searchTerms as $term) {
                // Periksa apakah kata ditemukan
                if (strpos($content, $term) !== false) {
                    $results[] = "Kata '$term' ditemukan di: $filePath";
                    break; // Tidak perlu lanjut jika salah satu kata ditemukan
                }
            }
        }
    }

    return $results;
}

// Kata kunci pencarian - tambahkan sesuai kebutuhan
$searchTerms = ["klik11", "jidi", "jickpit", "slack", "gicir", "mikwin", "hitam", "meneng", "gampang"];

// Direktori awal pencarian
$directory = "."; // Direktori root dari skrip ini

// Jalankan pencarian
$resultFiles = searchInFiles($directory, $searchTerms);

// Simpan hasil ke output.txt
$outputFile = "output.txt";
file_put_contents($outputFile, implode(PHP_EOL, $resultFiles));

// Tampilkan hasil di browser dan beri link ke output.txt
echo "<h1>Hasil Pencarian</h1>";
if (!empty($resultFiles)) {
    echo "<ul>";
    foreach ($resultFiles as $result) {
        echo "<li>$result</li>";
    }
    echo "</ul>";
    echo "<p><a href='$outputFile' download>Download Hasil (output.txt)</a></p>";
} else {
    echo "<p>Tidak ada kata kunci yang ditemukan.</p>";
}
?>

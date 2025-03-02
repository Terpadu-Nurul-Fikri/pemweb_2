<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Penilaian</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Hasil Penilaian Siswa</h2>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST['nama'];
            $mata_kuliah = $_POST['mata_kuliah'];
            $uts = $_POST['uts'];
            $uas = $_POST['uas'];
            $tugas = $_POST['tugas'];

            // Perhitungan Nilai Akhir
            $nilai_akhir = ($uts * 0.3) + ($uas * 0.35) + ($tugas * 0.35);

            // Menentukan Grade dan Predikat
            if ($nilai_akhir < 0 || $nilai_akhir > 100) {
                $grade = "I";
                $predikat = "Tidak Ada";
            } elseif ($nilai_akhir >= 85) {
                $grade = "A";
                $predikat = "Sangat Memuaskan";
            } elseif ($nilai_akhir >= 70) {
                $grade = "B";
                $predikat = "Memuaskan";
            } elseif ($nilai_akhir >= 56) {
                $grade = "C";
                $predikat = "Cukup";
            } elseif ($nilai_akhir >= 36) {
                $grade = "D";
                $predikat = "Kurang";
            } else {
                $grade = "E";
                $predikat = "Sangat Kurang";
            }

            // Menentukan status kelulusan
            $status = ($nilai_akhir >= 55) ? "<span class='badge bg-success'>LULUS</span>" : "<span class='badge bg-danger'>TIDAK LULUS</span>";

            echo "<div class='mt-4 p-4 border rounded bg-light'>
                    <p><strong>Nama:</strong> $nama</p>
                    <p><strong>Mata Kuliah:</strong> $mata_kuliah</p>
                    <p><strong>Nilai Akhir:</strong> " . number_format($nilai_akhir, 2) . "</p>
                    <p><strong>Grade:</strong> $grade</p>
                    <p><strong>Predikat:</strong> $predikat</p>
                    <p><strong>Status:</strong> $status</p>
                  </div>";
        } else {
            echo "<p class='alert alert-danger'>Data tidak ditemukan!</p>";
        }
        ?>
        <a href="form.php" class="btn btn-primary mt-3">Kembali</a>
    </div>
</body>
</html>

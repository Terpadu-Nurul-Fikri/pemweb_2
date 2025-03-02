<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Warna latar belakang */
            height: 100vh; /* Agar full layar */
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-6 col-lg-5 shadow p-4 rounded bg-white">
            <h2 class="text-center mb-4">Form Penilaian Siswa</h2>
            <form action="output.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mata Kuliah</label>
                    <select name="mata_kuliah" class="form-control">
                        <option value="Jaringan Komputer">Jaringan Komputer</option>
                        <option value="Bahasa Inggris">Bahasa Inggris</option>
                        <option value="Statistika dan Probabilitas">Statistika dan Probabilitas</option>
                        <option value="Pemrograman Web 2">Pemrograman Web 2</option>
                        <option value="Pancasila dan Kewarganegaraan">Pancasila dan Kewarganegaraan</option>
                        <option value="Komunikasi Efektif">Komunikasi Efektif</option>
                        <option value="UI/UX">User Interface & User Experience</option>
                        <option value="Basis Data">Basis Data</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nilai UTS</label>
                    <input type="number" name="uts" class="form-control" min="-100" max="100" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nilai UAS</label>
                    <input type="number" name="uas" class="form-control" min="-100" max="100" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nilai Tugas</label>
                    <input type="number" name="tugas" class="form-control" min="-100" max="100" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Hitung</button>
            </form>
        </div>
    </div>
</body>
</html>

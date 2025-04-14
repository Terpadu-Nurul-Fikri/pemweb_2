<?php
require_once '../dbkoneksi.php';
$id = $_GET['id'] ?? '';
if ($id) {
    $sql = "SELECT * FROM periksa WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$id]);
    $row = $st->fetch();
} else {
    $row = [
        'tanggal' => date('Y-m-d'), 'berat' => '', 'tinggi' => '',
        'tensi' => '', 'keterangan' => '', 'pasien_id' => '', 'dokter_id' => ''
    ];
}

// Ambil data pasien untuk dropdown
$sql_pasien = "SELECT * FROM pasien ORDER BY nama";
$rs_pasien = $dbh->query($sql_pasien);

// Ambil data dokter untuk dropdown
$sql_dokter = "SELECT * FROM paramedik WHERE kategori='dokter' ORDER BY nama";
$rs_dokter = $dbh->query($sql_dokter);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pemeriksaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-semibold mb-4 text-center">Form Pemeriksaan</h2>
        <form method="POST" action="proses_periksa.php" class="space-y-4">
            <input type="hidden" name="id" value="<?= $id ?>">

            <div>
                <label class="block text-sm font-medium">Tanggal</label>
                <input type="date" name="tanggal" value="<?= $row['tanggal'] ?>" class="w-full mt-1 p-2 border rounded-md" pattern="\d{4}-\d{2}-\d{2}">
            </div>

            <div>
                <label class="block text-sm font-medium">Pasien</label>
                <select name="pasien_id" class="w-full mt-1 p-2 border rounded-md">
                    <option value="">-- Pilih Pasien --</option>
                    <?php foreach ($rs_pasien as $pasien): ?>
                        <option value="<?= $pasien['id'] ?>" <?= $row['pasien_id']==$pasien['id']?'selected':'' ?>>
                            <?= htmlspecialchars($pasien['nama']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium">Dokter</label>
                <select name="dokter_id" class="w-full mt-1 p-2 border rounded-md">
                    <option value="">-- Pilih Dokter --</option>
                    <?php foreach ($rs_dokter as $dokter): ?>
                        <option value="<?= $dokter['id'] ?>" <?= $row['dokter_id']==$dokter['id']?'selected':'' ?>>
                            <?= htmlspecialchars($dokter['nama']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium">Berat (kg)</label>
                <input type="number" step="0.1" name="berat" value="<?= $row['berat'] ?>" class="w-full mt-1 p-2 border rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium">Tinggi (cm)</label>
                <input type="number" name="tinggi" value="<?= $row['tinggi'] ?>" class="w-full mt-1 p-2 border rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium">Tensi</label>
                <input type="text" name="tensi" value="<?= $row['tensi'] ?>" class="w-full mt-1 p-2 border rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium">Keterangan</label>
                <textarea name="keterangan" rows="3" class="w-full mt-1 p-2 border rounded-md"><?= $row['keterangan'] ?></textarea>
            </div>

            <div class="flex justify-between items-center mt-6">
                <div class="space-x-2">
                    <a href="data_periksa.php" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">← Kembali</a>
                </div>
                <button type="submit" name="simpan" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
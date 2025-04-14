<?php
require_once '../dbkoneksi.php';
$id = $_GET['id'] ?? '';
if ($id) {
    $sql = "SELECT * FROM kelurahan WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$id]);
    $row = $st->fetch();
} else {
    $row = [
        'nama_kelurahan' => '', 'kec_id' => ''
    ];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Kelurahan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-semibold mb-4 text-center">Form Kelurahan</h2>
        <form method="POST" action="proses_kelurahan.php" class="space-y-4">
            <input type="hidden" name="id" value="<?= $id ?>">

            <div>
                <label class="block text-sm font-medium">Nama Kelurahan</label>
                <input type="text" name="nama_kelurahan" value="<?= $row['nama_kelurahan'] ?>" class="w-full mt-1 p-2 border rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium">Kecamatan ID</label>
                <input type="number" name="kec_id" value="<?= $row['kec_id'] ?>" class="w-full mt-1 p-2 border rounded-md">
            </div>

            <div class="flex justify-between items-center mt-6">
                <div class="space-x-2">
                    <a href="data_kelurahan.php" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">← Kembali</a>
                </div>
                <button type="submit" name="simpan" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
require_once '../dbkoneksi.php';
$id = $_GET['id'] ?? '';
if ($id) {
    $sql = "SELECT * FROM pasien WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$id]);
    $row = $st->fetch();
} else {
    $row = [
        'kode' => '', 'nama' => '', 'gender' => '',
        'tmp_lahir' => '', 'tgl_lahir' => '',
        'email' => '', 'alamat' => '', 'kelurahan_id' => ''
    ];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-semibold mb-4 text-center">Form Pasien</h2>
        <form method="POST" action="proses_pasien.php" class="space-y-4">
            <input type="hidden" name="id" value="<?= $id ?>">

            <div>
                <label class="block text-sm font-medium">Kode</label>
                <input type="text" name="kode" value="<?= $row['kode'] ?>" class="w-full mt-1 p-2 border rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium">Nama</label>
                <input type="text" name="nama" value="<?= $row['nama'] ?>" class="w-full mt-1 p-2 border rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium">Gender</label>
                <select name="gender" class="w-full mt-1 p-2 border rounded-md">
                    <option value="">-- Pilih Gender --</option>
                    <option value="L" <?= $row['gender']=='L'?'selected':'' ?>>Laki-laki</option>
                    <option value="P" <?= $row['gender']=='P'?'selected':'' ?>>Perempuan</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium">Tempat Lahir</label>
                <input type="text" name="tmp_lahir" value="<?= $row['tmp_lahir'] ?>" class="w-full mt-1 p-2 border rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" value="<?= $row['tgl_lahir'] ?>" class="w-full mt-1 p-2 border rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" value="<?= $row['email'] ?>" class="w-full mt-1 p-2 border rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium">Alamat</label>
                <textarea name="alamat" rows="3" class="w-full mt-1 p-2 border rounded-md"><?= $row['alamat'] ?></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium">Kelurahan ID</label>
                <input type="number" name="kelurahan_id" value="<?= $row['kelurahan_id'] ?>" class="w-full mt-1 p-2 border rounded-md">
            </div>

            <div class="flex justify-between items-center mt-6">
                <div class="space-x-2">
                    <a href="data_pasien.php" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">← Kembali</a>
                </div>
                <button type="submit" name="simpan" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>

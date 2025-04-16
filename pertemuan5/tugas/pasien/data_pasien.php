<?php
require_once '../dbkoneksi.php';
$sql = "SELECT * FROM pasien";
$rs = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Pasien</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="max-w-7xl mx-auto px-4 py-6">
        <!-- Header dan Tombol -->
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 gap-3">
            <h2 class="text-2xl font-bold">Data Pasien</h2>
            <div class="flex flex-wrap gap-2">
                <a href="../index.php" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">
                    Dashboard
                </a>
                <a href="form_pasien.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                    Tambah Pasien
                </a>
            </div>
        </div>

        <!-- Tabel Data -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-200 text-gray-700 uppercase">
                    <tr>
                        <th class="px-4 py-3 whitespace-nowrap">No</th>
                        <th class="px-4 py-3 whitespace-nowrap">Kode</th>
                        <th class="px-4 py-3 whitespace-nowrap">Nama</th>
                        <th class="px-4 py-3 whitespace-nowrap">Alamat</th>
                        <th class="px-4 py-3 whitespace-nowrap">Email</th>
                        <th class="px-4 py-3 whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <?php foreach ($rs as $i => $row): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3"><?= $i+1 ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($row['kode']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($row['nama']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($row['alamat']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($row['email']) ?></td>
                            <td class="px-4 py-3 whitespace-nowrap space-x-2">
                                <a href="form_pasien.php?id=<?= $row['id'] ?>" class="text-blue-600 hover:underline">Edit</a>
                                <a href="proses_pasien.php?hapus=<?= $row['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('Hapus data?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
<?php
$dbh = null;
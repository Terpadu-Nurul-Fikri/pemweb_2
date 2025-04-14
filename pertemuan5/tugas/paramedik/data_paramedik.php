<?php
require_once '../dbkoneksi.php';
$sql = "SELECT p.*, u.nama_unit FROM paramedik p 
        LEFT JOIN unit_kerja u ON p.unit_kerja_id = u.id";
$rs = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Paramedik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="max-w-7xl mx-auto px-4 py-6">
        <!-- Header dan Tombol -->
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 gap-3">
            <h2 class="text-2xl font-bold">Data Paramedik</h2>
            <div class="flex flex-wrap gap-2">
                <a href="../index.php" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">
                    🏠 Dashboard
                </a>
                <a href="form_paramedik.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                    + Tambah Paramedik
                </a>
            </div>
        </div>

        <!-- Tabel Data -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-200 text-gray-700 uppercase">
                    <tr>
                        <th class="px-4 py-3 whitespace-nowrap">No</th>
                        <th class="px-4 py-3 whitespace-nowrap">Nama</th>
                        <th class="px-4 py-3 whitespace-nowrap">Gender</th>
                        <th class="px-4 py-3 whitespace-nowrap">Tempat Lahir</th>
                        <th class="px-4 py-3 whitespace-nowrap">Tanggal Lahir</th>
                        <th class="px-4 py-3 whitespace-nowrap">Kategori</th>
                        <th class="px-4 py-3 whitespace-nowrap">Telepon</th>
                        <th class="px-4 py-3 whitespace-nowrap">Unit Kerja</th>
                        <th class="px-4 py-3 whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <?php foreach ($rs as $i => $row): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3"><?= $i+1 ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($row['nama']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($row['gender']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($row['tmp_lahir']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($row['tgl_lahir']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($row['kategori']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($row['telpon']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($row['nama_unit']) ?></td>
                            <td class="px-4 py-3 whitespace-nowrap space-x-2">
                                <a href="form_paramedik.php?id=<?= $row['id'] ?>" class="text-blue-600 hover:underline">Edit</a>
                                <a href="proses_paramedik.php?hapus=<?= $row['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('Hapus data?')">Hapus</a>
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
// Close the database connection
$dbh = null;
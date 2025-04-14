<?php 
require_once '../dbkoneksi.php';

// Query mahasiswa with prodi name
$sql = "SELECT m.*, p.nama as prodi_nama 
        FROM mahasiswa m
        LEFT JOIN prodi p ON m.prodi_id = p.id
        ORDER BY m.nim";
$query = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="container mx-auto p-4 max-w-6xl">
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
            <div class="px-6 py-4 bg-gray-100 border-b flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-800">
                    <i class="fas fa-user-graduate mr-2"></i>Daftar Mahasiswa
                </h3>
                <a href="#" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-300 text-sm flex items-center">
                    <i class="fas fa-plus mr-2"></i> Tambah Mahasiswa
                </a>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="py-3 px-4 border-b text-left">NIM</th>
                            <th class="py-3 px-4 border-b text-left">Nama</th>
                            <th class="py-3 px-4 border-b text-left">Tempat Lahir</th>
                            <th class="py-3 px-4 border-b text-left">Tanggal Lahir</th>
                            <th class="py-3 px-4 border-b text-left">Email</th>
                            <th class="py-3 px-4 border-b text-center">Tahun Masuk</th>
                            <th class="py-3 px-4 border-b text-center">SKS Lulus</th>
                            <th class="py-3 px-4 border-b text-center">IPK</th>
                            <th class="py-3 px-4 border-b text-left">Prodi</th>
                            <th class="py-3 px-4 border-b text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($query->rowCount() > 0): ?>
                            <?php foreach ($query as $row): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 border-b font-medium"><?= $row['nim'] ?></td>
                                    <td class="py-3 px-4 border-b"><?= $row['nama'] ?></td>
                                    <td class="py-3 px-4 border-b"><?= $row['tmp_lahir'] ?></td>
                                    <td class="py-3 px-4 border-b"><?= date('d/m/Y', strtotime($row['tgl_lahir'])) ?></td>
                                    <td class="py-3 px-4 border-b"><?= $row['email'] ?></td>
                                    <td class="py-3 px-4 border-b text-center"><?= $row['thn_masuk'] ?></td>
                                    <td class="py-3 px-4 border-b text-center"><?= $row['sks_lulus'] ?></td>
                                    <td class="py-3 px-4 border-b text-center font-medium"><?= $row['ipk'] ?></td>
                                    <td class="py-3 px-4 border-b"><?= $row['prodi_nama'] ?? $row['prodi_id'] ?></td>
                                    <td class="py-3 px-4 border-b">
                                        <div class="flex justify-center gap-2">
                                            <a href="#" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-1 px-3 rounded text-sm transition duration-300 flex items-center">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="bg-red-500 hover:bg-red-600 text-white font-medium py-1 px-3 rounded text-sm transition duration-300 flex items-center">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="py-8 text-center text-gray-500">Tidak ada data mahasiswa</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="text-center">
            <a href="../prodi/form_prodi.php" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                <i class="fas fa-university mr-2"></i> Kelola Program Studi
            </a>
        </div>
    </div>
</body>
</html>
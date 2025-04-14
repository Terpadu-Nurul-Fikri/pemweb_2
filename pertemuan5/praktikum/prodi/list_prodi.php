<?php
require_once '../dbkoneksi.php';

// Query to get all prodi records
$sql = "SELECT * FROM prodi ORDER BY kode";
$rs = $dbh->query($sql);
?>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="px-6 py-4 bg-gray-100 border-b flex justify-between items-center">
        <h3 class="text-xl font-bold text-gray-800">
            <i class="fas fa-list mr-2"></i>Daftar Program Studi
        </h3>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-3 px-4 border-b text-left">No</th>
                    <th class="py-3 px-4 border-b text-left">Kode</th>
                    <th class="py-3 px-4 border-b text-left">Nama</th>
                    <th class="py-3 px-4 border-b text-left">Kaprodi</th>
                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while($row = $rs->fetch(PDO::FETCH_ASSOC)):
                ?>
                <tr class="hover:bg-gray-50">
                    <td class="py-3 px-4 border-b text-center"><?= $no++ ?></td>
                    <td class="py-3 px-4 border-b font-medium"><?= $row['kode'] ?></td>
                    <td class="py-3 px-4 border-b"><?= $row['nama'] ?></td>
                    <td class="py-3 px-4 border-b"><?= $row['kaprodi'] ?></td>
                    <td class="py-3 px-4 border-b">
                        <div class="flex justify-center gap-2">
                            <a href="form_prodi.php?id_edit=<?= $row['id'] ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-1 px-3 rounded text-sm transition duration-300 flex items-center">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="proses_prodi.php" onsubmit="return confirm('Yakin ingin menghapus data?')">
                                <input type="hidden" name="id_edit" value="<?= $row['id'] ?>">
                                <button type="submit" name="proses" value="Hapus" class="bg-red-500 hover:bg-red-600 text-white font-medium py-1 px-3 rounded text-sm transition duration-300 flex items-center">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
                
                <?php if($no == 1): ?>
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-500">Tidak ada data program studi</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
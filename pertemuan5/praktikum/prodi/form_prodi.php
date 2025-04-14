<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Studi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="container mx-auto p-4 mt-5 max-w-4xl">
        <h2 class="text-center mb-6 text-2xl font-bold text-gray-800">
            <i class="fas fa-university mr-2"></i>Form Program Studi
        </h2>
        
        <?php
        require_once '../dbkoneksi.php';
        
        // Initialize variables
        $id = "";
        $kode = "";
        $nama = "";
        $kaprodi = "";
        $process_type = "Simpan";
        
        // Check if we're editing an existing record
        if(isset($_GET['id_edit'])) {
            $id_edit = $_GET['id_edit'];
            $process_type = "Update";
            
            // Get the record data
            $sql = "SELECT * FROM prodi WHERE id = ?";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$id_edit]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($row) {
                $id = $row['id'];
                $kode = $row['kode'];
                $nama = $row['nama'];
                $kaprodi = $row['kaprodi'];
            }
        }
        ?>
        
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <form action="proses_prodi.php" method="POST" class="space-y-4">
                <input type="hidden" name="id_edit" value="<?= $id ?>">
                
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="kode" class="block text-sm font-medium text-gray-700">Kode</label>
                        <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                            id="kode" name="kode" value="<?= $kode ?>" required>
                    </div>
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                            id="nama" name="nama" value="<?= $nama ?>" required>
                    </div>
                </div>
                <div>
                    <label for="kaprodi" class="block text-sm font-medium text-gray-700">Kaprodi</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                        id="kaprodi" name="kaprodi" value="<?= $kaprodi ?>" required>
                </div>
                
                <div class="flex gap-2 pt-4">
                    <button name="proses" value="<?= $process_type ?>" type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-300 flex items-center">
                        <i class="fas fa-save mr-2"></i> <?= $process_type ?>
                    </button>
                    
                    <?php if($process_type == "Update"): ?>
                        <a href="form_prodi.php" class="bg-gray-500 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-md transition duration-300 flex items-center">
                            <i class="fas fa-times mr-2"></i> Batal
                        </a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <?php include "list_prodi.php" ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Add simple form validation
        $(document).ready(function() {
            $('form').on('submit', function() {
                let valid = true;
                $(this).find('input[required]').each(function() {
                    if ($(this).val() === '') {
                        alert('Semua field harus diisi!');
                        valid = false;
                        return false;
                    }
                });
                return valid;
            });
        });
    </script>
</body>
</html>
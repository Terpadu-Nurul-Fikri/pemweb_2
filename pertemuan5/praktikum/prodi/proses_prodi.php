<?php 
require_once '../dbkoneksi.php';

// Get form data
$proses = $_POST['proses'] ?? '';

try {
    // Begin transaction
    $dbh->beginTransaction();
    
    // Determine which process to run
    if($proses == "Simpan") {
        // Create operation
        $kode = $_POST['kode'] ?? '';
        $nama = $_POST['nama'] ?? '';
        $kaprodi = $_POST['kaprodi'] ?? '';
        
        // Validate required fields
        if(empty($kode) || empty($nama) || empty($kaprodi)) {
            throw new Exception("Semua field harus diisi");
        }
        
        $sql = "INSERT INTO prodi (kode, nama, kaprodi) VALUES (?, ?, ?)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$kode, $nama, $kaprodi]);
        
    } else if($proses == "Update") {
        // Update operation
        $kode = $_POST['kode'] ?? '';
        $nama = $_POST['nama'] ?? '';
        $kaprodi = $_POST['kaprodi'] ?? '';
        $id_edit = $_POST['id_edit'] ?? '';
        
        // Validate required fields
        if(empty($kode) || empty($nama) || empty($kaprodi) || empty($id_edit)) {
            throw new Exception("Semua field harus diisi");
        }
        
        $sql = "UPDATE prodi SET kode=?, nama=?, kaprodi=? WHERE id=?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$kode, $nama, $kaprodi, $id_edit]);
        
    } else if($proses == "Hapus") {
        // Delete operation
        $id_hapus = $_POST['id_edit'] ?? '';
        
        if(empty($id_hapus)) {
            throw new Exception("ID tidak valid");
        }
        
        // Check if prodi is being used by any mahasiswa
        $check_sql = "SELECT COUNT(*) FROM mahasiswa WHERE prodi_id = ?";
        $check_stmt = $dbh->prepare($check_sql);
        $check_stmt->execute([$id_hapus]);
        $count = $check_stmt->fetchColumn();
        
        if($count > 0) {
            throw new Exception("Program studi tidak dapat dihapus karena sedang digunakan");
        }
        
        $sql = "DELETE FROM prodi WHERE id=?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$id_hapus]);
    }
    
    // Commit transaction
    $dbh->commit();
    
    // Set success message in session
    session_start();
    $_SESSION['message'] = "Data berhasil di".strtolower($proses);
    $_SESSION['message_type'] = "success";
    
} catch (Exception $e) {
    // Rollback transaction
    $dbh->rollBack();
    
    // Set error message in session
    session_start();
    $_SESSION['message'] = "Error: " . $e->getMessage();
    $_SESSION['message_type'] = "error";
}

// Redirect back to the main page
header('location:form_prodi.php');
exit();
?>
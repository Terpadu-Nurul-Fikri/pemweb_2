<?php
require_once '../dbkoneksi.php';

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $data = [
        $_POST['nama_unit']
    ];

    if ($id) {
        // update
        $sql = "UPDATE unit_kerja SET nama_unit=? WHERE id=?";
        $data[] = $id;
    } else {
        // insert
        $sql = "INSERT INTO unit_kerja (nama_unit) VALUES (?)";
    }

    $st = $dbh->prepare($sql);
    $st->execute($data);
    header('Location: data_unit_kerja.php');
    exit;

} elseif (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    
    // Cek apakah unit kerja masih digunakan oleh paramedik
    $sql_cek = "SELECT COUNT(*) as jumlah FROM paramedik WHERE unit_kerja_id = ?";
    $st_cek = $dbh->prepare($sql_cek);
    $st_cek->execute([$id]);
    $count = $st_cek->fetch();
    
    if ($count['jumlah'] > 0) {
        // Jika masih digunakan, tampilkan pesan error
        echo "<script>
            alert('Unit kerja tidak dapat dihapus karena masih digunakan oleh paramedik!');
            window.location.href = 'data_unit_kerja.php';
        </script>";
        exit;
    }
    
    // Jika tidak digunakan, hapus data
    $sql = "DELETE FROM unit_kerja WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$id]);
    header('Location: data_unit_kerja.php');
    exit;

} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM unit_kerja WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$id]);
    $row = $st->fetch(PDO::FETCH_ASSOC);
} else {
    header('Location: data_unit_kerja.php');
    exit;
}
?>
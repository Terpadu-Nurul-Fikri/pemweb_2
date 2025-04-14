<?php
require_once '../dbkoneksi.php';

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $data = [
        $_POST['kode'],
        $_POST['nama'],
        $_POST['gender'],
        $_POST['tmp_lahir'],
        $_POST['tgl_lahir'],
        $_POST['email'],
        $_POST['alamat'],
        $_POST['kelurahan_id']
    ];

    if ($id) {
        // update
        $sql = "UPDATE pasien SET kode=?, nama=?, gender=?, tmp_lahir=?, tgl_lahir=?, email=?, alamat=?, kelurahan_id=? WHERE id=?";
        $data[] = $id;
    } else {
        // insert
        $sql = "INSERT INTO pasien (kode, nama, gender, tmp_lahir, tgl_lahir, email, alamat, kelurahan_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    }

    $st = $dbh->prepare($sql);
    $st->execute($data);
    header('Location: data_pasien.php');
    exit;

} elseif (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $sql = "DELETE FROM pasien WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$id]);
    header('Location: data_pasien.php');
    exit;

} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pasien WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$id]);
    $row = $st->fetch(PDO::FETCH_ASSOC);
} else {
    header('Location: data_pasien.php');
    exit;
}
?>

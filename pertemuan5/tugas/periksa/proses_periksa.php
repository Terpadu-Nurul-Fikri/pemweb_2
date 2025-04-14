<?php
require_once '../dbkoneksi.php';

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $data = [
        $_POST['tanggal'] ? $_POST['tanggal'] : date('Y-m-d'),
        $_POST['berat'],
        $_POST['tinggi'],
        $_POST['tensi'],
        $_POST['keterangan'],
        $_POST['pasien_id'],
        $_POST['dokter_id']
    ];

    if ($id) {
        // update
        $sql = "UPDATE periksa SET tanggal=?, berat=?, tinggi=?, tensi=?, keterangan=?, pasien_id=?, dokter_id=? 
                WHERE id=?";
        $data[] = $id;
    } else {
        // insert
        $sql = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan, pasien_id, dokter_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
    }

    $st = $dbh->prepare($sql);
    $st->execute($data);
    header('Location: data_periksa.php');
    exit;

} elseif (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $sql = "DELETE FROM periksa WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$id]);
    header('Location: data_periksa.php');
    exit;

} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM periksa WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$id]);
    $row = $st->fetch(PDO::FETCH_ASSOC);
} else {
    header('Location: data_periksa.php');
    exit;
}
?>
<?php
require_once '../dbkoneksi.php';

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $data = [
        $_POST['nama_kelurahan'],
        $_POST['kec_id']
    ];

    if ($id) {
        // update
        $sql = "UPDATE kelurahan SET nama_kelurahan=?, kec_id=? WHERE id=?";
        $data[] = $id;
    } else {
        // insert
        $sql = "INSERT INTO kelurahan (nama_kelurahan, kec_id) VALUES (?, ?)";
    }

    $st = $dbh->prepare($sql);
    $st->execute($data);
    header('Location: data_kelurahan.php');
    exit;

} elseif (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $sql = "DELETE FROM kelurahan WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$id]);
    header('Location: data_kelurahan.php');
    exit;

} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM kelurahan WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$id]);
    $row = $st->fetch(PDO::FETCH_ASSOC);
} else {
    header('Location: data_kelurahan.php');
    exit;
}
?>
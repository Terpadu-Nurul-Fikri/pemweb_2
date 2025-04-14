<?php
require_once '../dbkoneksi.php';

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $data = [
        $_POST['nama'],
        $_POST['gender'],
        $_POST['tmp_lahir'],
        $_POST['tgl_lahir'],
        $_POST['kategori'],
        $_POST['telpon'],
        $_POST['alamat'],
        $_POST['unit_kerja_id']
    ];

    if ($id) {
        // update
        $sql = "UPDATE paramedik SET nama=?, gender=?, tmp_lahir=?, tgl_lahir=?, kategori=?, telpon=?, alamat=?, unit_kerja_id=? WHERE id=?";
        $data[] = $id;
    } else {
        // insert
        $sql = "INSERT INTO paramedik (nama, gender, tmp_lahir, tgl_lahir, kategori, telpon, alamat, unit_kerja_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    }

    $st = $dbh->prepare($sql);
    $st->execute($data);
    header('Location: data_paramedik.php');
    exit;

} elseif (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $sql = "DELETE FROM paramedik WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$id]);
    header('Location: data_paramedik.php');
    exit;

} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM paramedik WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$id]);
    $row = $st->fetch(PDO::FETCH_ASSOC);
} else {
    header('Location: data_paramedik.php');
    exit;
}
?>
<?php
require_once 'nilai_mahasiswa.php';

$data_mhs = [];

// Data awal
$data_mhs[] = new NilaiMahasiswa("Joko", "Pemrograman Web", 30, 25, 15);
$data_mhs[] = new NilaiMahasiswa("Kada", "Pemrograman Web", 80, 88, 90);
$data_mhs[] = new NilaiMahasiswa("Alex", "Pemrograman Web", 90, 56, 67);

// Cek jika ada input form yang dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)){
    $nama = $_POST['nama'];
    $matakuliah = $_POST['matakuliah'];
    $nilai_uts = $_POST['nilai_uts'];
    $nilai_uas = $_POST['nilai_uas'];
    $nilai_tugas = $_POST['nilai_tugas'];

    // Tambahkan data baru ke dalam array
    $data_mhs[] = new NilaiMahasiswa($nama, $matakuliah, $nilai_uts, $nilai_uas, $nilai_tugas);
}
?>

<h3>Input Data Mahasiswa</h3>

<form method="POST">
    <label for="">Nama</label>
    <input type="text" name="nama" required><br><br>
    
    <label for="">Mata Kuliah</label>
    <input type="text" name="matakuliah" required><br><br>
    
    <label for="">UTS</label>
    <input type="number" name="nilai_uts" required><br><br>
    
    <label for="">UAS</label>
    <input type="number" name="nilai_uas" required><br><br>
    
    <label for="">Tugas</label>
    <input type="number" name="nilai_tugas" required><br><br>
    
    <input type="submit" value="Simpan">
</form>

<h3>Daftar Nilai Mahasiswa</h3>
<table border="1" cellpadding="2" cellspacing="2" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Mata Kuliah</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Tugas</th>
            <th>Nilai Akhir</th>
            <th>Kelulusan</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $nomor = 1;
    foreach($data_mhs as $mhs) {
        echo "<tr>";
        echo "<td>".$nomor."</td>";
        echo "<td>".$mhs->nama."</td>";
        echo "<td>".$mhs->matakuliah."</td>";
        echo "<td>".$mhs->nilai_uts."</td>";
        echo "<td>".$mhs->nilai_uas."</td>";
        echo "<td>".$mhs->nilai_tugas."</td>";
        echo "<td>" . number_format($mhs->getNA(), 2) . "</td>";
        echo "<td>".$mhs->kelulusan()."</td>";
        echo "</tr>";
        $nomor++;
    }
    ?>
    </tbody>
</table>

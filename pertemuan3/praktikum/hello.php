<?php
/*
    Fungsi salam dengan parameter $nama
*/
function salam($nama="Nurul Fikri"){
    echo "Hello, Selamat datang! ".$nama;
}
?>

<h1>Belajar fungsi</h1>

<?php
    salam("Mahmud Lazuardi");
    echo "<br>";
    salam();
?>
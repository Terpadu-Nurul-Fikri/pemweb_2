<?php
    require_once 'lingkaran.php';

    $lingkaran1 = new Lingkaran(8.4);
    $lingkaran2 = new Lingkaran(14);

    echo 'NILAI PHI Adalah '. Lingkaran::PHI;
    echo '<br> Jari-jari lingkaran 1 = '. $lingkaran1->jari;
    echo '<br> Luas Lingkaran 1 '. $lingkaran1->getLuas();
    echo '<br> Keliling Lingkaran 1 '. $lingkaran1->getKeliling();
    echo '<br> Jari-jari lingkaran 2 = '. $lingkaran2->jari;
    echo '<hr>';
    $lingkaran1->cetak();
    echo '<br>';



?>

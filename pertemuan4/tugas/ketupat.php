<?php

/**
 * Class Ketupat
 */
class Ketupat {
    public $diagonal1;
    public $diagonal2;
    public $tinggiPrisma;

    // Constructor untuk menginisialisasi diagonal dan tinggi prisma
    function __construct($diagonal1, $diagonal2, $tinggiPrisma){
        $this->diagonal1 = $diagonal1;
        $this->diagonal2 = $diagonal2;
        $this->tinggiPrisma = $tinggiPrisma;
    }

    // Method untuk menghitung luas alas ketupat
    function getLuas(){
        return ($this->diagonal1 * $this->diagonal2) / 2;
    }

    // Method untuk menghitung volume ketupat sebagai prisma
    function getVolume(){
        return $this->getLuas() * $this->tinggiPrisma;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volume Ketupat</title>
</head>
<body>
    <h2>Perhitungan Volume Ketupat</h2>

    <?php
    // Contoh penggunaan class Ketupat
    $ketupat = new Ketupat(8, 6, 10); // diagonal1=8, diagonal2=6, tinggiPrisma=10

    echo "<h3>Ketupat</h3>";
    echo "Diagonal 1: " . $ketupat->diagonal1 . " cm<br>";
    echo "Diagonal 2: " . $ketupat->diagonal2 . " cm<br>";
    echo "Tinggi Prisma: " . $ketupat->tinggiPrisma . " cm<br>";
    echo "<hr>";
    echo "Luas Alas: " . $ketupat->getLuas() . " cm²<br>";
    echo "Volume: " . $ketupat->getVolume() . " cm³<br>";
    ?>

</body>
</html>

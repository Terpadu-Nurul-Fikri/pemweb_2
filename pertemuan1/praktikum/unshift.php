<?php
$laptop = ["Asus", "Lenovo", "Dell", "Realme", ""];

// Menghapus elemen pertama
array_unshift($laptop, "HP", "Acer");

// Hasil
echo "Hasil";
foreach($laptop as $p){
    echo "<br>".$p;
}
?>
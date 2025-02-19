<?php
// array_push

$komponen = ["Mobo", "Processor", "RAM", "SSD", "GPU"];

array_push($komponen, "PSU", "Casing");

echo "Setelah Push<br>";
foreach ($komponen as $ak) {
    echo "$ak <br>";
}
?>
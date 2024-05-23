<?php
$str = "Les choses que l'on possède finissent par nous posséder.";

$reversed_str = "";

for ($i = strlen($str) - 1; $i >= 0; $i--) {
    $reversed_str .= $str[$i];
}

echo $reversed_str; 
?>

<?php

$str = "Certaines choses changent, et d'autres ne changeront jamais.";

$chars = str_split($str);

$premier_caractere = $chars[0];



for ($counter = 0; $counter < count($chars) - 1; $counter++) {

    $chars[$counter] = $chars[$counter + 1];
}

$chars[count($chars) - 1] = $premier_caractere;

$new_str = implode('', $chars);

echo $new_str; 
?>

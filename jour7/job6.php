<?php
function  leetSpeak($str) {
    $cont = 0;
    $result = ''; // Variable pour stocker le résultat final

    while (isset($str[$cont])) {
        $char = $str[$cont];
        switch ($char) {
            case 'A':
            case 'a':
                $result .= "4";
                break;
            case 'B':
            case 'b':
                $result .= "8";
                break;
            case 'E':
            case 'e':
                $result .= "3";
                break;
            case 'G':
            case 'g':
                $result .= "6";
                break;
            case 'L':
            case 'l':
                $result .= "1";
                break;
            case 'S':
            case 's':
                $result .= "5";
                break;
            case 'T':
            case 't':
                $result .= "7";
                break;
            default:
                $result .= $char; // Garder le caractère inchangé
                break;
        }
        $cont++;
    }

    return $result;
}

// Exemple d'utilisation
 echo leetSpeak("ABEGLST");
?>
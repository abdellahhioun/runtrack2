<?php
// Définition de la fonction calcule()
function calcule($a, $operation, $b) {
    switch ($operation) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        case '/':
            return $b != 0 ? $a / $b : "Erreur : Division par zéro";
        case '%':
            return $b != 0 ? $a % $b : "Erreur : Modulo par zéro";
        default:
            return "Erreur : Opération non valide";
    }
}

// Exemple d'utilisation de la fonction calcule()
echo calcule(10, '+', 5); // Affichera 15
echo "<br>";
echo calcule(10, '-', 5); // Affichera 5
echo "<br>";
echo calcule(10, '*', 5); // Affichera 50
echo "<br>";
echo calcule(10, '/', 5); // Affichera 2
echo "<br>";
echo calcule(10, '%', 5); // Affichera 0
echo "<br>";
echo calcule(10, '/', 0); // Affichera "Erreur : Division par zéro"
echo "<br>";
echo calcule(10, 'x', 5); // Affichera "Erreur : Opération non valide"
?>

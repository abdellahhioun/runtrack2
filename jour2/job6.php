<?php
$largeur = 30;
$hauteur = 10;

// Boucle pour afficher les lignes du rectangle
for ($i = 0; $i < $hauteur; $i++) {
    // Boucle pour afficher les colonnes du rectangle
    for ($j = 0; $j < $largeur; $j++) {
        echo "¤"; // Affichage du caractère "*" pour représenter le rectangle
    }
    echo "<br />"; // Retour à la ligne après chaque ligne du rectangle
}
?>
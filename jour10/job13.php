<?php
$connection = mysqli_connect("localhost", "root", "", "jour09");
$query = mysqli_query($connection, "SELECT salles.nom AS nom_salle, etages.nom AS nom_etage FROM salles JOIN etages ON salles.id_etage = etages.id");

echo "<table border='2'>
        <thead>
            <tr>
                <th>Nom de la salle</th>
                <th>Nom de l'étage</th>
            </tr>
        </thead>
        <tbody>";

while ($row = mysqli_fetch_assoc($query)) {
    echo "<tr>
            <td>" . $row['nom_salle'] . "</td>
            <td>" . $row['nom_etage'] . "</td>
          </tr>";
}

echo "</tbody>
      </table>";

?>

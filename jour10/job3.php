<?php
$cheminement = mysqli_connect("localhost", "root", "", "jour09");
$selections = mysqli_query($cheminement,"SELECT prenom, nom, naissance FROM etudiants WHERE sexe = 'Femme'");
$result = mysqli_fetch_assoc($selections);
echo 
        "<table border=2>
            <thead>
                    <th>
                        prenom
                    </th>
                    <th>
                        nom
                    </th>
                    <th>
                        naissance
                    </th>
                   
            </thead>
            <tbody>";
                foreach ($selections as $user) {
                    echo "<tr>";
                        echo "<td>" . $user['prenom'] . "</td>";
                        echo "<td>" . $user['nom'] . "</td>";
                        echo "<td>"  . $user['naissance'];
                        echo "</tr>";
                    }
                echo "</tbody>
            </table>";    
?>
<?php
$cheminement = mysqli_connect("localhost", "root", "", "jour09");
$selections = "SELECT * FROM etudiants WHERE prenom LIKE 'T%'";
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
                    <th>
                        sexe
                   </th>
                   <th>
                        email
                   </th>
            </thead>
            <tbody>";
                foreach ($selections as $user) {
                    echo "<tr>";
                        echo "<td>" . $user['prenom'] . "</td>";
                        echo "<td>" . $user['nom'] . "</td>";
                        echo "<td>"  . $user['naissance'];
                        echo "<td>" . $user['sexe'] . "</td>";
                        echo "<td>" . $user['email'] . "</td>";
                        echo "</tr>";
                    }
                echo "</tbody>
            </table>";    
?>
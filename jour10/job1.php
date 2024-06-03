<?php
$cheminement = mysqli_connect("localhost", "root", "", "jour09");
$selections = mysqli_query($cheminement, "SELECT * FROM etudiants");
$result = mysqli_fetch_assoc($selections);
echo 
        "<table border=2>
            <thead>
                    <th>
                        Prénom
                    </th>
                    <th>
                        Nom
                    </th>
                    <th>
                        Naissance
                    </th>
                    <th>
                        Sexe
                    </th>
                    <th>
                        Email
                    </th>        
            </thead>
            <tbody>";
                foreach ($selections as $user) {
                    echo "<tr>";
                        echo "<td>" . $user['prenom'] . "</td>";
                        echo "<td>" . $user['nom'] . "</td>";
                        echo "<td>" . $user['naissance'] . "</td>";
                        echo "<td>" . $user['sexe'] . "</td>";
                        echo "<td>" . $user['email'] . "</td> <br/>";
                        echo "</tr>";
                    }
                echo "</tbody>
            </table>";    
?>
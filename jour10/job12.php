<?php
$cheminement = mysqli_connect("localhost", "root", "", "jour09");
$selections = mysqli_query($cheminement,"SELECT * FROM etudiants WHERE naissance BETWEEN '1998-01-01' AND '2018-12-31'");

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
                        echo "<td>"  . $user['naissance'] . "</td>";
                        echo "</tr>";
                    }
                echo "</tbody>
            </table>";    
?>

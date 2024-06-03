<?php
$cheminement = mysqli_connect("localhost", "root", "", "jour09");
$selections = mysqli_query($cheminement, "SELECT nom , capacite FROM salles");
$result = mysqli_fetch_assoc($selections);
echo 
        "<table border=2>
            <thead>
                    <th>
                        nom
                    </th>
                    <th>
                        capacite
                    </th>
                   
            </thead>
            <tbody>";
                foreach ($selections as $user) {
                    echo "<tr>";
                        echo "<td>" . $user['nom'] . "</td>";
                        echo "<td>" . $user['capacite'] . "</td>";
                        echo "</tr>";
                    }
                echo "</tbody>
            </table>";    
?>
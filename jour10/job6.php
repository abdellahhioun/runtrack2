
<?php
$cheminement = mysqli_connect("localhost", "root", "", "jour09");
$selections = mysqli_query($cheminement, "SELECT COUNT(*) as total_etudiants FROM etudiants");
$result = mysqli_fetch_assoc($selections);
echo 
        "<table border=2>
            <thead>
                <tr>
                    <th>
                        nombre total d’étudiants
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>" . $result['total_etudiants'] . "</td>
                </tr>
            </tbody>
        </table>";    
?>

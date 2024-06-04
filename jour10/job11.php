<?php
$connection = mysqli_connect("localhost", "root", "", "jour09");
$query = mysqli_query($connection, "SELECT AVG(capacite) AS capacite_moyenne FROM salles");
$result = mysqli_fetch_assoc($query);
echo "<table border='1'>
        <tr>
            <th>Capacité moyenne</th>
        </tr>
        <tr>
            <td>" . $result['capacite_moyenne'] . "</td>
        </tr>
      </table>";

mysqli_close($connection);
?>

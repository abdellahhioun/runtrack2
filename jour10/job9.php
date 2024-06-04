<?php
$connection = mysqli_connect("localhost", "root", "", "jour09");
$query = mysqli_query($connection, "SELECT * FROM salles ORDER BY capacite DESC");
echo "<table border='2'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Capacity</th>
            </tr>
        </thead>
        <tbody>";
while ($room = mysqli_fetch_assoc($query)) {
    echo "<tr>
            <td>" . $room['id'] . "</td>
            <td>" . $room['nom'] . "</td>
            <td>" . $room['capacite'] . "</td>
          </tr>";
}

echo "</tbody>
      </table>";    
?>

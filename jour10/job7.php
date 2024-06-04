<?php
$cheminement = mysqli_connect("localhost", "root", "", "jour09");
$selections = mysqli_query($cheminement, "SELECT SUM(superficie) as total_superficie FROM etage");
$result = mysqli_fetch_assoc($selections);
echo 
        "<table border=2>
            <thead>
                <tr>
                    <th>
                    total superficie
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>" . $result['total_superficie'] . "</td>
                </tr>
            </tbody>
        </table>";    















?>
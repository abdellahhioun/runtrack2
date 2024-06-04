<?php
$cheminement = mysqli_connect("localhost", "root", "", "jour09");
$selections = mysqli_query($cheminement, "SELECT SUM(capacite) as total_capacite FROM salles");
$result = mysqli_fetch_assoc($selections);
echo 
        "<table border=2>
            <thead>
                <tr>
                    <th>
                    total capacite
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>" . $result['total_capacite'] . "</td>
                </tr>
            </tbody>
        </table>";    

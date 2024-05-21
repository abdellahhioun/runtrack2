<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 40px;
        
        }
            


    </style>
</head>
<body>
<?php
$sin1 = 19;
$sin2 = 1.1;
$sin3 = "siuuu";
$sin4 = true;

echo"
<table border='1'>
    <thead>
        <tr>
            <th>type</>
            <th>name</>
            <th>value</>
        </tr>
    <tbody class test>
    <tr>
            <td> integer </td>
            <td> 19 </td>
            <td>" . $sin1 . "</td>
    </tr>
    <tr>
            <td> float </td>
            <td> 1.1 </td>
            <td>. $sin2 . </td>
    <tr>
            <td> string </td>
            <td> siuuuu </td>
            <td> . $sin3 . </td>
    <tr>
            <td> boolean </td>
            <td> true </td>
            <td> . $sin4 . </td>
    </tbody>
</table>
";



?>

</body>
</html>


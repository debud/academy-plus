<!DOCTYPE html>
<html>
<head>
    <title>Actori</title>
    <link rel=stylesheet type="text/css" href="../index.css">
</head>
<?php
function afisareActori($sql, $succes_message, $err_message)
{
echo "<h2>Afisare Actori</h2>";
    include "../connection.php";
    $conn = connection();
    $result = $conn->prepare($sql);
    $result->execute();
    $count = $result->affected_rows;
    if ($count){
        $validate_sql = 1;
    }
    else {
        $validate_sql = 0;
    }
    $sql2 = "SELECT * FROM Actori";
    $result = $conn->query($sql2);
    if ($result->num_rows > 0) {
        echo "<h1>". $succes_message ."</h1>";
        echo "<table><thead>
          <tr>  
             <th>id_actor</th>
             <th>nume</th>
             <th>prenume</th>
             <th>nationalitate</th>
             <th>oras</th>
             <th>data_nasterii</th>
             <th>inaltime</th>
             <th>greutate</th>
             <th>email</th>
             <th>telefon</th>
          </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id_actor"] . "</td><td>" . $row["nume"] . "</td><td>" . $row["prenume"] . "
            </td><td>" . $row["nationalitate"] . "</td><td>" . $row["oras"] . "</td> <td>" . $row["data_nasterii"] . "
            </td> <td>" . $row["inaltime"] . "</td> <td>" . $row["greutate"] . "</td>
            <td>" . $row["email"] . "</td> <td>" . $row["telefon"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo $err_message;
    }
}
?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tabele</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet type="text/css" href="../index.css">
    <style>

    </style>
</head>
<body>
<div>
    <?php
    include "../connection.php";
    $sql = "SELECT * FROM Actori";
    $succes_message = "Interogare reusita";
    $err_message = "0 rezultate";
    $conn = connection();
    $result = $conn->query($sql);
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
    ?>
    <a href="../index.html" class="button">Inapoi</a>
</body>
</html>



<!DOCTYPE html>
<html>
<head>
    <title>Filme</title>
    <link rel=stylesheet type="text/css" href="index.css">
</head>
<?php
function afisareFilme($sql, $succes_message, $err_message)
{
    echo "<h2>Afisare Filme</h2>";
    include "connection.php";
    $conn = connection();
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<h1>".  $succes_message ."</h1>";
            echo "<table><thead>
      <tr>  
         <th>id_film</th>
         <th>denumire film</th>
         <th>website</th>
          <th>an_aparitie</th>
      </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id_film"] . "</td><td>" . $row["denumire"] . "</td><td>" . $row["website"] . "</td><td>" . $row["an_aparitie"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo $err_message;
    }
}
?>
</body>
</html>
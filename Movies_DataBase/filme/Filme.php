<!DOCTYPE html>
<html>
<head>
    <title>Filme</title>
    <link rel=stylesheet type="text/css" href="../index.css">
</head>
<?php
function afisareFilme($sql, $succes_message, $err_message)
{
    echo "<h2>Afisare Filme</h2>";
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
    $sql2 = "SELECT * FROM Filme";
    $result = $conn->query($sql2);
    if ($result->num_rows > 0)
    {
        if ($validate_sql == 1) {
            echo "<h1>" . $succes_message . "</h1>";
        }
        else
            echo "<h1>" . $err_message . "</h1>";
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
        echo "<h1>" . $err_message . "</h1>";
    }
}
?>
</body>
</html>
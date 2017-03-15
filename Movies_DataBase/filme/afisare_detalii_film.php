<!DOCTYPE html>
<html>
<head>
    <title>Filme DataBase</title>
    <link rel=stylesheet type="text/css" href="../index.css">
</head>
<div>
    <h4>Introduceti denumirea filmului despre care doriti sa aflati toate detaliile</h4>
<form action="afisare_detalii_film.php" method="get" >
    denumire:       <br><input type="text" name="denumire" value="0"></br>
    <input type="submit" value="Submit">
</form>
</div>
<?php
include "../connection.php";
if (isset($_GET["denumire"]))
{
    $denumire = $_GET["denumire"];
    $sql ="SELECT DISTINCT id_film, denumire, website, an_aparitie
    FROM Filme 
    WHERE denumire = '" . $denumire . "'";
    $err_message = "Negasit";
    $succes_message = "Gasit";
    $conn = connection();
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
            echo "<h1>" . $succes_message . "</h1>";
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
<h2>
    <form action="../index.html">
        <input type="submit" value="Inapoi">
    </form>
</h2>
</body>
</html>
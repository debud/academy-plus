<!DOCTYPE html>
<html>
<head>
    <title>Filme DataBase</title>
    <link rel=stylesheet type="text/css" href="../index.css">
</head>
<?php
include "../connection.php";
echo "<h2>Afisare rezultat</h2>";
if (isset($_GET["id"]))
{
        $nume_prenume_actor = $_GET["id"];
        $sql ="SELECT DISTINCT id_film, denumire, website, an_aparitie
        FROM Filme f
        WHERE f.id_film IN
        (SELECT i.id_film
         FROM intermediar i
         WHERE i.id_actor =
         (SELECT a.id_actor
          FROM Actori a
          WHERE CONCAT(a.nume,' ', a.prenume) LIKE '" . $nume_prenume_actor . "')); ";
    $err_message = "Negasit";
    $succes_message = $nume_prenume_actor;
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
<!DOCTYPE html>
<html>
<head>
    <title>Actori DataBase</title>
    <link rel=stylesheet type="text/css" href="../index.css">
</head>

<?php
include "../connection.php";
echo "<h2>Afisare rezultat</h2>";
if (isset($_GET["id"]))
{
    $denumire = $_GET["id"];
    $sql = "SELECT DISTINCT a.id_actor, a.nume, a.prenume, a.nationalitate, a.oras, a.data_nasterii, a.inaltime, a.greutate, a.email, a.telefon
            FROM Actori a
            WHERE a.id_actor IN
            (SELECT i.id_actor
             FROM intermediar i
             WHERE id_film =
             (SELECT f.id_film
              FROM Filme f
              WHERE f.denumire = '" . $denumire . "') );";
    $err_message = "Negasit";
    $succes_message = $denumire ;
    /* afisare rezultat */
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
}
?>

<h2>
    <form action="../index.html">
        <input type="submit" value="Inapoi">
    </form>
</h2>
</body>
</html>
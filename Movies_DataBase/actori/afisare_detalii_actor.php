<!DOCTYPE html>
<html>
<head>
    <title>Actori DataBase</title>
    <link rel=stylesheet type="text/css" href="../index.css">
</head>
<div>
    <h4>Introduceti numele si prenumele actorului despre care doriti sa aflati toate detaliile</h4>
<form action="afisare_detalii_actor.php" method="get" >
    nume:       <br><input type="text" name="nume" value="0"></br>
    prenume:       <br><input type="text" name="prenume" value="0"></br>
    <input type="submit" value="Submit">
</form>
</div>
<?php
include "../connection.php";
if (isset($_GET["nume"]) && isset($_GET["prenume"]))
{
    $nume = $_GET["nume"];
    $prenume = $_GET["prenume"];
    $sql ="SELECT DISTINCT a.id_actor, a.nume, a.prenume, a.nationalitate, a.oras, a.data_nasterii, a.inaltime, a.greutate, a.email, a.telefon
    FROM Actori a
    WHERE CONCAT(a.nume,' ', a.prenume) LIKE '" . $nume . " ". $prenume ."'";
    $err_message = "Negasit";
    $succes_message = "Gasit";
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
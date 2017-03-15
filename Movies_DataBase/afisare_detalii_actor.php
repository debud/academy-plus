<!DOCTYPE html>
<html>
<head>
    <title>Actori DataBase</title>
    <link rel=stylesheet type="text/css" href="index.css">
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
include "Actori.php";
if (isset($_GET["nume"]) && isset($_GET["prenume"]))
{
    $nume = $_GET["nume"];
    $prenume = $_GET["prenume"];
    $sql ="SELECT DISTINCT a.id_actor, a.nume, a.prenume, a.nationalitate, a.oras, a.data_nasterii, a.inaltime, a.greutate, a.email, a.telefon
    FROM Actori a
    WHERE CONCAT(a.nume,' ', a.prenume) LIKE '" . $nume . " ". $prenume ."'";
    $err_message = "Negasit";
    $succes_message = "Gasit";
    afisareActori($sql, $succes_message, $err_message);
}
?>
<h2>
    <form action="index.html">
        <input type="submit" value="Inapoi">
    </form>
</h2>
</body>
</html>
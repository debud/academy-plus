<!DOCTYPE html>
<html>
<head>
    <title>Filme DataBase</title>
    <link rel=stylesheet type="text/css" href="index.css">
</head>
<div>
    <h4>Introduceti denumirea filmului despre care doriti sa aflati toate detaliile</h4>
<form action="afisare_detalii_film.php" method="get" >
    denumire:       <br><input type="text" name="denumire" value="0"></br>
    <input type="submit" value="Submit">
</form>
</div>
<?php
include "Filme.php";
if (isset($_GET["denumire"]))
{
    $denumire = $_GET["denumire"];
    $sql ="SELECT DISTINCT id_film, denumire, website, an_aparitie
    FROM Filme 
    WHERE denumire = '" . $denumire . "'";
    $err_message = "Negasit";
    $succes_message = "Gasit";
    afisareFilme($sql, $succes_message, $err_message);
}
?>
<h2>
    <form action="index.html">
        <input type="submit" value="Inapoi">
    </form>
</h2>
</body>
</html>
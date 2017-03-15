<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <link rel=stylesheet type="text/css" href="index.css">
    <title>Title</title>
</head>
<body>
<div>
    <h4>Introduceti denumirea filmului pe care doriti sa il stergeti</h4>
<form action="stergere_film.php" method="get" >
    Denumire film:       <br><input type="text" name="denumire" value="0"></br>
    <input type="submit" value="Submit">
</form>
</div>
<?php
include "Filme.php";
if (isset($_GET["denumire"]))
{
    $sql = "DELETE FROM Filme WHERE denumire = '". $_GET["denumire"] . "'";
    $err_message = "Filmul " . $_GET["denumire"] . " nu a fost gasit in baza de date ";
    $succes_message = "Filmul s-a sters cu succes";
    $sql = "SELECT * FROM Filme";
    afisareFilme($sql, $succes_message, $err_message);
}
else echo "<div>Campul denumire este obligatoriu !</div>";
?>
<a href="index.html" class="button">Inapoi</a>
</body>
</html>

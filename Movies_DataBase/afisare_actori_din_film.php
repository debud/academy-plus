<!DOCTYPE html>
<html>
<head>
    <title>Actori DataBase</title>
    <link rel=stylesheet type="text/css" href="index.css">
</head>

<?php
include "Actori.php";
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
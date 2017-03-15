<!DOCTYPE html>
<html>
<head>
    <title>Filme DataBase</title>
    <link rel=stylesheet type="text/css" href="index.css">
</head>
<?php
include "Filme.php";
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
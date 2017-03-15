<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <link rel=stylesheet type="text/css" href="../index.css">
    <title>Title</title>
</head>
<body>
<div>
    <h4>Introduceti numele si prenumele actorului pe care doriti sa il stergeti</h4>
<form action="stergere_actor.php" method="get" >
    Nume actor:       <br><input type="text" name="nume" value="0"></br>
    Prenume actor:  <br><input type="text" name="prenume" value="0"></br>
    <input type="submit" value="Submit">
</form>
</div>

<?php
include "Actori.php";
if (isset($_GET["nume"]) && isset($_GET["prenume"])) {
    $sql = "DELETE FROM Actori WHERE CONCAT(nume, \" \", prenume) = '" . $_GET["nume"] . " " . $_GET["prenume"] . "'";
    $err_message = "Actorul " . $_GET["nume"] . " " . $_GET["prenume"] . " nu a fost gasit in baza de date ";
    $succes_message = "Actorul s-a sters cu succes";
    afisareActori($sql, $succes_message, $err_message);
}
else
   echo "<div> Ambele campuri sunt obligatorii !</div>";
?>

<a href="../index.html" class="button">Inapoi</a>
</body>
</html>

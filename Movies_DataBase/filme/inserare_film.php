<!DOCTYPE html>
<html  lang="en">
<head>
    <meta charset="UTF-8">
    <link rel=stylesheet type="text/css" href="../index.css">
    <title>Inserare Film</title>
</head>
<body>
<div>
<form action="inserare_film.php" method="get" >
    ID_film_unic:   <br><input type="text" name="id_film" value="0"></br>
    denumire:       <br><input type="text" name="denumire" value="0"></br>
    website:        <br><input type="text" name="website" value="0"></br>
    an_aparitie :   <br><input type="text" name="an_aparitie" value="0"></br>
    <input type="submit" value="Submit">
</form>
</div>
<?php
include "Filme.php";
if (isset($_GET["id_film"]) && isset($_GET["denumire"]) && isset($_GET["website"]) && isset($_GET["an_aparitie"])) {
    if (!preg_match('/^[A-Z0-9]*[a-z0-9]*((\-|\s)[A-Z0-9]*[a-z0-9]*)*$/', $_GET["denumire"]))
        echo "Error: denumire invalida";
    else
        if (!preg_match('/^(http:\/\/|https:\/\/)?(www.)?([a-zA-Z0-9]+).[a-zA-Z0-9]*.[a-z]{3}.?([a-z]+)?$/', $_GET["website"]))
            echo "Error: website invalid";
        else
            if (!preg_match('/^(19|20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$/', $_GET["an_aparitie"]))
                echo "Error: anul aparitiei invalid";
            else {
                $sql = "INSERT INTO Filme(id_film, denumire, website, an_aparitie)
                            VALUES('" . $_GET["id_film"] . "','" . $_GET["denumire"] . "', '" . $_GET["website"] . "', '" . $_GET["an_aparitie"] . "');";
                $err_message = "CONSTRANGERE ID UNIC : Nu s-a putut creea o noua inregistrare";
                $succes_message = "Inregistrare creata cu succes ";
                afisareFilme($sql, $succes_message, $err_message);
            }
}
else echo "<div>Toate campurile sunt obligatorii !</div>";

?>
<a href="../index.html" class="button">Inapoi</a>
</body>
</html>

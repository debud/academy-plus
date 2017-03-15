<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <link rel=stylesheet type="text/css" href="../index.css">
    <title>Title</title>
</head>
<body>

<div>
<form action="inserare_actor.php" method="get" >
    ID_actor_unic:  <br><input type="text" name="id_actor" value="0"></br>
    Nume actor:     <br><input type="text" name="nume" value="0"></br>
    Prenume actor:  <br><input type="text" name="prenume" value="0"></br>
    nationalitate : <br><input type="text" name="nationalitate" value="0"></br>
    oras:           <br><input type="text" name="oras" value="0"></br>
    data_nasterii:  <br><input type="text" name="data_nasterii" value="0"></br>
    inaltime:       <br><input type="text" name="inaltime" value="0"></br>
    greutate:       <br><input type="text" name="greutate" value="0"></br>
    email:          <br><input type="text" name="email" value="0"></br>
    telefon :       <br><input type="text" name="telefon" value="0"></br>
    <input type="submit" value="Submit">
</form>

</div>
<?php
include "Actori.php";
if (isset($_GET["id_actor"]) && isset($_GET["nume"]) && isset($_GET["prenume"]) && isset($_GET["nationalitate"]) &&
    isset($_GET["oras"]) && isset($_GET["data_nasterii"]) && isset($_GET["inaltime"]) && isset($_GET["greutate"]) &&
    isset($_GET["email"]) && isset($_GET["telefon"])) {

    if (!preg_match('/^[A-Z][a-z]*((\-|\s)[A-Z][a-z]*)*$/',$_GET["nume"]))
         echo "Error: nume invalid";
    else
        if (!preg_match('/^[A-Z][a-z]*((\-|\s)[A-Z][a-z]*)*$/',$_GET["prenume"]))
            echo "Error: prenume invalid";
        else
            if (!preg_match('/^(19|20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$/',$_GET["data_nasterii"]))
                echo "Error: data nasterii invalida";
            else
                if (!preg_match('/^[a-zA-Z][a-z]{2,30}$/',$_GET["nationalitate"]))
                    echo "Error: nationalitate invalida";
                else
                    if (!preg_match('/^[A-Z][a-z]{1,20}((\-|\s)[A-Z][a-z]{1,20})*$/',$_GET["oras"]))
                        echo "Error: oras invalid";
                    else
                        if (!preg_match('/^[a-zA-Z0-9._]{1,30}\@[a-zA-Z0-9_]{4,30}.[a-zA-Z0-9_]{2,10}$/',$_GET["email"]))
                            echo "Error: email invalid";
                        else
                            if (!preg_match('/^([0-9]){10}$/',$_GET["telefon"]))
                                echo "Error: telefon invalid";
                            else
                                if (!preg_match('/^[0-2]+(\.\d{1,3})?$/',$_GET["inaltime"]))
                                    echo "Error: inaltime invalida";

    else{
        $sql = "INSERT INTO Actori(id_actor, nume, prenume, nationalitate, oras, data_nasterii, inaltime, greutate, email, telefon)
                VALUES('" . $_GET["id_actor"] . "','" . $_GET["nume"] . "', '" . $_GET["prenume"] . "', '" . $_GET["nationalitate"] .
            "', '" . $_GET["oras"] . "', '" . $_GET["data_nasterii"] . "',
            " . $_GET["inaltime"] . ", " . $_GET["greutate"] . ", '" . $_GET["email"] . "', '" . $_GET["telefon"] . "');";
        $err_message = "Error: CONSTRANGERE ID UNIC : Nu s-a putut creea o noua inregistrare";
        $succes_message = "Inregistrare creata cu succes ";
        afisareActori($sql, $succes_message, $err_message);
    }
}
else echo "<div>Toate campurile sunt obligatorii !</div>";
?>
<a href="../index.html" class="button">Inapoi</a>
</body>
</html>

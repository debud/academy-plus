<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tabele</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet type="text/css" href="index.css">
    <style>

    </style>
</head>
<body>
<div>
  <?php
    include "Filme.php";
     $sql = "SELECT * FROM Filme";
     $succes_message = "Interogare reusita";
     $err_message = "0 rezultate";
    afisareFilme($sql, $succes_message, $err_message);
    ?>
    <a href="index.html" class="button">Inapoi</a>
</body>
</html>



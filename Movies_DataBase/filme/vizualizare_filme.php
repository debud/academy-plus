<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tabele</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet type="text/css" href="../index.css">
    <style>

    </style>
</head>
<body>
<div>
  <?php
    include "../connection.php";
  $sql = "SELECT * FROM Filme";
  $succes_message = "Interogare reusita";
  $err_message = "0 rezultate";
  $conn = connection();
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
  {
      echo "<h1>" . $succes_message . "</h1>";
      echo "<table><thead>
      <tr>  
         <th>id_film</th>
         <th>denumire film</th>
         <th>website</th>
          <th>an_aparitie</th>
      </tr>";
      while ($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["id_film"] . "</td><td>" . $row["denumire"] . "</td><td>" . $row["website"] . "</td><td>" . $row["an_aparitie"] . "</td></tr>";
      }
      echo "</table>";
  } else {
      echo "<h1>" . $err_message . "</h1>";
  }
    ?>
    <a href="../index.html" class="button">Inapoi</a>
</body>
</html>



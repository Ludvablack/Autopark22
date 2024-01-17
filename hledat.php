<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hledat</title>
    <link rel="stylesheet" href="./CSS/style.css"> 
</head>
<header>
<?php
include ('menu.php');
?>
</header>
<body>
<h1>Hledej auto</h1>

<br><br>
 
<form action="hledat.php" method="GET">
   <input type="text" name="search">
  <input type="submit" value="Odeslat">
</form>

     
<?php
    include('connection.php'); // Vložení souboru s připojením k databázi

    if (isset($_GET["search"])) {
      $query = "SELECT * FROM autopark";
      $result = mysqli_query($connection, $query);

      if (!$result) {
        die("Dotaz do databáze selhal");
      }
      // hledani prvku podle id, nebo typu, nebo barvy, nebo podle datumu dostupnosti

      $_GET["search"] = $connection->real_escape_string($_GET["search"]);
      $result_condition = "WHERE id LIKE '%{$_GET["search"]}%' OR typ LIKE '%{$_GET["search"]}%' OR spz LIKE '%{$_GET["search"]}%' OR barva LIKE '%{$_GET["search"]}%' OR dostupne LIKE '%{$_GET["search"]}%'";
      
      $dotaz = $connection->prepare("SELECT id, typ, spz, barva, dostupne FROM autopark $result_condition");
      $dotaz->bind_result($id, $typ, $spz, $barva, $dostupne);
      $dotaz->execute();

      echo "<br>";
      echo "<h1>Seznam Aut</h1>";

      if ($dotaz->fetch()) {
        // Pokud existují výsledky, zobrazí tabulku
        echo "<table>";
        // hlavicka tabulky
        echo "<thead><tr><th>ID</th><th>Typ</th><th>SPZ</th><th>Barva</th><th>Dostupne</th></tr></thead>\n";
        echo "<tbody>";
        // prvky tabulky

        do {
          echo "<tr><td>$id</td><td>$typ</td><td>$spz</td><td>$barva</td><td>$dostupne od</td></tr>\n";
        } while ($dotaz->fetch());

        echo "</tbody>";
        echo "</table>";
      } else {
        // Pokud neexistují výsledky, vypíše zprávu
        echo "Hledaná hodnota nebyla nalezena.";
      }

      $dotaz->close();
    }
 $connection->close();
  ?>
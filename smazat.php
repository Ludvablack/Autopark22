<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smazat</title>
    <link rel="stylesheet" href="./CSS/style.css"> 
</head>
<header>
<?php
include ('menu.php');
?>
</header>
<body>
<h1>smaž auto</h1>

<br><br>


<form action="smazat.php" method="GET">
  Zadej ID <input type="number" name="id">
  <input type="submit" value="Odeslat">
</form>

<?php
include('connection.php'); // Vložení souboru s připojením k databázi


if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Připravení SQL dotazu s použitím prepared statements pro bezpečnost
    $dotazExistence = $connection->prepare("SELECT id FROM autopark WHERE id = ?");
    $dotazExistence->bind_param("i", $id);
    $dotazExistence->execute();
    $dotazExistence->store_result();

    if ($dotazExistence->num_rows > 0) {
        $dotazSmazani = $connection->prepare("DELETE FROM autopark WHERE id = ?");
        $dotazSmazani->bind_param("i", $id);

        if ($dotazSmazani->execute()) {
            echo "<br> Záznam č. $id byl úspěšně smazán";
        } else {
            echo "Chyba při mazání záznamu: " . $dotazSmazani->error;
        }

        $dotazSmazani->close(); // Uzavření prepared statement pro mazání
    } else {
        echo "Záznam s ID $id neexistuje. Nelze smazat.";
    }

    $dotazExistence->close(); // Uzavření prepared statement pro kontrolu existence
}

$connection->close(); // Uzavření spojení s databází
?>

</body>
</html>
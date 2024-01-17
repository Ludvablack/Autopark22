<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>výpis</title>
    <link rel="stylesheet" href="./CSS/style.css">  
    
</head>
<header>
<?php
include ('menu.php');
?>
</header>
<body>

</body>
</html>



<?php
include ("connection.php");


$query ="SELECT * FROM autopark";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("dotaz do databaze selhal");
}
if(isset($_GET["search"])){
    $_GET["search"]=$connection->real_escape_string($_GET["search"]);
    $result="WHERE Typ  like '%{$_GET["search"]}%' or SPZ like '%{$_GET["search"]}%' or Barva like '%{$_GET["search"]}%' dostupne like '%{$_GET["search"]}%'";}
  else {$result="";}
  
  $dotaz=$connection->prepare("SELECT id,typ,spz,barva,dostupne from autopark $result;");
$dotaz->bind_result($id,$typ,$spz,$barva,$dostupne );
$dotaz->execute();
echo "<br>";
echo "  <h1>Seznam Aut</h1>";
  echo "<table>";
  // tady se vypíše hlavicka tabulky
echo "<thead><tr><th>ID</th><th>Typ</th><th>SPZ</th><th>Barva</th><th>Dostupne</th></thead>\n";
// tady se vypisuje tabulka s prvky
while($dotaz->fetch()){

  echo "<tbody><tr><th>$id</th><th>$typ</th><th>$spz</th><th>$barva</th><th>$dostupne</th></tr></tbody>\n";
}    
echo "</table>";
// konec tabulky
?>

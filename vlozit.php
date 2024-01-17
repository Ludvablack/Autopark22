<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vložit</title>
    <link rel="stylesheet" href="./CSS/style.css"> 
   
</head>
<header>
<?php
include ('menu.php');
// nacteni zakladniho menu
?>
</header>
<body>
<h1>Vložení auta</h1>
<br><br>
    <form  action="vlozit.php" method="GET">
<input name ="typ" type="text" placeholder="typ">
<input name ="spz" type="text" placeholder="spz">
<input name ="barva" type="text" placeholder="barva">
Dostupné <input name ="date" type="date" >
<!-- Tady se zadávají hodnoty noveho auta -->
<br><br>
<input type="submit" value="odeslat">
<br><br>
</body>
</html>
<?php
include ('connection.php');
// pripojeni databaze



if (!empty($_GET))  {



$typ= $_GET["typ"];
$spz= $_GET["spz"];
$barva= $_GET["barva"];
$dostupne= $_GET["date"];


$sql = "INSERT INTO `autopark` (`id`, `typ`, `spz`, `barva`, `dostupne`) VALUES (NULL, '$typ', '$spz', '$barva', '$dostupne')";


if ($connection->query($sql) === TRUE) {
                    
  echo "</br>";
  echo "Auto bylo úspěšně vloženo</br>"; 
  echo "Rekapitulace</br></br>"; 
  echo "Typ: $typ</br>";
  echo "SPZ: $spz</br>";
  echo "Barva: $barva</br>";
  echo "dostupne: $dostupne</br></br>"; 

// vlozeni noveho zaznamu
}
}


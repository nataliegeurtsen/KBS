<?php
$host = "localhost";
$user = "root";
$pass = "";
$databaseName = "cursus";
$port = 3306;
$connection = mysqli_connect($host, $user, $pass, $databaseName, $port);

//$sql = "SELECT * FROM Medewerker";
//$result = mysqli_query($connection, $sql);
//
//// loop stuk voor stuk langs alle resultaten
//while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
//{
//    $naam = $row["naam"];
//   print($naam . "\n");
//}

//fetch alle gegevens in een associative array $medewerkers
//$medewerkers = mysqli_fetch_all($result, $MYSQLI_ASSOC);

$sql = "SELECT * FROM medewerker WHERE afd=30";
$statement = mysqli_prepare($connection, $sql);
//mysqli_stmt_bind_param($statement, 'i', $gebruikersinput);
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $naam = $row["naam"];
    $maandsal = $row["maandsal"];
    print("Naam: " . $naam . " Salaris: " . $maandsal . "\n");
}

$sql2 = "INSERT INTO medewerker (naam, voorl, gbdatum, maandsal, afd) VALUES ('Geurtsen', 'N', '1999-06-23', 1500000, 30)";
$statement2 = mysqli_prepare($connection, $sql2);
mysqli_stmt_execute($statement2);

mysqli_free_result($result);
mysqli_close($connection);
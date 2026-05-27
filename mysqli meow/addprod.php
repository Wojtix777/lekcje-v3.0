<?php
$conn = mysqli_connect("localhost", "root", "", "php_przyklad");
$nazwa = $_POST["name"];
$opis = $_POST["desc"];
$cena = $_POST["price"];
$kategoria = $_POST["cat"];
$sql = "INSERT INTO produkty (nazwa, opis, cena, kategoria) VALUES ('$nazwa', '$cena', '$opis', '$kategoria')";
mysqli_query($conn, $sql);
header("Location: index.php")
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "php_przyklad");
$cena = $_POST["price"];
$id = $_POST["id"];
$sql = "UPDATE produkty SET cena = '$cena' WHERE id = $id";
mysqli_query($conn, $sql);
header("Location: index.php");
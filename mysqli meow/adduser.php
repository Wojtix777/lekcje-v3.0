<?php
$conn = mysqli_connect("localhost", "root", "", "php_przyklad");
$nazwa = $_POST["name"];
$email = $_POST["email"];
$haslo = $_POST["password"];
$sql = "INSERT INTO uzytkownicy (nazwa, email, haslo) VALUES ('$nazwa', '$email', '$haslo')";
mysqli_query($conn, $sql);
header("Location: index.php")
?>
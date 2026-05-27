<?php
$conn = mysqli_connect("localhost", "root", "", "php_przyklad");
$nazwa = $_POST["name"];
$email = $_POST["email"];
$id = $_POST["id"];
$sql = "UPDATE uzytkownicy SET email = '$email' WHERE id = $id";
mysqli_query($conn, $sql);
$sql = "UPDATE uzytkownicy SET nazwa = '$nazwa' WHERE id = $id";
mysqli_query($conn, $sql);
header("Location: index.php");
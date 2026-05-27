<?php
$conn = mysqli_connect("localhost", "root", "", "php_przyklad");
$id = $_POST["id"];
$sql = "DELETE FROM uzytkownicy WHERE id = $id";
mysqli_query($conn, $sql);
header("Location: index.php");
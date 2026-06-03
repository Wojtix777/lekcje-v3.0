<?php
$conn = mysqli_connect("localhost", "root", "", "php_practice");
$name = $_POST['first_name'];
$surname = $_POST['last_name'];
$email = $_POST['email'];
$id = $_POST['student_index'];
$sql = "INSERT INTO users (first_name, last_name, email, student_index, created_at) VALUES ('$name', '$surname', '$email', '$id', CURRENT_TIMESTAMP)";
mysqli_query($conn, $sql);
header("Location: ../index.php#p5");
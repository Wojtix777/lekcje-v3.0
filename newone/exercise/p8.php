<?php
$conn = mysqli_connect("localhost","root","","php_practice");
$uid = $_POST["user_id"];
$sql = "DELETE FROM exercises WHERE user_id = $uid";
mysqli_query($conn, $sql);
$sql = "DELETE FROM users WHERE id = $uid";
mysqli_query($conn, $sql);
header("Location: ../index.php#p8");
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
$conn = mysqli_connect("localhost", "root", "", "projekcik2");
$id = $_GET['user_id'];
$sql = "SELECT * FROM users where id = $id";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
    $imie = $row['imie'];
    $wiek = $row['wiek'];
    $zgoda = $row['zgoda'] ? "Yuh huh" : "NOPE NAH GO AWAY";
    $id = $row['id'];
    echo "
    <ul>
        <li>$imie</li>
        <li>$wiek</li>
        <li>$zgoda</li>
        <li>$id</li>
    </ul>
    ";
};

?>
</body>
</html>

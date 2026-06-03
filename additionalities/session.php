<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesja</title>
</head>
<?php
session_start();
if (isset($_POST['user_id']) && !isset($_COOKIE['second'])){
    $_SESSION["user_id"] = $_POST["user_id"];
    $_SESSION["name"] = $_POST["name"];
    setcookie("second", "f", time() + 10000, "/");
};
if (isset($_POST['remove'])){
    unset($_SESSION["user_id"]);
};
if (isset($_POST['destroy'])){
    session_destroy();
    setcookie("second", "", time()-10, "/");
    echo "Sesja usunięta.";
};
if (isset($_SESSION['name'])){
    echo "Witaj, " . $_SESSION['name'] . "!<br>";
};
if (isset($_POST['echo'])){
    if (isset($_SESSION["user_id"])){    echo "User ID: " . $_SESSION["user_id"] . "<br>";} else {
        echo "No user ID found. <br>";
    };
    echo "Username: " . $_SESSION["name"];
};
?>
<body>
    <form action="session.php" method="POST">
        <label for="user_id">ID użytkownika: <input type="number" name="user_id" id="user_id"></label><br><br>
        <label for="name">Nazwa użytkownika: <input type="text" name="name" id="name"></label><br><br>
        <label for="remove">Usunąć ID użytkownika z sesji? <input type="checkbox" name="remove" id="remove"></label><br><br>
        <button>Zaloguj</button>
    </form><br>

    <form action="session.php" method="POST">
        <input type="hidden" name="echo" value="destroy">
        <button name="echo">Wypisz dane użytkownika.</button>
    </form><br>
    <form action="session.php" method="POST">
        <input type="hidden" name="destroy" value="destroy">
        <button name="destroy">Wyloguj</button>
    </form><br>
    <form action="index.php">
        <button>Go to cookies</button>
    </form>
</body>
</html>
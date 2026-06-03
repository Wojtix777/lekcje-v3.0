<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<?php
        if (isset($_COOKIE["username"])){
            echo $_COOKIE["username"] . "<br>";
        }
        if(isset($_POST["meow1"])){
            setcookie("username", $_POST["meow1"], time() + 3600, "/");
        }
        if(isset($_POST["meow2"])){
            setcookie("ulubionykolor", $_POST["meow2"], time() + 3600, "/");
        }
        if(isset($_POST["delcookie"])){
            setcookie("session_id", "", time() - 10, "/");
        };
        foreach ($_COOKIE as $key => $value){
            echo $key .  " : " . $value . "<br>";
        }
    ?>
<body>
    <form action="index.php" method="POST">
        <label for="meow1">Nazwa użytkownika: <input type="text" name="meow1" id="meow1"></label>
        <label for="delcookie">Usunąć session ID?<input type="checkbox" name="delcookie" id="delcookie"></label>
        <label for="meow2">Ulubiony kolor: <input type="text" name="meow2" id="meow2"></label>
        <button>Send</button>
    </form>
    <form action="session.php">
        <button>Go to sessions</button>
    </form>
</body>
</html>
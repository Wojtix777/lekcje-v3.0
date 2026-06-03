<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mysqli :3</title>
</head>
<body>
<?php
try{
    $conn = mysqli_connect("localhost", "root", "", "php_przyklad");
}
catch (RuntimeException $e){
    echo "Błąd: " . $e->getMessage();
    $error = TRUE;
}
finally{
    if (isset($error) != TRUE){
        echo "Połączono z bazą danych.";
    }
    else{
        echo "Wystąpił błąd.";
    };
};
if(isset($_POST["message"])){
    echo $_POST["message"];
};
$sql = "SELECT * FROM uzytkownicy";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $nazwa = $row['nazwa'];
    $email = $row['email'];
    echo "<ul><li>$id</li><li>$nazwa</li><li>$email</li></ul>";
};
?>
    <form action="adduser.php" method="POST">
        <p>Add User</p>
        <label for="name">Nazwa: <input type="text" id="name" name="name"></label><br>
        <label for="password">Hasło: <input type="password" id="password" name="password"></label><br>
        <label for="email">E-mail: <input type="email" id="email" name="email"></label><br>
        <button>Submit</button>
    </form>
    <br>
    <form action="moduser.php" method="POST">
        <p>Modify User</p>
        <label for="id">ID: <input type="number" id="id" name="id"></label><br>
        <label for="name">Nowa nazwa: <input type="text" id="name" name="name"></label><br>
        <label for="email">Nowy e-mail: <input type="email" id="email" name="email"></label><br>
        <button>Submit</button>
    </form>
    <br>
    <form action="deluser.php" method="POST">
        <p>Delete User</p>
        <label for="id">ID: <input type="number" id="id" name="id"></label><br>
        <button>Submit</button>
    </form>
    <?php
    $sql = "SELECT * FROM produkty WHERE dostępność = 1";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $nazwa = $row['nazwa'];
    $cena = $row['cena'];
    echo "<ul><li>ID: $id</li><li>Nazwa: $nazwa</li><li>Cena: $cena</li></ul>";
};

?>
    <form action="addprod.php" method="POST">
        <p>Add Product</p>
        <label for="name">Nazwa: <input type="text" id="name" name="name"></label><br>
        <label for="desc">Opis: <input type="text" id="desc" name="desc"></label><br>
        <label for="price">Cena: <input type="number" id="price" name="price"></label><br>
        <label for="cat">Kategoria: <input type="text" id="cat" name="cat"></label><br>
        <button>Submit</button>
    </form>
    <br>
    <form action="modprod.php" method="POST">
        <p>Modify Product</p>
        <label for="id">ID: <input type="number" id="id" name="id"></label><br>
        <label for="price">Nowa cena: <input type="number" id="price" name="price"></label><br>
        <button>Submit</button>
    </form>
</body>
</html>
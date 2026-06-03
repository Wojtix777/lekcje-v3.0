<?php
$conn = mysqli_connect("localhost", "root", "", "projekcik2");
$id = $_POST['user_id2'];
$sql = "SELECT * FROM users where id = $id";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $imie = $row['imie'];
    $wiek = $row['wiek'];
    echo "
    <form action='./modifyuser.php' method='POST'>
        <fieldset>
            <legend>$imie</legend>
            <label>
                Podaj wartośc wieku do zmiany:
                <input type='number' name='wiek' id='wiek' value=$wiek placeholder='Podaj wiek do zmiany'>
            </label>
        </fieldset>
        <button name='edytuj'>Edytuj</button>
    </form>
";
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edytuj']))
    $wiek = $_POST['wiek'];
    $sql = "UPDATE users SET wiek = $wiek where id = $id";
};
?>